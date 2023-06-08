<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Categories;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    //

    public function index()
    {
        $category = Category::get();
        $uploadPath = 'public/uploads/category/';
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.'.$ext;

            $file->move('public/uploads/category/', $filename);
            $category->$image = $uploadPath.$filename;

        }

        return view('student.layout.home',compact('categories'));
    }

    public function categoryDetail($id)
    {
         $category = Categories::with('books')->where('id', $id)->first();
         $books = $category->books;
         return view('student.home', compact('books'));
    }


}
