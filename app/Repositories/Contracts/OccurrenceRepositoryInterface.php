<?php

namespace App\Repositories\Contracts;

interface OccurrenceRepositoryInterface
{
    public function getAllOccurrences(int $pre_page);

    public function getOccurrenceById(string $id);

    public function createNewOccurrence(array $data);

    public function create(
        string $name,
        string $description,
        string $cpf,
        string $cnpj,
        string $rg,
        string $address,
        string $email,
        int $users_id,
        int $issuings_id,
        int $type_occurrences_id,
        string $latitude,
        string $longitude,
        string $status_occurrences_id,
        string $comment,
        string $subscription
        );
}
