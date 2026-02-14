<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\MarketplaceAssetsResource;

class MediaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'overview' => $this->overview,
            'cover_image' => $this->cover_image ? url(Storage::url($this->cover_image)) : null,
            'description' => $this->description,
            'instrumental_type' => $this->instrumental_type,
            'genre' => $this->genre,
            'mood' => $this->mood,
            'tempo' => $this->tempo,
            'agreement' => $this->agreements,
            'file' => $this->file ? url(Storage::url($this->file)) : null,
            'status' => $this->status,
            'enabled_for_sale' => $this->marketplaceAssets->where('sale_type', 'sale')->isNotEmpty(),
            'enabled_for_investment' => $this->marketplaceAssets->where('sale_type', 'investment')->isNotEmpty(),
            'enabled_for_license' => $this->marketplaceAssets->where('sale_type', 'license')->isNotEmpty(),

            'creator' => $this->whenLoaded(
                'user',
                fn() => $this->user ? [
                    'id' => $this->user->id,
                    'username' => $this->user->username,
                    'email' => $this->user->email,
                    'role' => $this->user->role,
                    'profile_image' => $this->user->profile_image
                        ? url(Storage::url($this->user->profile_image))
                        : null,
                ] : null
            ),


            'marketplace_assets' => $this->whenLoaded(
                'marketplaceAssets',
                fn() => $this->marketplaceAssets->isNotEmpty()
                ? MarketplaceAssetsResource::collection($this->marketplaceAssets)
                : null
            ),


        ];
    }
}
