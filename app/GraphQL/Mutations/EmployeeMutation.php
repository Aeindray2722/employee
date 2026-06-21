<?php

namespace App\GraphQL\Mutations;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;

class EmployeeMutation
{

    /**
     * Generate a specified number of sample employees
     * using the Employee factory.
     *
     * @param mixed $_
     * @param array $args
     * @return string
     */
    public function generate($_, array $args)
    {
        Employee::factory()
            ->count($args['count'])
            ->create();

        return "Employees generated successfully";
    }
    /**
     * Validate input data and create a new employee.
     *
     * @param mixed $_
     * @param array $args
     * @return Employee
     */

    public function create($_, array $args)
{
    validator($args, (new EmployeeRequest())->rules())->validate();

    return Employee::create($args);
}
}
