<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username','phone','email','password','role','locale','two_factor_method','is_active','is_google','is_apple','profile_image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'phone_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }


    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn($value) => \Illuminate\Support\Facades\Hash::needsRehash($value) ? bcrypt($value) : $value
        );
    }

    public function verificationCodes()
    {
        return $this->hasMany(VerificationCode::class);
    }

    public function passwordResets()
    {
        return $this->hasMany(PasswordReset::class, 'email', 'email');
    }

    public function marketplaceAssets()
    {
        return $this->hasMany(MarketplaceAsset::class);
    }

    public function sellerBankAccounts()
    {
        return $this->hasMany(SellerBankAccount::class);
    }

    public function buyerTransactions()
    {
        return $this->hasMany(MarketplaceTransaction::class, 'user_id', 'id');
    }

    public function sellerTransactions()
    {
        return $this->hasMany(MarketplaceTransaction::class, 'seller_id', 'id');
    }

    public function marketplacePurchases()
    {
        return $this->hasMany(MarketplacePurchase::class);
    }

    public function marketplaceLicenses()
    {
        return $this->hasMany(MarketplaceLicense::class);
    }

    public function marketplaceInvestments()
    {
        return $this->hasMany(MarketplaceInvestment::class);
    }

    // THROUGH RELATIONSHIPS
    public function assetsViaSongs()
    {
        return $this->hasManyThrough(
            MarketplaceAsset::class,
            SongGeneration::class,
            'user_id',
            'song_generation_id'
        );
    }


}
