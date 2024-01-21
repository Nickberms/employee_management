<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all(); // Fetch all employees from the database

        return view('index', ['employees' => $employees]);
    }

    public function create()
    {
        return view('create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'position' => 'required',
            'status' => 'required',
            'salary' => 'required|numeric',
        ]);
        function formatInput(string $name): string
        {
            $name = trim($name);
            $name = preg_replace('/\s+/', ' ', $name);
            $words = explode(' ', $name);
            foreach ($words as &$word) {
                $word = ucfirst(strtolower($word));
            }
            return implode(' ', $words);
        }
        $request['first_name'] = formatInput($request['first_name']);
        $request['last_name'] = formatInput($request['last_name']);
        $request['position'] = formatInput($request['position']);
        $employee = new Employee([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'gender' => $request->input('gender'),
            'position' => $request->input('position'),
            'status' => $request->input('status'),
            'salary' => $request->input('salary'),
        ]);
        $employee->save();
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('edit', ['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'position' => 'required',
            'status' => 'required',
            'salary' => 'required|numeric',
        ]);

        // Function to format input
        function formatInput(string $name): string
        {
            $name = trim($name);
            $name = preg_replace('/\s+/', ' ', $name);
            $words = explode(' ', $name);
            foreach ($words as &$word) {
                $word = ucfirst(strtolower($word));
            }
            return implode(' ', $words);
        }

        // Format input values
        $request['first_name'] = formatInput($request['first_name']);
        $request['last_name'] = formatInput($request['last_name']);
        $request['position'] = formatInput($request['position']);

        // Find and update the employee record
        $employee = Employee::findOrFail($id);
        $employee->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'gender' => $request->input('gender'),
            'position' => $request->input('position'),
            'status' => $request->input('status'),
            'salary' => $request->input('salary'),
        ]);

        return redirect()->route('index');
    }


    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('index');
    }
}
