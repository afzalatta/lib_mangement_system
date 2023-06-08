<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Author;
use Redirect;
use Session;
use Hash;
use Auth;

class AuthorController extends Controller
{
        public function author_list()
            {
                $all_authors = Author::orderBy('id', 'desc')->get();
                return view('admin.author.author_list' , compact('all_authors'));
            }

        public function add_author_view()
            {
                return view('admin.author.add_author' );
            }

        public function add_author(Request $request)
            {
                $rules = [
                    'name' => 'required',
                ];
                $this->validate($request, $rules);

                $name = $request->input('name');

                $data = array(
                    'name' => $name
                    );

                    Author::insert($data);


                Session::flash('success', 'Author Added');
                return redirect('admin/authors');
            }

        public function edit_author_view($id)
            {
                $author = Author::where('id',$id)->first();
                return view('admin.author.edit_author', compact('author'));
            }

        public function edit_author(Request $request, $id)
            {
                $rules = [
                    'name' => 'required'
                ];
                $this->validate($request, $rules);

                $name = $request->input('name');

                Author::where('id',$id)->update(
                    [
                        'name' => $name
                    ]);
                Session::flash('success', 'Author Edited ');
                return redirect('admin/authors');
            }

        public function delete_author($id)
            {
                $ifexist = Author::where([
                'id' => $id
                ])->delete();

                Session::flash('success', 'Author Deleted!');
                return redirect('/admin/authors');
            }
}
