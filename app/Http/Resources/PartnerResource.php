<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PartnerResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'nip_number' => $this->nip_number,
            'website' => $this->website,
            'created_at' => $this->created_at
        ];
    }
}
