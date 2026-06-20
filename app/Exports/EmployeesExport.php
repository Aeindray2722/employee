<?php

namespace App\Exports;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\FromQuery;

class EmployeesExport implements FromQuery
{
    public function query(): Builder
    {
        return Employee::query();
    }
}
