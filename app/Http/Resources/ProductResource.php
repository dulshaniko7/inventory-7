<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name'=> $this->name,
           'code' => $this->code,
            'root' => $this->root,
            'selling_price' => $this->selling_price,
            'date' => $this->date,
            'category_id' => $this->category_id,
            'image' => $this->image,
            'qty' => $this->qty,
            'created_at' => $this->created_at->diffForHumans()
        ];
    }
}
