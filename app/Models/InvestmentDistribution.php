<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class InvestmentDistribution extends Model
{
    use HasFactory;

    protected $fillable = [
        'marketplace_investment_id',
        'distribution_amount',
        'distribution_date',
        'distribution_type',
        'status',
    ];

    protected $casts = [
        'distribution_amount' => 'decimal:2',
        'distribution_date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function investment(): BelongsTo
    {
        return $this->belongsTo(MarketplaceInvestment::class, 'marketplace_investment_id');
    }

    public function scopeByType(Builder $query, string $type): Builder
    {
        return $query->where('distribution_type', $type);
    }

    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', 'pending');
    }

    public function scopePaid(Builder $query): Builder
    {
        return $query->where('status', 'paid');
    }
}