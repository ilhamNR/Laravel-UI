<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductReviewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name'          => $this->name,
            'score'         => $this->score,
            'review'        => $this->review,
            'slug'          => $this->slug,
            'product_id'    => $this->product_id,
            'user_id'       => $this->user_id,
        ];
    }
}
