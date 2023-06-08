<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Session;
use Image;
use Illuminate\Support\Facades\Validator;

class BookApiController extends Controller
{
    //
    public function books(){
        return [
            'status' => true,
            'message'=> 'Books have been listed',
            'data'=> Book::get()
        ];
    }

    public function add_books(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required',
            'publisher_id' => 'required',
            'author_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',


            ]);
        if($validator->fails()){
            $errors = $validator->errors();
            return [
                'status'=> false,
                'message'=> $validator->errors()->first(),
                'data'=> []
            ];
        }

        if($request->file('image') )
        {
            $image = $request->file('image');
            $input['photo'] = time().'.'.$image->extension();

            $filePath = public_path('/uploads/books/thumbs');

            $img = Image::make($image->path());
            $img->resize(200, 200, function ($const) {
                $const->aspectRatio();
            })->save($filePath.'/'.$input['photo']);

            $filePath = public_path('/uploads/books');
            $image->move($filePath, $input['photo']);

            $images= $input['photo'];

        }
        else{
            $images= '';
        }

        $name = $request->input('name');
        $category = $request->input('category_id');
        $publisher = $request->input('publisher_id');
        $author = $request->input('author_id');
        $price = $request->input('price');
        $qty = $request->input('quantity');

        $data = array(
            'name' => $name,
            'category_id' => $category,
            'publisher_id' => $publisher,
            'author_id' => $author,
            'price' => $price,
            'quantity' => $qty,
            'image' => $images,
             );
        $book = Book::create($data);
        return [
            'status'=> true,
            'message' => 'Book has been added successfully',
            'data'=> $book
        ];


    }
}
