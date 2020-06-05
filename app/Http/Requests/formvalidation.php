<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class formvalidation extends FormRequest
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
            'gstno' => 'required|unique:customers,gst_no',
            'phoneno' => 'required|max:12,phone_no',
        ];
    }
}
