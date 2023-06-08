<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Categories;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Facades\Student;
use Redirect;
use Session;
use Image;
use Hash;
use \Carbon\Carbon;
use Illuminate\Support\Collection;


class CategoryController extends Controller
{
    public function category_list()
    {
        // return Student::allCategory();

        $all_category = Categories::orderBy('id', 'desc')->get();
        return view('admin.categories.category_list' , compact('all_category'));
    }

public function add_category_view()
    {
        return view('admin.categories.add_category' );
    }

public function add_category(Request $request)
    {
        $rules = [
            'name' => 'required',
        ];
        $this->validate($request, $rules);

        if($request->file('image') )
        {
            $image = $request->file('image');
            $input['photo'] = time().'.'.$image->extension();

            $filePath = public_path('uploads/category/');

            $img = Image::make($image->path());
            $img->resize(200, 200, function ($const) {
                $const->aspectRatio();
            })->save($filePath.'/'.$input['photo']);

            $filePath = public_path('uploads/category');
            $image->move($filePath, $input['photo']);

            $images= $input['photo'];


        }
        else{
            $images= '';
        }


        $name = $request->input('name');
        $image = $request->input('image');

        $data = array(
            'name' => $name,
            'image' => $images
             );

             Categories::insert($data);


        Session::flash('success', 'Category Added');
        return redirect('admin/categories');
    }

public function edit_category_view($id)
    {
        $category = Categories::where('id',$id)->first();
        return view('admin.categories.edit_category', compact('category'));
    }

public function edit_category(Request $request, $id)
    {
        $rules = [
            'name' => 'required'
        ];
        $this->validate($request, $rules);

        $name = $request->input('name');
        $image = $request->input('image');

        Categories::where('id',$id)->update(
            [
                'name' => $name,
                'image'=>$image
            ]);

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
                Book::where('id', $id)
                    ->update([
                    'image' =>  $images
                ]);
            }
        Session::flash('success', 'Category Edited ');
        return redirect('admin/categories');
    }

public function delete_category($id)
    {
        $ifexist = Categories::where([
        'id' => $id
         ])->delete();

         Session::flash('success', 'Category Deleted!');
         return redirect('/admin/categories');
    }
}
