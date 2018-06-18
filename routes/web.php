<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@getFront');

Auth::routes();

Route::get('/home', 'PagesController@index')->name('home');
//book
Route::post('/book/add', 'BooksController@add')->name('addbook');
Route::get('/allbook', 'BooksController@getCatAll')->name('getcatall');
Route::get('/mybooks', 'BooksController@myBooks')->name('mybooks');
Route::get('/book/{id}', 'BooksController@getBook')->name('getbook');
Route::get('/book/edit/{id}','BooksController@editB')->name('edittbook');
Route::get('/book/delete/{id}','BooksController@delete')->name('deletebook');
Route::post('/book/edit', 'BooksController@edit');
//chapter
Route::post('/chapter/add', 'BooksController@addChapter')->name('addchapter');
Route::get('/chapter/edit/{id}', 'BooksController@editBook')->name('editbook');
Route::get('/chapter/read/{book}/{chapter}', 'ChaptersController@readChapter')->name('readchapter');
Route::get('/chapter/read/{book}', 'ChaptersController@readBook')->name('readbook');
//category
Route::get('/category/{id}', 'BooksController@getCat')->name('getcat');
//collection
Route::get('/collections/{id}', 'BooksController@getCol')->name('getcol');
//search
Route::get('/search', 'BooksController@search')->name('search');

//comment
Route::post('/comment/add', 'CommentsController@add')->name('commentadd');

//pages
Route::get('/page/{id}', 'PagesController@getPage')->name('pages');
//library
Route::get('/library/add/{id}', 'LibraryController@add')->name('libadd');
Route::get('/mylibrary', 'LibraryController@libraryGet')->name('lib');
Route::get('/library/delete/{id}', 'LibraryController@delete')->name('libdel');

// OAuth Routes
Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('/login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
//Orders
Route::get('/order/create/{id}', 'OrderController@createOrder');
Route::post('/order/accept','OrderController@acceptOrder');
//Blogs
Route::get('/myblogs', 'BlogsController@myBlogs');
Route::get('/blog/add', 'BlogsController@addBlog');
Route::post('/blog/addblog', 'BlogsController@addB');
Route::get('/blogs', 'BlogsController@getBlogs');
Route::get('/blog/{id}', 'BlogsController@getBlog');
Route::get('/blog/edit/{id}', 'BlogsController@editBlog');
Route::get('/blog/delete/{id}', 'BlogsController@deleteBlog');
Route::post('/blog/editblog','BlogsController@blogEdited');
Route::post('/commentblog/add', 'BlogsController@addComment');

//Statistic
Route::get('/statistic', 'PagesController@Statistic');
Route::get('/myfinance', 'PagesController@myFinance');

//Competition
Route::get('/competition/all', 'CompetitionController@getAll');
Route::get('/competition/{id}', 'CompetitionController@getComp');
Route::post('/competition/createorder', 'CompetitionController@createOrder');