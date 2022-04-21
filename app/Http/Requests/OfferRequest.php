<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
        return  [
            'name.required' => __('messages.name is required'),
            'price.numeric' => trans('messages.price must be numeric'),
            'details.required' =>'التفاصيل مطلوبة',
        ];
    }

    public function messages() {
        return  [
            'name' => 'required|max:100|unique:offers,name',
            'price' => 'required|numeric',
            'details' =>'required',
        ];
    }
}
