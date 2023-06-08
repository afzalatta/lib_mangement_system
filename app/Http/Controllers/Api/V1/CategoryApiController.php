<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categories;
use Image;
use Illuminate\Support\Facades\Validator;

class CategoryApiController extends Controller
{
    //
    public function categories()
    {
        return [
            'status' => true,
            'message'=> 'Categories have been listed',
            'data'=> Categories::get()
        ];
    }

    public function addCategory(Request $request)
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

        if($request->file('image') )
        {
            $image = $request->file('image');
            $input['photo'] = time().'.'.$image->extension();

            $filePath = public_path('/uploads/category');

            $img = Image::make($image->path());
            $img->resize(200, 200, function ($const) {
                $const->aspectRatio();
            })->save($filePath.'/'.$input['photo']);

            $filePath = public_path('/uploads/category');
            $image->move($filePath, $input['photo']);

            $images= $input['photo'];

        }
        else{
            $images= '';
        }
        $name = $request->input('name');

        $data = array(
            'name' => $name,
            'image' => $images,
             );
        $category = categories::create($data);
        return [
            'status'=> true,
            'message' => 'Category has been added successfully',
            'data'=> $category
        ];


    }

    public function updateCategory(Request $request ,$id)
    {
        $validator = Validator::make($request->all(),[
            'id'=> 'required|max:255',
            'name' => 'required'
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

                $filePath = public_path('/uploads/category/');

                $img = Image::make($image->path());
                $img->resize(200, 200, function ($const) {
                    $const->aspectRatio();
                })->save($filePath.'/'.$input['photo']);

                $filePath = public_path('/uploads/category');
                $image->move($filePath, $input['photo']);

                $images= $input['photo'];
                categories::where('id', $id)
                    ->update([
                    'image' =>  $images,

                ]);
            }

            $name = $request->input('name');
            $images =$request->input('image');

            $data = array(
                'id'=>$id,
                'name'=>$name,
                'image' => $images,
                 );

                 $category = categories::find($request->id);
                 $category->name = $request->name;
                 $category->save();

            return [
                'status'=> true,
                'message' => 'Category has been updated successfully',

                'data'=> $category
            ];
    }

    public function deleteCategory($id)
    {
    //    dd($id);
       $category = categories::find($id);
       if(is_null($category))
       {

         return [
            'status' => false,
            'message'=> 'Category not found',
            'data' =>[]
           ];
       }
       $category->delete();

       return [
        'status' => true,
        'message'=> 'Category has been deleted',
        'data'=>$category
       ];
    }

}
