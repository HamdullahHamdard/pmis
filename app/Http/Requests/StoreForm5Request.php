<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreForm5Request extends FormRequest
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
            //
            // "requested_dept_id"=> "required|integer",
            // "submission_id"=> "required|integer",
            // "distribution_no"=> "required|integer",
            // "distribution_date"=> "required|string",
            // "warehouse_distributer_name"=> "required|string",
            // "form9_number"=> "required|integer",
            // "form9_date"=> "required|string",
            // "details"=> "required|string",
            // "total"=> "required|integer",

        ];
    }
}
