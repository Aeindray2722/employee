<?php

namespace App\GraphQL\Mutations;

use App\Exports\EmployeesExport;
use App\Imports\EmployeesImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelMutation
{
    public function import($_, array $args)
    {
        Excel::import(
            new EmployeesImport(),
            $args['file']
        );

        return true;
    }

    public function export()
    {
        $fileName = 'employees.xlsx';

        Excel::store(
            new EmployeesExport(),
            $fileName,
            'public'
        );

        return asset('storage/' . $fileName);
    }
}
