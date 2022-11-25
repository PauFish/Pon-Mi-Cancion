<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function rules()
    {
        switch (request()->getMethod()) {
            case 'GET':
                return [
                    'id'        => 'numeric|min:1',
                    'name'      => 'required|string|max:20',
                ];

            case 'POST':
                    return [
                    'name'      => 'required|string|max:20',
                    ];

            case 'PUT':
                return [
                    'name'      => 'required|string|max:20',
                ];

            case 'DELETE':
                return [
                    'id'        => 'numeric|min:1'
                ];

            default:
                return [];
        }
    }
}