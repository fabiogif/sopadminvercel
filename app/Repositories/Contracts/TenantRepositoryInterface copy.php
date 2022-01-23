<?php

namespace App\Repositories\Contracts;

interface OccurrencesRepositoryInterface
{
    public function getAllTenants(int $pre_page);

    public function getTenantByUuid(String $uuid);
}
