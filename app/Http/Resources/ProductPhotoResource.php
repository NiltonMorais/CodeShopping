<?php

namespace CodeShopping\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductPhotoResource extends JsonResource
{
    private $isCollection;

    public function __construct($resource, $isCollection = false)
    {
        parent::__construct($resource);
        $this->isCollection = $isCollection;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            'id' => $this->id,
            'photo_url' => $this->photo_url,
            'created_at' => $this->created_at->format("d/m/Y - H:i:s"),
            'updated_at' => $this->updated_at->format("d/m/Y - H:i:s")
        ];

        if(!$this->isCollection){
            $data['product'] = new ProductResource($this->product);
        }

        return $data;
    }
}
