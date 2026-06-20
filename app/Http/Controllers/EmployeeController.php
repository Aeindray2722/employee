<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Services\EmployeeService;

class EmployeeController extends Controller
{
    public function __construct(
        protected EmployeeService $service
    ) {}

    public function index()
    {
        return response()->json(
            $this->service->paginate()
        );
    }

    public function store(EmployeeRequest $request)
    {
        return response()->json(
            $this->service->create(
                $request->validated()
            ),
            201
        );
    }

    public function show($id)
    {
        return response()->json(
            $this->service->findById($id)
        );
    }

    public function update(EmployeeRequest $request, $id)
    {
        return response()->json(
            $this->service->update(
                $id,
                $request->validated()
            )
        );
    }

    public function destroy($id)
    {
        return response()->json([
            'deleted' => $this->service->delete($id)
        ]);
    }
}
