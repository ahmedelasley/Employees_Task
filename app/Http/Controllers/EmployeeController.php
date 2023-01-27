<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EmployeeRequest;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{
    // Use Alert;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('user')->latest()->paginate(10);

        return view('employees.index',
                        compact(
                            'employees',
                        ));
    }

    public function getEmployeesHiredToday()
    {
        $employees = Employee::with('user')->select(['name', 'salary'])->where('salary_day', date('d'))->paginate(10);

        return view('employees.employeesHiredToday',
                        compact(
                            'employees',
                        ));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {

        try {
            $validated = $request->validated();
            Employee::create([
                'name'          => $validated['name'],
                'birth_date'    => $validated['birth_date'],
                'salary'        => $validated['salary'],
                'salary_day'    => $validated['salary_day'],
                'user_id'       => $validated['user_id'],
            ]);
            toast('Data Added Successfully','success');
            return redirect()->route('employees.index');
        } catch (\Exception $e) {
            toast(['error' => $e->getMessage()],'error');
            return redirect()->route('employees.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {

        return view('employees.editEmployee',
        compact(
            'employee',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {

        try {
            $validated = $request->validated();

            $employee->update([
                'name'          => $validated['name'],
                'birth_date'    => $validated['birth_date'],
                'salary'        => $validated['salary'],
                'salary_day'    => $validated['salary_day'],
                'user_id'       => $validated['user_id'],
            ]);
            toast('Data Updated Successfully','success');
            return redirect()->route('employees.index');

        } catch (\Exception $e) {

            toast(['error' => $e->getMessage()],'error');
            return redirect()->route('employees.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        try {
            $employee->delete();
            toast('Data Deleted Successfully','success');
            return redirect()->route('employees.index');
        } catch (\Exception $e) {
            toast(['error' => $e->getMessage()],'error');
            return redirect()->route('employees.index');
        }
    }
}
