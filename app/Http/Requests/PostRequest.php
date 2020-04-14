<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $postRules = [
            'title' => 'required|string',
            'body' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id'
        ];

        $putRules = [
            'title' => 'required|string',
            'body' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id'
        ];
  
        switch ($this->getMethod())
        {
            // case 'GET':
            //     return $getRules;
            case 'POST': 
                return $postRules; 
            case 'PUT': 
                return $putRules;
            // case 'DELETE':
            //     return $deleteRules;
        }
    }
}
