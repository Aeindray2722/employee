<?php

namespace App\Services;

// use App\Models\Employee;
use App\Repositories\EmployeeRepository;

class EmployeeService
{
    public function __construct(
        private EmployeeRepository $repository
    ) {}

    public function paginate(int $perPage = 20, ?int $page = null)
{
    return $this->repository->paginate($perPage, $page);
}

    public function findById(int $id)
    {
        return $this->repository->find($id);
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }
    public function generate(int $count)
{
    return $this->repository->generate($count);
}
}
