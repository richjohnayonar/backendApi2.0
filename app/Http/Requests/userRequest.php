<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if( request()->routeIs('user.store')){
            return [
            
                'name'      =>'required|string|max:255',
                'email'     =>'required|string|email|unique:App\Models\User,email|max:255',
                'password'  =>'required|min:12',
            ];
        }

        if( request()->routeIs('user.login')){
            return [
                'email'     =>'required|string|email|max:255',
                'password'  =>'required|min:12',
            ];
        }
        
        if(request()->routeIs('user.update')){
            $rules = [];

            if ($this->isMethod('put')) {
                if ($this->filled('name')) {
                    $rules['name'] = [
                        'required',
                        'string',
                        'max:255',
                        'regex:/^[a-zA-Z]*$/', // Only allow letters (uppercase and lowercase)
                    ];
                }
        
                if ($this->filled('email')) {
                    $rules['email'] = [
                        'required',
                        'string',
                        'email',
                        'max:255',
                        'regex:/^[^!#<>\/\\\[\]{}%^*&()]*$/',
                        'unique:App\Models\User,email',
                    ];
                    
                }
        
                if ($this->filled('password')) {
                    $rules['password'] = [
                        'required',
                        'min:12',
                        'regex:/^[a-zA-Z*\#@]*$/', // Allow letters (uppercase and lowercase), *, #, @
                    ];
                }
            }
        
            return $rules;
        }
        }
       
}
