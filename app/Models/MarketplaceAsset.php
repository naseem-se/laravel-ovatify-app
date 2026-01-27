<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketplaceAsset extends Model
{
    protected $fillable = [
        'user_id',
        'song_generation_id',
        'asset_type',
        'file_path',
        'file_type',
        'title',
        'thumbnail',
        'tags',
        'description',
        'sale_type',
        'price',
        'is_active',
        'preview_duration',
        'license_type',
        'price_per_license',
        'license_duration',
        'total_valuation',
        'ownership_block',
        'price_per_block',
        'max_available_blocks',
        'remaining_blocks',
        'total_investment',
        'max_earning',
        'investment_roi',
    ];

    protected $casts = [
        'tags' => 'array',
        'is_active' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function songGeneration()
    {
        return $this->belongsTo(SongGeneration::class);
    }
}
