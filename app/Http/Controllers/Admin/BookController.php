<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Categories;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\BookStatus;
use Redirect;
use Session;
use Image;
use Hash;
use Auth;
use \Carbon\Carbon;
use Illuminate\Support\Collection;

class BookController extends Controller
{
    public function book_list()
        {
            // $collection = new Collection([
            //     'jhon', 'tom', 'mike', 'stuart'
            // ]);

            // $products = Collection::wrap($collection);

            // // Change all items to uppercase and create a new collection of them
            // // $names = $collection->map(function($item, $key) {
            // //    return strtoupper($item);
            // // });

            // return $products;


            $all_books = Book::with('status_book')->orderBy('id', 'desc')->get();
            // return $all_books;
            $all_status = BookStatus::all();
            return view('admin.book.book_list' , compact('all_books','all_status'));
        }

    public function add_book_view()
        {
            $categories = Categories::all();
            $publishers = Publisher::all();
            $authors = Author::all();

            return view('admin.book.add_book' , compact('categories','publishers','authors'));
        }

    public function add_book(Request $request)
        {
            $rules = [
                'name' => 'required',
                'category' => 'required',
                'publisher' => 'required',
                'author' => 'required',
                'price' => 'required',
                'qty' => 'required'
            ];
            $this->validate($request, $rules);

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
            $category = $request->input('category');
            $publisher = $request->input('publisher');
            $author = $request->input('author');
            $price = $request->input('price');
            $qty = $request->input('qty');

            $data = array(
                'name' => $name,
                'category_id' => $category,
                'publisher_id' => $publisher,
                'author_id' => $author,
                'price' => $price,
                'quantity' => $qty,
                'image' => $images,
                 );

                 Book::insert($data);

            Session::flash('success', 'Book Added');
            return redirect('admin/books');
        }

    public function edit_book_view($id)
        {

            $categories = Categories::all();
            $publishers = Publisher::all();
            $authors = Author::all();

            $book = Book::where('id',$id)->first();
            return view('admin.book.edit_book', compact('book','categories','publishers','authors'));
        }

    public function edit_book(Request $request, $id)
        {
            $rules = [
                'name' => 'required',
                'category' => 'required',
                'publisher' => 'required',
                'author' => 'required',
                'price' => 'required',
                'qty' => 'required'
            ];
            $this->validate($request, $rules);

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
                Book::where('id', $id)
                    ->update([
                    'image' =>  $images
                ]);
            }

            $name = $request->input('name');
            $category = $request->input('category');
            $publisher = $request->input('publisher');
            $author = $request->input('author');
            $price = $request->input('price');
            $qty = $request->input('qty');

            Book::where('id',$id)->update(
                [
                    'name' => $name,
                    'category_id' => $category,
                    'publisher_id' => $publisher,
                    'author_id' => $author,
                    'price' => $price,
                    'quantity' => $qty,
                ]);
            Session::flash('success', 'Book Edited ');
            return redirect('admin/books');
        }

    public function status(Request $request ,$id)
        {
            $status_id = $request->status;

            if($status_id!='')
                {
                    Book::where(['id'=>$id])->update(['status' =>  $status_id ]);
                    Session::flash('success', 'Status has been changed ');
                }

            return redirect('/admin/books');
        }

    public function delete_book($id)
        {
            $ifexist = Book::where([
            'id' => $id
             ])->delete();

             Session::flash('success', 'Book Deleted!');
             return redirect('/admin/books');
        }
}
