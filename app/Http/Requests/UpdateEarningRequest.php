<?php

namespace App\Http\Requests;

use App\Models\Earning;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEarningRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('earning_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'academic_background' => [
                'string',
                'nullable',
            ],
            'exam_year' => [
                'string',
                'nullable',
            ],
            'amount' => [
                'required',
            ],
            'earning_date' => [
                'nullable',
                'date',
            ],
            'earning_month' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'earning_year' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'earning_reference' => [
                'string',
                'nullable',
            ],
            'payment_method' => [
                'string',
                'nullable',
            ],
            'payment_proof' => [
                'array',
            ],
            'paid_by' => [
                'string',
                'nullable',
            ],
            'recieved_by' => [
                'string',
                'nullable',
            ],
        ];
    }
}
