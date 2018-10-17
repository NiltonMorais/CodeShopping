<?php

namespace CodeShopping\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductPhotoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'photo_url' => $this->photo_url,
            'created_at' => $this->created_at->format("d/m/Y - H:i:s"),
            'updated_at' => $this->updated_at->format("d/m/Y - H:i:s"),
            'product' => new ProductResource($this->product)
        ];
    }
}
