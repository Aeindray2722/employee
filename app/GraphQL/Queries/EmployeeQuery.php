<?php

namespace App\GraphQL\Queries;

use App\Services\EmployeeService;
use App\Models\Employee;

class EmployeeQuery
{
    public function __construct(private EmployeeService $employeeService)
    {

    }
    /**
     * Retrieve a single employee by ID.
     *
     * @param mixed $_
     * @param array $args
     * @return Employee
     */
    public function employee($_, array $args)
    {
        return Employee::findOrFail($args['id']);
    }

/**
     * Retrieve a paginated list of employees.
     *
     * @param mixed $root
     * @param array $args
     * @return array
     */

    public function employees($root, array $args)
    {

        $paginator = $this->employeeService->paginate(
        $args['first'] ?? 20,
        $args['page'] ?? 1
    );

         return [
        'data' => $paginator->items(),
        'paginatorInfo' => [
            'currentPage' => $paginator->currentPage(),
            'lastPage' => $paginator->lastPage(),
            'total' => $paginator->total(),
            'hasMorePages' => $paginator->hasMorePages(),
        ]
    ];
    }
}
