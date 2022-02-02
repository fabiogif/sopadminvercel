<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OccurrenceResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'cpf' => $this->cpf,
            'rg' => $this->rg,
            'email' => $this->email,
            'address' => $this->address,
            'user' => $this->user,
            'issuing' => $this->issuing,
            'user_id' => $this->user_id,
            'type_occurrences' => $this->type_occurrences,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y')
        ];
    }
}
