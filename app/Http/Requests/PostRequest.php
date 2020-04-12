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
            'category_id' => 'required|integer|exists:categories,id',
            'user_id' => 'required|integer|exists:users,id'
        ];

        $putRules = [
            'title' => 'required|string',
            'body' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id', 
            'user_id' => 'required|integer|exists:users,id'
            // TODO: сделать внешние ключи неизменными для юзеров ?
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
