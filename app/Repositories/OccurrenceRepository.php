<?php

namespace App\Repositories;

use App\Models\Occurrences;
use App\Repositories\Contracts\OccurrenceRepositoryInterface;

class OccurrenceRepository implements OccurrenceRepositoryInterface
{
    protected $entity;

    public function __construct(Occurrences $occurrence)
    {
        $this->entity = $occurrence;
    }
    public function getAllOccurrences(int $pre_page)
    {
        return $this->entity->paginate($pre_page);
    }

    public function getOccurrenceByUuid(String $uuid)
    {
        return $this->entity->where('uuid', $uuid)->first();
    }
}
