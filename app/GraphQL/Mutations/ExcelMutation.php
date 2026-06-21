<?php

namespace App\GraphQL\Mutations;

use App\Exports\EmployeesExport;
use App\Imports\EmployeesImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelMutation
{
    /**
     * Import employee data from an uploaded Excel file.
     *
     * @param mixed $_
     * @param array $args
     * @return bool
     */
    public function import($_, array $args)
    {
        Excel::import(
            new EmployeesImport(),
            $args['file']
        );

        return true;
    }
    /**
     * Export all employees to an Excel file and
     * return the download URL.
     *
     * @return string
     */
    public function export()
    {
        // Define export file name
        $fileName = 'employees.xlsx';
        
    // Generate and store Excel file in public storage
        Excel::store(
            new EmployeesExport(),
            $fileName,
            'public'
        );

        return asset('storage/' . $fileName);
    }
}
