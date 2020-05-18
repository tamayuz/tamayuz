<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/' . app()->getLocale());


Route::group(['prefix' => '{language}'], function () {
    Auth::routes();

    Route::get("/", 'HomeController@index')->name('home');

    //temp
    Route::get('/projects', 'ArticleController@store')->name('projects');
    Route::get('/articles', 'ArticleController@index')->name('articles');
    Route::get('/About', 'ArticleController@store')->name('About');
    Route::get('/Contact', 'ArticleController@store')->name('Contact');


    //   Articles Routes

    Route::get('/articles', 'ArticleController@index')->name('articles.index');
    //

    Route::get('/articles/create', 'ArticleController@create')->name('articles.create');
    Route::post('/articles/store', 'ArticleController@store')->name('articles.store');
    //
    Route::get('/articles/manage','ArticleController@managerIndex')->name('articles.manage');
    //
    Route::get('/articles/{article}', 'ArticleController@show')->name('articles.show');
    //
    Route::get('/articles/{article}/edit', 'ArticleController@edit')->name('articles.edit');
    Route::post('/articles/{article}/update', 'ArticleController@update')->name('articles.update');
    //
    Route::delete('/articles/{article}/destroy', 'ArticleController@destroy')->name('articles.delete');
    //

    Route::post('/articles/{article}/accept','ArticleController@accept')->name('articles.accept');
    // Projects Routes


    Route::get('/projects', 'ProjectController@index')->name('projects.index');
    //
    Route::get('/projects/create', 'ProjectController@create')->name('projects.create');
    //
    Route::post('/projects/store', 'ProjectController@store')->name('projects.store');
    //
    Route::get('/projects/manage','ProjectController@managerIndex')->name('projects.manage');
    //
    Route::get('/projects/{project}', 'ProjectController@show')->name('projects.show');
    //
    Route::get('/projects/{project}/edit', 'ProjectController@edit')->name('projects.edit');
    //
    Route::post('/projects/{project}/update', 'ProjectController@update')->name('projects.update');
    //
    Route::delete('/projects/{project}/destroy', 'ProjectController@destroy')->name('projects.delete');
    //
    Route::post('/projects/{project}/accept','ProjectController@accept')->name('projects.accept');
    //
    Route::get('/users/', 'UserController@index')->name('users.index');
    //
    Route::get('/users/{user}/show', 'UserController@show')->name('users.show');
    //
    Route::delete('/users/{user}/delete', 'UserController@destroy')->name('users.delete');
    //
    Route::post('/users/{user}/makeAdmin', 'UserController@makeAdmin')->name('users.makeadmin');





    Route::get('/studymajors', 'StudyMajorController@index')->name('study_major.index');
    //
    Route::get('/studymajors/create', 'StudyMajorController@create')->name('study_major.create');
    //
    Route::post('/studymajors/store','StudyMajorController@store')->name('study_major.store');
    //
    Route::get('/seasons', 'SeasonController@index')->name('season.index');
    //
    Route::get('/seasons/create', 'SeasonController@create')->name('season.create');
    //
    Route::post('/seasons/store','SeasonController@store')->name('season.store');



});
