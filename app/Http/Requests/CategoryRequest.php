<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'required|string'
        ];
  
        switch ($this->getMethod())
        {
            // case 'GET':
            //     return $getRules;
            case 'POST': 
                return $rules; 
            case 'PUT': 
                return $rules;
            // case 'DELETE':
            //     return $deleteRules;
        }
    }
}
