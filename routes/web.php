<?php
use App\Task;

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
// for step 10 Layouts and Structure

Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');

Route::get('/posts/tags/{tag}', 'TagsController@index');

Route::post('/posts/{post}/comment', 'CommentsController@store');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
//below from earlier series

// Route::get('tasks', 'TasksController@index');
// Route::get('tasks/{task}', 'TasksController@show');

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('about', function () {
//     $guests = ['John Doe',
//             'Jane Lane',
//             'Richard Braveheard'];
//     return view('about', compact('guests'));
// });
