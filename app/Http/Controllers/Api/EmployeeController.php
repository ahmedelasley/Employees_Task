<?php

namespace App\Http\Controllers\Api;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\EmployeeCollection;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $employees = EmployeeResource::collection(Employee::paginate(10));
        // return $this->apiResponse($employees, 200, "OK");

        $employees = Employee::with('user')->paginate(10);
        return new  EmployeeCollection($employees);
    }

    public function getemployeesHiredToday()
    {
        // $employees = EmployeeResource::collection(Employee::where('salary_day', date('d'))->paginate(10));
        // return $this->apiResponse($employees, 200, "OK");

        return new  EmployeeCollection(Employee::where('salary_day', date('d'))->paginate(10));
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
     * @param  \Illuminate\Http\EmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $validated = $request->validated();

        $employee = Employee::create([
            'name'          => $validated['name'],
            'birth_date'    => $validated['birth_date'],
            'salary'        => $validated['salary'],
            'salary_day'    => $validated['salary_day'],
        ]);

        if ($employee) {
            return $this->apiResponse(201, "Created Data", new EmployeeResource($employee));
        }
        return $this->apiResponse(400, 'The Employee Not Found', null);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::with('user')->find($id);
        if ($employee) {
            return $this->apiResponse(200, "Show Data", new EmployeeResource($employee));
        }
        return $this->apiResponse(400, 'The Employee Not Found', null);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\EmployeeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        $validated = $request->validated();

        $employee = Employee::find($id);

        if (!$employee) {
            return $this->apiResponse(400, 'The Employee Not Found', null);
        }

        $employee->update([
            'name'          => $validated['name'],
            'birth_date'    => $validated['birth_date'],
            'salary'        => $validated['salary'],
            'salary_day'    => $validated['salary_day'],
        ]);
        
        if ($employee) {
            return $this->apiResponse(201, "Updated Data", new EmployeeResource($employee));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            return $this->apiResponse(400, 'The Employee Not Found', null);
        }

        $employee->delete();
        if ($employee) {
            return $this->apiResponse(201, "Deleted Data", null);
        }
    }
}
