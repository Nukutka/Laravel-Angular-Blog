<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function store(CategoryRequest $request)
    {
         $category = Category::create($request->validated());
         return $category;
    }

    public function show($id)
    {
       $category = Category::findOrFail($id);
       return $category;
    }

    public function update(CategoryRequest $request, $id)
    {
         $category = Category::findOrFail($id);
         $category->fill($request->validated());
         $category->save();
         return $category;
    }

     public function destroy($id)
     {
         $category = Category::findOrFail($id);
         if ($category->delete()) return response(null, 204);
     }
}
