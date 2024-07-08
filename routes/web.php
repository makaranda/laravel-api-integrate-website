<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'students'], function () {
    Route::get('/', [StudentsController::class, 'index'])->name('students');
    Route::get('/add-student', [StudentsController::class, 'addStudent'])->name('student.add');
    Route::post('/save', [StudentsController::class, 'save'])->name('student.save');
    Route::get('/{stu_id}/delete', [StudentsController::class, 'delete'])->name('student.delete');
    Route::get('/{stu_id}/edit', [StudentsController::class, 'edit'])->name('student.edit');
    Route::post('/{stu_id}/update', [StudentsController::class, 'update'])->name('student.update');
    Route::get('/{stu_id}/manage', [StudentsController::class, 'vewRecords'])->name('student.manage');
    Route::post('/saveRecord', [StudentsController::class, 'saveRecord'])->name('student.saveRecord');
});
