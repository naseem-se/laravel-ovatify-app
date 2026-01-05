<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Password\ForgotPasswordRequest;
use App\Http\Requests\Password\VerifyResetCodeRequest;
use App\Http\Requests\Password\CreatePasswordRequest;
use App\Models\User;
use App\Models\PasswordReset;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Services\SmsService;
use App\Notifications\VerificationCodeNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Exception;
use App\Events\VerificationCodeGenerated;
use App\Http\Resources\UserResource;

class PasswordController extends Controller
{
    protected int $tokenTTLMinutes = 30;

    public function forgot(ForgotPasswordRequest $request, SmsService $smsService)
    {
        $data = $request->validated();

        $user = null;
        if (!empty($data['email'])) {
            $user = User::where('email', $data['email'])->first();
        } elseif (!empty($data['phone'])) {
            $user = User::where('phone', $data['phone'])->first();
        }

        if (!$user)
            return response()->json(['success' => false, 'message' => 'User not found'], 404);

        DB::beginTransaction();
        try {
            // invalidate previous tokens
            PasswordReset::where('email', $user->email)->where('used', false)->update(['used' => true]);

            $token = Str::random(8);

            $pr = PasswordReset::create([
                'email' => $user->email,
                'token' => hash('sha256', $token),
                'expires_at' => Carbon::now()->addMinutes($this->tokenTTLMinutes)
            ]);

            // send token (we'll send the raw token, store hashed)
            $sendPayload = "Password reset token: {$token}";

            if ($user->email) {
                // email
                event(new VerificationCodeGenerated($user, $token));
            } elseif ($user->phone) {
                $smsService->send($user->phone, $sendPayload);
            }

            DB::commit();

            // Return token identifier to client (not secure token itself) — client keeps returned temporary session (we return user_id and masked info)
            return response()->json([
                'success' => true,
                'message' => 'Reset token sent',
                'data' => UserResource::collection(collect([$user]))
            ]);

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('ForgotPassword error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
                'message' => 'Failed to create reset token'
            ], 500);
        }
    }

    public function verifyReset(VerifyResetCodeRequest $request)
    {
        $data = $request->validated();
        $hashed = hash('sha256', $data['token']);

        $pr = PasswordReset::where('email', $data['email'])
            ->where('token', $hashed)
            ->where('used', false)
            ->latest()
            ->first();

        if (!$pr)
            return response()->json(['success' => false, 'message' => 'Invalid token'], 400);
        if ($pr->isExpired())
            return response()->json(['success' => false, 'message' => 'Token expired'], 400);

        // we can create a temporary short-lived server session or return success to allow reset — for simplicity return success with a temporary key
        $sessionKey = Str::random(10);
        // store in cache for short time: map sessionKey => password_reset_id
        Cache::put("password_reset_session:{$sessionKey}", $pr->id, now()->addMinutes(15));

        return response()->json(['success' => true, 'message' => 'Token verified', 'data' => ['session_key' => $sessionKey]]);
    }

    public function createPassword(CreatePasswordRequest $request)
    {
        $data = $request->validated();

        // check session key in cache or validate token again
        $hashedToken = hash('sha256', $data['token']);

        $pr = PasswordReset::where('email', $data['email'])
            ->where('token', $hashedToken)
            ->where('used', false)
            ->latest()
            ->first();

        if (!$pr || $pr->isExpired()) {
            return response()->json(['success' => false, 'message' => 'Invalid or expired token'], 400);
        }

        DB::beginTransaction();
        try {
            $user = User::where('email', $data['email'])->first();
            if (!$user) {
                return response()->json(['success' => false, 'message' => 'User not found'], 404);
            }

            $user->password = Hash::make($data['password']);
            $user->save();

            // revoke all tokens for security
            $user->tokens()->delete();

            PasswordReset::where('email', $pr->email)
            ->where('token', $pr->token)
            ->delete();

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Password updated successfully']);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
                'message' => 'Failed to update password'
            ], 500);
        }
    }
}

