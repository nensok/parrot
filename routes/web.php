<?php


Auth::routes();
//email verificationn
Auth::routes(['verify' => true]); 

Route::post('follow/{user}','FollowsController@store');

Route::get('/', 'WelcomeController@index');

Route::get('/post', 'PostsController@index');
Route::get('/p/create', 'PostsController@create');
Route::post('/p', 'PostsController@store');
Route::get('/p/{post}/edit', 'PostsController@edit');
// Route::get('/p/{post}', 'PostsController@show');
Route::patch('/post-update/{user}', 'PostsController@update');
Route::delete('/post-delete/{post}', 'PostsController@destroy');


Route::post('/hitlike', 'PostsController@like');
Route::post('/misslike', 'PostsController@dislike');
Route::get('/getlike', 'PostsController@getlike');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

Route::post('/comment', 'CommentsController@store');

//social route

Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');
