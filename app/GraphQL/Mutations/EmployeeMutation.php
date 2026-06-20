<?php

namespace App\GraphQL\Mutations;

use App\Models\Employee;

class EmployeeMutation
{
    public function generate($_, array $args)
    {
        Employee::factory()
            ->count($args['count'])
            ->create();

        return "Employees generated successfully";
    }
}
