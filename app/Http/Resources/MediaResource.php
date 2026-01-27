<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

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
            'file' =>  $this->file ? url(Storage::url($this->file)) : null,
            'status' => $this->status,
            'enabled_for_sale' => $this->marketplaceAssets->where('sale_type', 'sale')->isEmpty(),
            'enabled_for_investment' => $this->marketplaceAssets->where('sale_type', 'investment')->isEmpty(),
            'enabled_for_license' => $this->marketplaceAssets->where('sale_type', 'license')->isEmpty(),
        ];
    }
}
