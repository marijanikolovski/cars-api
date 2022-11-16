<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCarRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'brand' => 'required|min:2',
            'model' => 'required|min:2',
            'year' => 'required|integer',
            'max_speed' => 'nullable|integer|between:20,300',
            'is_automatic' => 'required|boolean',
            'engine' => 'required',
            'number_of_doors' => 'required|integer|between:2,5',
        ];
    }
}
