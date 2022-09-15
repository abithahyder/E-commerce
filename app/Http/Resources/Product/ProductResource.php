<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'Product Name' => $this->title,
            'Description' => $this->description,
            'Quantity' => $this->quantity,
            'Actual Prize' =>$this->actual_prize,
            'Seller Prize' =>$this->seller_prize,
            'Discount' => $this->discount,
           
            
        ];
    }
}
