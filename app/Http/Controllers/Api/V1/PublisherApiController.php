<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publisher;
use Image;
use Illuminate\Support\Facades\Validator;

class PublisherApiController extends Controller
{
    //
    public function addPublisher(Request $request)
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

           $publisher = Publisher::create($data);
            return [
                'status'=> true,
                'message' => 'Publisher has been added successfully',

                'data'=> $publisher
            ];
    }

    public function updatePublisher(Request $request)
    {
        $validator = Validator::make($request->all(),[
                            'name' => 'required|max:255',
                            'id' => 'required',
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
            'name' => $name,

            );

           $publisher = Publisher::find($request->id);
           $publisher->name = $request->name;
           $publisher->save();

            return [
                'status'=> true,
                'message' => 'Publisher has been updated successfully',
                'data'=> $publisher
            ];
    }


        public function deletePublisher($id)
        {
        //    dd($id);
           $publisher = Publisher::find($id);
           if(is_null($publisher))
           {

             return [
                'status' => false,
                'message'=> 'Publisher not found',
                'data' =>[]
               ];
           }
           $publisher->delete();

           return [
            'status' => true,
            'message'=> 'Publisher has been deleted',
            'data'=>$publisher
           ];
        }

}
