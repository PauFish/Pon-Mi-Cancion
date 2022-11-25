<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules()
    {
        switch (request()->getMethod()) {
         
            case 'POST':
                return [
                    'name'          => 'required|string|max:20',
                    'password'      => 'required|password|confirmed|min:8|max:20',
                    'email'         => 'required|email|unique|max:20',
                    'phone'         => 'required|phone|unique|max:15',
                    'role_id'       => 'required|numeric|min:1'
                ];

            case 'GET':
                return [
                    'id'            => 'numeric|min:1',
                    'name'          => 'required|string|max:20',
                    'password'      => 'required|password|confirmed|min:8|max:20',
                    'email'         => 'required|email|unique|max:20',
                    'phone'         => 'required|phone|unique|max:15',
                    'role_id'       => 'required|numeric|min:1'
                ];

                case 'PUT':
                    return [
                        'name'          => 'required|string|max:20',
                        'password'      => 'required|password|confirmed|min:8|max:20',
                        'email'         => 'required|email|unique|max:20',
                        'phone'         => 'required|phone|unique|max:15',
                        'role_id'       => 'required|numeric|min:1'
                    ];
    
            case 'DELETE':
                return [
                    'id'            => 'numeric|min:1'
                ];
            default:
                return [];
        }
    }
}