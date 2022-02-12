<?php

use Illuminate\Support\Facades\Route;
use\App\Http\Controllers\NotesController;

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

//Route::view('read','Note.read');
//Route::view('create','Note.create');
Route::view('createnotes','Note.create');
Route::post("createnote",[NotesController::class,'store']);
Route::get('records',[NotesController::class,'record']);
Route::get("edit/notes/{id}",[NotesController::class,'edit']);
Route::get("delete/notes/{id}",[NotesController::class,'destroy']);
Route::post("updatenote",[NotesController::class,'updateNotes'])->name('updatenote');