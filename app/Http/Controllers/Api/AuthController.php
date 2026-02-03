<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignupRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\AuthResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\VerificationCode;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Services\SmsService;
use App\Notifications\VerificationCodeNotification;
use Illuminate\Support\Facades\Log;
use Exception;
use VerificationCodeNotification as GlobalVerificationCodeNotification;
use App\Events\VerificationCodeGenerated;

class AuthController extends Controller
{
    protected int $otpLength = 4;
    protected int $otpTTLMinutes = 5;

    public function signup(SignupRequest $request, SmsService $smsService)
    {
        $data = $request->validated();

        DB::beginTransaction();
        try {
            $user = User::create([
                'username' => $data['username'],
                'phone' => $data['phone'] ?? null,
                'email' => $data['email'] ?? null,
                'password' => $data['password'],
                'role' => $data['role'] ?? 'consumer'
            ]);

            // send verification code (prefer email if provided)
            $type = $data['email'] ? 'email' : ($data['phone'] ? 'phone' : null);

            if ($type) {
                $code = $this->generateCode($this->otpLength);

                $vc = VerificationCode::create([
                    'user_id' => $user->id,
                    'code' => $code,
                    'type' => $type,
                    'expires_at' => Carbon::now()->addMinutes($this->otpTTLMinutes)
                ]);

                if ($type === 'email') {
                    event(new VerificationCodeGenerated($user, $code));
                } else {
                    $msg = "Your verification code is: {$code}";
                    $smsService->send($user->phone, $msg);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'User created. Verification code sent to your email.',
                'data' => UserResource::collection(collect([$user]))
            ], 201);

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Signup error: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Signup failed', 'error' => $e->getMessage()], 500);
        }
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        $login = $credentials['login'];
        $password = $credentials['password'];

        // find user by email, username, or phone
        $user = User::where('email', $login)
            ->orWhere('username', $login)
            ->orWhere('phone', $login)
            ->first();

        if (!$user || !Hash::check($password, $user->password)) {
            return response()->json(['success' => false, 'message' => 'Invalid email or password'], 401);
        }

        if (!$user->is_active) {
            return response()->json(['success' => false, 'message' => 'Account inactive'], 403);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login successfully.',
            'role' => $user->role,
            'token' => $token,
        ]);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        // revoke current token
        $request->user()->currentAccessToken()->delete();

        return response()->json(['success' => true, 'message' => 'Logged out.']);
    }

    protected function generateCode(int $len = 4): string
    {
        $min = (int) str_pad('1', $len, '0');
        $max = (int) str_pad('', $len, '9') ?: (10 ** $len - 1);
        // simple numeric code
        $code = (string) random_int(10 ** ($len - 1), (10 ** $len) - 1);
        return $code;
    }
}

