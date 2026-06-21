<?php

namespace App\Exports;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromQuery;

/**
     * Return the query used to retrieve employee data
     * for Excel export.
     *
     * @return Builder
     */

class EmployeesExport implements FromQuery
{
    // Fetch all employee records
    public function query(): Builder
    {
        return Employee::query();
    }
}
