<?php
use App\Models\Student;


Route::get('admin/students', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    $all_students = Student::orderBy('id', 'desc')->get();


    return view('admin.students.student_list',compact('all_students'));

    // return view('admin.home');
})->name('admin.home');

Route::group([ 'prefix' => 'admin', 'domain' => env('APP_DOMAIN'), 'namespace' => 'Admin'], function () {

    //================ Admin Profile ===================//
    Route::get('/edit/profile', 'AdminController@admin_edit_view');
    Route::post('/edit/admin', 'AdminController@edit_admin');
    Route::get('/password/edit', 'AdminController@edit_password_view');
    Route::post('/edit/password', 'AdminController@edit_password');

    //================ students  ===================//
    Route::get('/students', 'StudentController@student_list');
    Route::get('/student/add', 'StudentController@add_student_view');
    Route::post('/student/add', 'StudentController@add_student');
    Route::get('/student/edit/{id}', 'StudentController@edit_student_view');
    Route::post('/student/edit/{id}', 'StudentController@edit_student');
    Route::get('/student/delete/{id}', 'StudentController@delete_student');

    //================ categories  ===================//
    Route::get('/categories', 'CategoryController@category_list');
    Route::get('/category/add', 'CategoryController@add_category_view');
    Route::post('/category/add', 'CategoryController@add_category');
    Route::get('/category/edit/{id}', 'CategoryController@edit_category_view');
    Route::post('/category/edit/{id}', 'CategoryController@edit_category');
    Route::get('/category/delete/{id}', 'CategoryController@delete_category');

    //================ Authors  ===================//
    Route::get('/authors', 'AuthorController@author_list');
    Route::get('/author/add', 'AuthorController@add_author_view');
    Route::post('/author/add', 'AuthorController@add_author');
    Route::get('/author/edit/{id}', 'AuthorController@edit_author_view');
    Route::post('/author/edit/{id}', 'AuthorController@edit_author');
    Route::get('/author/delete/{id}', 'AuthorController@delete_author');

    //================ Publishers  ===================//
    Route::get('/publishers', 'PublisherController@publisher_list');
    Route::get('/publisher/add', 'PublisherController@add_publisher_view');
    Route::post('/publisher/add', 'PublisherController@add_publisher');
    Route::get('/publisher/edit/{id}', 'PublisherController@edit_publisher_view');
    Route::post('/publisher/edit/{id}', 'PublisherController@edit_publisher');
    Route::get('/publisher/delete/{id}', 'PublisherController@delete_publisher');

    //================ Books  ===================//
    Route::get('/books', 'BookController@book_list');
    Route::get('/book/add', 'BookController@add_book_view');
    Route::post('/book/add', 'BookController@add_book');
    Route::get('/book/edit/{id}', 'BookController@edit_book_view');
    Route::post('/book/edit/{id}', 'BookController@edit_book');
    Route::get('/book/delete/{id}', 'BookController@delete_book');
    Route::post('/book/status/{id}', 'BookController@status');

    //================ Books  ===================//
    Route::get('/book/issue/{book_id}', 'BookIssueController@book_list');
    Route::get('/book/issue/add/{book_id}', 'BookIssueController@add_book_view');
    Route::post('/book/issue/add/{book_id}', 'BookIssueController@add_book');
    Route::get('/book/issue/delete/{id}/{book_id}', 'BookIssueController@delete_book');
    Route::post('/book/issue/status/{id}/{book_id}', 'BookIssueController@status');

    //================ Books Orders ===================//
    Route::get('/orders', 'BookOrdersController@order_list');
    Route::get('/order/delete/{id}', 'BookOrdersController@delete_order');
    Route::post('/order/status/{id}', 'BookOrdersController@status');

    //==================== Email Template  ========================//
    Route::get('/email_templates', 'EmailContentController@template_list');
    Route::get('/email_template/edit/{id}', 'EmailContentController@edit_template_view');
    Route::post('/email_template/edit/{id}', 'EmailContentController@edit_template');
    Route::get('/email_template/delete/{id}', 'EmailContentController@delete_template');

    //================ Settings ===================//
    Route::get('/settings', 'SettingsController@view_settings');
    Route::post('/setting/edit', 'SettingsController@edit_setting');
    Route::get('/setting/status', 'SettingsController@status');

});
