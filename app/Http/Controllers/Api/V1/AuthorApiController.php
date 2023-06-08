<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use Image;
use Illuminate\Support\Facades\Validator;

class AuthorApiController extends Controller
{
    //
    public function addAuthor(Request $request)
    {
        $validator = Validator::make($request->all(),[

            'name' => 'required|max:255',
            ]);

        if($validator->fails()){
            $errors = $validator->errors();
            return [
                'status'=> false,
                'message'=> $validator->errors()->first(),
                'data'=> []
            ];
        }

        $name = $request->input('name');

        $data = array(
            'name' => $name
            );

           $author = Author::create($data);
            return [
                'status'=> true,
                'message' => 'Author has been added successfully',

                'data'=> $author
            ];
    }

    public function updateAuthor(Request $request, $id)

     {
        $validator = Validator::make($request->all(),[
            'id' => 'required',
            'name' => 'required|max:255'

             ]);

        if($validator->fails()){
            $errors = $validator->errors();
            return [
                'status'=> false,
                'message'=> $validator->errors()->first(),
                'data'=> []
            ];
        }

        $name = $request->input('name');

        $data = array(

            'name' => $name

            );

           $author = Author::find($request->id);
           $author->name = $request->name;
           $author->save();

            return [
                'status'=> true,
                'message' => 'Author has been updated successfully',
                'data'=> $author
            ];
    }

    public function deleteAuthor($id)
    {
    //    dd($id);
       $author = Author::find($id);
       if(is_null($author))
       {

         return [
            'status' => false,
            'message'=> 'Author not found',
            'data' =>[]
           ];
       }
       $author->delete();

       return [
        'status' => true,
        'message'=> 'Author has been deleted',
        'data'=> $author
       ];
    }
}
