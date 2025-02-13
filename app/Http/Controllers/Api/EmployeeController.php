<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index() 
    {
        $employees = Employee::all();
        if ($employees->isEmpty()) {
            return response()->json(['message' => "There is no data available"], 200);
        }
        return EmployeeResource::collection($employees);
    }

    public function store(StoreEmployeeRequest $request) 
    {
        $employee = Employee::create($request->validated());

        return response()->json([
            'message' => 'Employee created successfully',
            'data' => new EmployeeResource($employee)
        ], 201);
    }

    public function show($id) 
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        return new EmployeeResource($employee);
    }

    public function update(UpdateEmployeeRequest $request, $id) 
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        $employee->update($request->validated());

        return response()->json([
            'message' => 'Employee updated successfully',
            'data' => new EmployeeResource($employee)
        ], 200);
    }

    public function destroy($id) 
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return response()->json(['message' => 'Employee not found'], 404);
        }

        $employee->delete();

        return response()->json([
            'message' => 'Employee deleted successfully',
        ], 200);
    }
}
