<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee-ir');
    }

    public function getEmployees(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $search = $request->input('search', '');
        
        $query = Employee::query();
        
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('designation', 'like', "%{$search}%")
                  ->orWhere('position', 'like', "%{$search}%");
            });
        }
        
        $total = $query->count();
        $employees = $query->paginate($perPage);
        
        return response()->json([
            'data' => $employees->items(),
            'total' => $total,
            'current_page' => $employees->currentPage(),
            'per_page' => $perPage,
            'last_page' => $employees->lastPage()
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'gender' => 'required|in:Male,Female',
            'contact_number' => 'required|string|max:20',
            'date_hired' => 'required|date',
            'philhealth' => 'required|string|max:20',
            'sss' => 'required|string|max:20',
            'pagibig' => 'required|string|max:20',
            'taxes' => 'required|string|max:20',
            'house_number' => 'required|string|max:50',
            'street' => 'required|string|max:255',
            'barangay_municipality' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $employee = Employee::create($request->all());
        return response()->json($employee, 201);
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'gender' => 'required|in:Male,Female',
            'contact_number' => 'required|string|max:20',
            'date_hired' => 'required|date',
            'philhealth' => 'required|string|max:20',
            'sss' => 'required|string|max:20',
            'pagibig' => 'required|string|max:20',
            'taxes' => 'required|string|max:20',
            'house_number' => 'required|string|max:50',
            'street' => 'required|string|max:255',
            'barangay_municipality' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $employee->update($request->all());
        return response()->json($employee);
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return response()->json(null, 204);
    }
} 