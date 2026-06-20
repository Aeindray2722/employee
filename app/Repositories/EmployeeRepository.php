<?php

namespace App\Repositories;

use App\Models\Employee;

class EmployeeRepository
{
    public function paginate(int $perPage = 20, ?int $page = null)
{
    return Employee::paginate($perPage, ['*'], 'page', $page);
}

    public function find(int $id)
    {
        return Employee::findOrFail($id);
    }

    public function create(array $data)
    {
        return Employee::create($data);
    }

    public function update(int $id, array $data)
    {
        $employee = $this->find($id);

        $employee->update($data);

        return $employee->fresh();
    }

    public function delete(int $id)
    {
        $employee = $this->find($id);

        return $employee->delete();
    }
    public function generate(int $count)
{
    return Employee::factory()->count($count)->create();
}
}
