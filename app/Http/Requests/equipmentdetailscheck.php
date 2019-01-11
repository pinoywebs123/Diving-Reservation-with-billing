<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class equipmentdetailscheck extends FormRequest
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
            'category'              => 'required|max:50',
            'equipment_size'        => 'required|max:20',
            'equipment_quantity'    => 'required|max:10',
            'equipment_price'       => 'required|max:10'
        ];
    }
}
