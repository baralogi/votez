<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VotingCountResource extends JsonResource
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
            "candidate_partner" => $this->candidatePartner->voting->name . ' Paslon No.Urut ' . $this->candidatePartner->sequence_number,
            "total" => $this->total,
        ];
    }
}
