<?php

namespace App\Services;

use App\Models\Plan;
use App\Repositories\Contracts\OccurrenceRepositoryInterface;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class OccurrenceService
{
    private $plan, $data = array();
    private $repository;


    public function __construct(OccurrenceRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllOccurrences(int $pre_page)
    {
        return $this->repository->getAllOccurrences($pre_page);
    }

    public function getOccurrenceByUuid(string $uuid)
    {
        return $this->repository->getOccurrenceByUuid($uuid);
    }

    public function make(Plan $plan, array $data)
    {
        $this->plan = $plan;
        $this->data = $data;

        $Occurrence =  $this->createOccurrence();
        return $this->createUser($Occurrence);
    }

    public function createOccurrence()
    {
        $data = $this->data;

        return $this->plan->Occurrences()->create([
            'cnpj' =>  $data['cnpj'],
            'cpf' =>   $data['cpf'] ?? '',
            'name' =>  $data['empresa'] ??  $data['name'],
            'email' => $data['email'],
            'subscription' => now(),
            'expires_at' => now()->addDays(7),
        ]);
    }

    public function createUser($Occurrence)
    {
        return  $Occurrence->users()->create([
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'password' => bcrypt($this->data['password']),
        ]);
    }
}
