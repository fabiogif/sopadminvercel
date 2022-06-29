<?php

namespace App\Services;

use App\Models\Plan;
use App\Repositories\Contracts\OccurrenceRepositoryInterface;

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

    public function getOccurrenceById(string $id)
    {
        return $this->repository->getOccurrenceById($id);
    }

    public function make(Plan $plan, array $data)
    {
        $this->plan = $plan;
        $this->data = $data;

        $Occurrence = $this->createOccurrence();
        return $this->createUser($Occurrence);
    }
    public function createNewOccurrence(array $data)
    {
        return $this->repository->createNewOccurrence($data);
    }

    public function createOccurrence()
    {
        $data = $this->data;

        return $this->plan->occurrences()->create([
            'title' => $data['title'],
            'name' => $data['name'],
            'description' => $data['description'],
            'cpf' => $data['cpf'] ?? '',
            'rg' => $data['rg'],
            'address' => $data['address'],
            'users_id' => $data['users_id'],
            'email' => $data['email'],
            'issuings_id' => $data['issuings_id'],
            'type_occurrences_id' => $data['type_occurrences_id'],
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
            'status_occurrences_id' => $data['status_occurrences_id'],
            'cnpj' => $data['cnpj'],
            'clients_id' => $data['clients_id'],
            'subscription' => now()
        ]);
    }

    public function createUser($Occurrence)
    {
        return $Occurrence->users()->create([
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'password' => bcrypt($this->data['password']),
        ]);
    }



}
