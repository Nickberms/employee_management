<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
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
    public function edit(Employee $employee)
    {
        return view('edit', ['employee' => $employee]);
    }
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