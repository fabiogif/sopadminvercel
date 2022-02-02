<?php

namespace App\Repositories\Contracts;

interface OccurrenceRepositoryInterface
{
    public function getAllOccurrences(int $pre_page);

    public function getOccurrenceByUuid(String $uuid);
}
