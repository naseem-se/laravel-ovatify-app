<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class MarketplaceAssetsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'asset_type' => $this->asset_type,
            'sale_type' => $this->sale_type,
            'title' => $this->title,
            'description' => $this->description,
            'tags' => $this->tags,
            'price' => (float) $this->price,
            'is_active' => (bool) $this->is_active,
            'thumbnail' => $this->thumbnail
                ? url(Storage::url($this->thumbnail))
                : null,
            'preview_duration' => $this->preview_duration,

            'license_type' => $this->license_type,
            'price_per_license' => (float) $this->price_per_license,
            'license_duration' => $this->license_duration,

            'total_valuation' => (int) $this->total_valuation,
            'ownership_blocks' => (int) $this->ownership_blocks,
            'price_per_block' => (int) $this->price_per_block,
            'max_available_blocks' => (int) $this->max_available_blocks,
            'remaining_blocks' => (int) $this->remaining_blocks,
            'total_investments' => (float) $this->total_investments,

            // 🔹 Song Generation
            'song_generation' => $this->whenLoaded('songGeneration', function () {
                return [
                    'id' => $this->songGeneration->id,
                    'title' => $this->songGeneration->title,
                    'overview' => $this->songGeneration->overview,
                    'description' => $this->songGeneration->description,
                    'genre' => $this->songGeneration->genre,
                    'tempo' => $this->songGeneration->tempo,
                    'instrumental_type' => $this->songGeneration->instrumental_type,
                    'status' => $this->songGeneration->status,

                    'cover_image' => $this->songGeneration->cover_image
                        ? url(Storage::url($this->songGeneration->cover_image))
                        : null,

                    'audio_file' => $this->songGeneration->file
                        ? url(Storage::url($this->songGeneration->file))
                        : null,
                ];
            }),

            // 🔹 User (Creator)
            'creator' => $this->whenLoaded('user', function () {
                return [
                    'id' => $this->user->id,
                    'username' => $this->user->username,
                    'email' => $this->user->email,
                    'role' => $this->user->role,
                    'profile_image' => $this->user->profile_image
                        ? url(Storage::url($this->user->profile_image))
                        : null,
                ];
            }),
        ];
    }
}
