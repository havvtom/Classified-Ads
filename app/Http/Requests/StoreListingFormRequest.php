<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreListingFormRequest extends FormRequest
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
            'title' => 'required|string',
            'body' => 'required|max:200',
            'category_id' => [
                'required',
                \Illuminate\Validation\Rule::exists('categories', 'id')->where( function ($query) {
                    $query->where('usable', true);
                })
            ],
            'area_id' => [
                'required',
                \Illuminate\Validation\Rule::exists('areas', 'id')->where( function ($query) {
                    $query->where('usable', true);
                })
            ]
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'You need to enter a title'
        ];
    }

}
