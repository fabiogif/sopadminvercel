<?php

namespace App\Services;

use App\Models\Plan;
use App\Repositories\Contracts\TenantRepositoryInterface;

class TenantService
{
    private $plan, $data = array();
    private $repository;


    public function __construct(TenantRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllTenants(int $pre_page)
    {
        return $this->repository->getAllTenants($pre_page);
    }

    public function getTenantByUuid(string $uuid)
    {
        return $this->repository->getTenantByUuid($uuid);
    }

    public function make(Plan $plan, array $data)
    {
        $this->plan = $plan;
        $this->data = $data;

        $tenant =  $this->createTenant();
        return $this->createUser($tenant);
    }

    public function createTenant()
    {
        $data = $this->data;

        return $this->plan->tenants()->create([
            'cnpj' =>  $data['cnpj'],
            'cpf' =>   $data['cpf'] ?? '',
            'name' =>  $data['empresa'] ??  $data['name'],
            'email' => $data['email'],
            'subscription' => now(),
            'expires_at' => now()->addDays(7),
        ]);
    }

    public function createUser($tenant)
    {
        return  $tenant->users()->create([
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'password' => bcrypt($this->data['password']),
        ]);
    }
}
