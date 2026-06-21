<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeesImport implements ToModel, WithHeadingRow
{
    /**
     * Transform an Excel row into an Employee model.
     *
     * @param array $row
     * @return Employee
     */
    public function model(array $row)
    {
        // Map each Excel row to an Employee model
        return new Employee([
            'first_name' => $row['first_name'],
            'last_name'  => $row['last_name'],
            'email'      => $row['email'],
            'phone'      => $row['phone'],
            'address'    => $row['address'],
            'salary'     => $row['salary'],
        ]);
    }
}
