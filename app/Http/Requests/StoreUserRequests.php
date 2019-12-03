<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequests extends FormRequest
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
    public function rules($id = 0)
    {
        $id = (int) $this->segment(2) ?? '';
        return [
            'email' => ['required', 'email', 'max:255', 'unique:users, "email", '.$id], 
            'name' => ['required', 'min:4', 'max:255'], 
            'phone' => ['required', 'max:255'],
            'birthday' => ['date_format:d/m/Y'],
            'password' => ['required', 'min:6', 'max:255'],
            'password_confirmation' => ['required', 'same:password'],
        ];

    }


    
}
