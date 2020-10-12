<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequest extends FormRequest
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
            'title' => 'required|max:255'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'The :attribute is required!',
            'title.max' => 'The :attribute is to long, at least :max characters'
        ];
    }
}
