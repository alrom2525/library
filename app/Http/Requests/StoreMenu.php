<?php

namespace App\Http\Requests;

use App\Rules\menuUrl;
use Illuminate\Foundation\Http\FormRequest;


class StoreMenu extends FormRequest
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
            'name' => 'required|max:50|unique:menus,name,' . $this->route('id'),
            'url'  => ['required','max:200', new menuUrl],
            'icon' => 'nullable|max:100',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */

    /*
    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'url.required'  => 'URL is required',
        ];
    } -- Now we are installed the language locale */
}
