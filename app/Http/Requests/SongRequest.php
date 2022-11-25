<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SongRequest extends FormRequest
{
    public function rules()
    {
        switch (request()->getMethod()) {
         
            case 'GET':
                return [
                    'id'            => 'numeric|min:1',
                    'title'          => 'required|string|max:25',
                    'artist'      => 'required|password|confirmed|min:8|max:25',
                ];

                case 'POST':
                    return [
                        'title'          => 'required|string|max:25',
                        'artist'      => 'required|password|confirmed|min:8|max:25',
                        
                    ];

                case 'PUT':
                    return [
                    'title'          => 'required|string|max:25',
                    'artist'      => 'required|password|confirmed|min:8|max:25',
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
