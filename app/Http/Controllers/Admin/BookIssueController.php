<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\BookIssue;
use App\Models\Student;
use App\Models\BookIssueStatus;
use Redirect;
use Session;
use Hash;
use Auth;

class BookIssueController extends Controller
{
    public function book_list($book_id)
        {
            $all_books = BookIssue::with('status_issue')->where('book_id',$book_id)->orderBy('id', 'desc')->get();
            // return $all_books;
            $all_status = BookIssueStatus::all();
            return view('admin.book_issue.book_list' , compact('all_books','all_status','book_id'));
        }

    public function add_book_view($book_id)
        {

            $students = Student::all();

            return view('admin.book_issue.add_book' , compact('students','book_id'));
        }

    public function add_book(Request $request,$book_id)
        {
            $rules = [
                'student' => 'required',
                'return_date' => 'required',
            ];
            $this->validate($request, $rules);

            $student = $request->input('student');
            $return_date = $request->input('return_date');

            $data = array(
                'student_id' => $student,
                'book_id' => $book_id,
                'return_date' => $return_date,
                 );

                 BookIssue::insert($data);

            Session::flash('success', 'Issue Book Added');
            return redirect('admin/book/issue/'.$book_id);
        }


    public function status(Request $request ,$id,$book_id)
        {
            $status_id = $request->status;

            if($status_id!='')
                {
                    BookIssue::where(['id'=>$id])->update(['issue_status_id' =>  $status_id ]);
                    Session::flash('success', 'Status has been changed ');
                }

            return redirect('admin/book/issue/'.$book_id);
        }

    public function delete_book($id,$book_id)
        {
            $ifexist = BookIssue::where([
            'id' => $id
             ])->delete();

             Session::flash('success', 'Issue Book Deleted!');
             return redirect('admin/book/issue/'.$book_id);
        }
}
