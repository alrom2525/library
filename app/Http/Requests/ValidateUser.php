<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateUser extends FormRequest
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
        if($this->route('id')){
            // Edition
            return [
                'name' => 'required|max:50',
                'email' => 'required|email|max:100|unique:users,email,' . $this->route('id'),
                'password' => 'required|min:8',
                're_password' => 'required|min:8|same:password',
                'role_id' => 'required|integer'
            ];
        } else {
            // Creation process
            return [
                'name' => 'required|max:50',
                'email' => 'required|email|max:100,' . $this->route('id'),
                'password' => 'nullable|min:8',
                're_password' => 'nullable|required_with:password|min:8|same:password',
                'role_id' => 'required|integer'
            ];
        }
    }
}
