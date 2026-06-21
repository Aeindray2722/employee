<?php

namespace App\Repositories;

use App\Models\Employee;

class EmployeeRepository
{
    /**
     * Retrieve paginated employee records.
     *
     * @param int $perPage
     * @param int|null $page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate(int $perPage = 20, ?int $page = null)
    {
        return Employee::paginate($perPage, ['*'], 'page', $page);
    }

    /**
     * Find an employee by ID.
     *
     * @param int $id
     * @return Employee
     */
    public function find(int $id)
    {
        return Employee::findOrFail($id);
    }

    /**
     * Create a new employee record.
     *
     * @param array $data
     * @return Employee
     */
    public function create(array $data)
    {
        return Employee::create($data);
    }

    /**
     * Update an existing employee.
     *
     * @param int $id
     * @param array $data
     * @return Employee
     */
    public function update(int $id, array $data)
    {
        $employee = $this->find($id);

        $employee->update($data);

        return $employee->fresh();
    }

    /**
     * Delete an employee by ID.
     *
     * @param int $id
     * @return bool|null
     */
    public function delete(int $id)
    {
        $employee = $this->find($id);

        return $employee->delete();
    }

    /**
     * Generate sample employee records using a factory.
     *
     * @param int $count
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function generate(int $count)
    {
        return Employee::factory()
            ->count($count)
            ->create();
    }
}
