<?php

namespace CodeShopping\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
          'name' => $this->name,
          'slug' => $this->slug,
          'active' => (bool) $this->active,
          'created_at' => $this->created_at->format("d/m/Y - H:i:s"),
          'updated_at' => $this->updated_at->format("d/m/Y - H:i:s"),
        ];
    }
}
