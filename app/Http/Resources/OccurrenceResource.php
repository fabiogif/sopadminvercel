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
            'id' => $this->id,
            'name' => $this->name,
            'title' => $this->title,
            'description' => $this->description,
            'cpf' => $this->cpf,
            'rg' => $this->rg,
            'email' => $this->email,
            'address' => $this->address,
            'issuings_id' => $this->issuings_id,
            'user_id' => $this->user_id,
            'type_occurrences' => $this->type_occurrences_id,
            'nameType' => $this->nameType,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'status_occurrences_id' => $this->status_occurrences_id,
            'nameStatus' => $this->nameStatus,
            'clients_id' => $this->clients_id,
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y')
        ];
    }
}
