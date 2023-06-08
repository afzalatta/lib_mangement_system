<?php


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::group(['middleware'=>'auth:api','prefix'=>'v1'], function (){
    Route::get('book/lists', 'Api\V1\BookApiController@books');
    Route::post('book/add_book', 'Api\V1\BookApiController@add_books');
    Route::get('category/lists', 'Api\V1\CategoryApiController@categories');
    Route::post('category/add_category', 'Api\V1\CategoryApiController@addCategory');
    Route::post('category/update_category/{id}', 'Api\V1\CategoryApiController@updateCategory');
    Route::get('category/delete/{id}', 'Api\V1\CategoryApiController@deleteCategory');
});


/*=====================Publisher========================*/
Route::group(['middleware'=>'auth:api','prefix'=>'v1'], function (){
    Route::post('publisher/add_publisher', 'Api\V1\PublisherApiController@addPublisher');
    Route::post('publisher/update_publisher/', 'Api\V1\PublisherApiController@updatePublisher');
    Route::get('publisher/delete/{id}', 'Api\V1\PublisherApiController@deletePublisher');

});


/*=====================Author========================*/
Route::group(['middleware'=>'auth:api','prefix'=>'v1'], function (){
    Route::post('author/add_author', 'Api\V1\AuthorApiController@addAuthor');
    Route::post('author/update_author/{id}', 'Api\V1\AuthorApiController@updateAuthor');
    Route::get('author/delete/{id}', 'Api\V1\AuthorApiController@deleteAuthor');


});


/*=====================User Registration & Login========================*/
Route::prefix('v1')->group(function () {

   Route::post('user/login', 'Api\V1\AuthApiController@login');
   Route::post('user/register', 'Api\V1\AuthApiController@register');



});
