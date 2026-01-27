<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SongGeneration extends Model
{
    use HasFactory;

    // Table name (optional if following Laravel naming conventions)
    protected $table = 'song_generations';

    // Mass assignable fields
    protected $fillable = [
        'user_id',
        'title',
        'overview',
        'cover_image',
        'description',
        'instrumental_type',
        'genre',
        'tempo',
        'metadata',
        'agreements',
        'agreement_type',
        'status',
        'file_type',
        'file',
        'taskId',
    ];

    // Cast metadata to array automatically
    protected $casts = [
        'metadata' => 'array',
    ];

    /**
     * Relationship: SongGeneration belongs to a User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship: SongGeneration has many MarketplaceAssets
     */
    public function marketplaceAssets()
    {
        return $this->hasMany(MarketplaceAsset::class); 
    }

}
