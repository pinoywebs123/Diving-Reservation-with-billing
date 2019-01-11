<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class reservationcheck extends FormRequest
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
            'start_date' => 'required|max:20',
            'end_date' => 'required|max:20',
            'person' => 'required|max:3',
            'diver' => 'required|max:5'
            
        ];
    }
}
