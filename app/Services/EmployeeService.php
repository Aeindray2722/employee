<?php

namespace App\Services;

use App\Repositories\EmployeeRepository;

class EmployeeService
{
    public function __construct(
        private EmployeeRepository $repository
    ) {}

    /**
     * Retrieve paginated employee records.
     *
     * @param int $perPage
     * @param int|null $page
     * @return mixed
     */
    public function paginate(int $perPage = 20, ?int $page = null)
    {
        return $this->repository->paginate($perPage, $page);
    }

    /**
     * Retrieve an employee by ID.
     *
     * @param int $id
     * @return mixed
     */
    public function findById(int $id)
    {
        return $this->repository->find($id);
    }

    /**
     * Create a new employee.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    /**
     * Update an existing employee.
     *
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function update(int $id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    /**
     * Delete an employee by ID.
     *
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }

    /**
     * Generate sample employee records.
     *
     * @param int $count
     * @return mixed
     */
    public function generate(int $count)
    {
        return $this->repository->generate($count);
    }
}
