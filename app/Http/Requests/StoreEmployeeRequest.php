<?php

namespace App\Http\Requests;

use App\Models\Employee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('employee_create');
    }

    public function rules()
    {
        return [
            'code' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'unique:employees,code',
            ],
            'name' => [
                'string',
                'required',
            ],
            'start_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'details' => [
                'required',
            ],
            'image' => [
                'required',
            ],
        ];
    }
}
