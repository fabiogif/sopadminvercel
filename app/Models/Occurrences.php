<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occurrences extends Model
{
    protected $fillable = ['title', 'name', 'description', 'cpf', 'rg', 'address', 'users_id', 'email', 'issuings_id', 'type_occurrences_id', 'latitude', 'longitude', 'status_occurrences_id'];
    use HasFactory;

    public function search($filter = null)
    {
        $result = $this->where('title', 'LIKE', "%{$filter}%")
            ->paginate(10);
        return $result;
    }


    public function Occurrence($filter = null)
    {

        $occurrences = $this->select(
            'occurrences.*',
            'issuings.id as idIssuings',
            'issuings.name as nameIssuings',
            'type_occurrences.id as idType',
            'type_occurrences.name as nameType'
        )->join('issuings', 'issuings.id', '=', 'occurrences.issuings_id')
            ->join('type_occurrences', function ($join) {
            $join->on('occurrences.type_occurrences_id', '=', 'type_occurrences.id');
        })->where(function ($queryFilter) use ($filter) {
            if ($filter) {
                $queryFilter->where('occurrences.title', 'LIKE', "%{$filter}%");
            }
        })->paginate();

        return $occurrences;
    }
}
