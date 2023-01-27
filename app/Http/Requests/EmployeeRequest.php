<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'          => 'required|string|min:3',
            'birth_date'    => 'required|date',
            'salary'        => 'required|decimal:0,2',
            'salary_day'    => 'required|integer|gte:1|lte:31',
            'user_id'    => 'required|numeric|exists:users,id',
        ];
    }

    
    public function messages ()
    {
        return [
            'name.required' =>  __('validation.required'),
            'name.string' =>  __('validation.string'),
            'name.min' =>  __('validation.min'),

            'birth_date.required' =>  __('validation.required'),
            'birth_date.date' =>  __('validation.date'),


            'salary.required' =>  __('validation.required'),
            'salary.decimal' =>  __('validation.decimal'),


            'salary_day.required' =>  __('validation.required'),
            'salary_day.integer' =>  __('validation.integer'),
            'salary_day.gte' =>  __('validation.gte'),
            'salary_day.lte' =>  __('validation.lte'),

            'user_id.required' =>  __('validation.required'),
            'user_id.numeric' =>  __('validation.numeric'),
            'user_id.exists' =>  __('validation.exists'),


        ];
    }

    public function validationAttributes ()
    {
        return  [
            'name' => __('Employee Name'),
            'birth_date' => __('Employee Birth Date'),
            'salary' => __('Employee Salary'),
            'salary_day' => __('Salary Receipt Day'),
            'user_id' => __('User Name'),
        ];
    }
}
