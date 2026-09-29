<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\QueryBuilder;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Acara17Controller;
use App\Http\Controllers\Acara18Controller;
use App\Http\Controllers\Acara19Controller;
use App\Http\Controllers\Acara20Controller;


Route::get('/insert-data', [QueryBuilder::class, 'insertData']);
Route::get('/get-data', [QueryBuilder::class, 'getData']);
Route::get('/pluck-data', [QueryBuilder::class, 'pluckData']);
Route::get('/aggregate-data', [QueryBuilder::class, 'aggregateData']);
Route::get('/join-data', [QueryBuilder::class, 'joinData']);
Route::get('/sort-limit-data', [QueryBuilder::class, 'sortLimitData']);
Route::get('/subquery-data', [QueryBuilder::class, 'subqueryData']);
Route::get('/update-data', [QueryBuilder::class, 'updateData']);
Route::get('/drop-data', [QueryBuilder::class, 'dropData']);

Route::get('/users', [UserController::class, 'retrieveData']);
Route::get('/users/create', [UserController::class, 'createData']);
Route::get('/users/update', [UserController::class, 'updateData']);
Route::get('/users/delete', [UserController::class, 'deleteData']);

Route::get('/', function () {
    return view('index');
});

Route::post('/submit', [FormController::class,'submitForm']);

Route::get('/acara17/insert', [Acara17Controller::class, 'insert']);
Route::post('/acara17/insert', [Acara17Controller::class, 'insertAction']);
Route::get('/acara17/get', [Acara17Controller::class, 'getData']);
Route::get('/acara17/update', [Acara17Controller::class, 'update']);
Route::post('/acara17/update', [Acara17Controller::class, 'updateAction']);
Route::get('/acara17/delete', [Acara17Controller::class, 'delete']);
Route::post('/acara17/delete', [Acara17Controller::class, 'deleteAction']);
Route::post('/acara17/truncate', [Acara17Controller::class, 'truncateAction']);
Route::get('/acara17/pluck', [Acara17Controller::class, 'pluck']);
Route::get('/acara17/aggregate', [Acara17Controller::class, 'aggregate']);
Route::get('/acara17/join', [Acara17Controller::class, 'join']);
Route::get('/acara17/sort-limit', [Acara17Controller::class, 'sortLimit']);
Route::get('/acara17/subquery', [Acara17Controller::class, 'subquery']);
Route::get('/acara17/raw', [Acara17Controller::class, 'raw']);

Route::get('/acara18/create', [Acara18Controller::class, 'create']);
Route::post('/acara18/create', [Acara18Controller::class, 'createAction']);
Route::get('/acara18/retrieve', [Acara18Controller::class, 'retrieve']);
Route::get('/acara18/update', [Acara18Controller::class, 'update']);
Route::post('/acara18/update', [Acara18Controller::class, 'updateAction']);
Route::get('/acara18/delete', [Acara18Controller::class, 'delete']);
Route::post('/acara18/delete', [Acara18Controller::class, 'deleteAction']);

Route::get('/acara19/conditional', [Acara19Controller::class, 'conditionalClause']);
Route::get('/acara19/relationships', [Acara19Controller::class, 'relationships']);
Route::get('/acara19/mutator', [Acara19Controller::class, 'mutatorAccessor']);
Route::get('/acara19/softdelete', [Acara19Controller::class, 'softDeleteView']);
Route::get('/acara19/softdelete/hapus/{id}', [Acara19Controller::class, 'softDeleteAction']);
Route::get('/acara19/softdelete/restore/{id}', [Acara19Controller::class, 'restoreAction']);
Route::get('/acara19/massassignment', [Acara19Controller::class, 'massAssignmentDemo']);
Route::get('/acara19/scope', [Acara19Controller::class, 'queryScope']);

Route::get('/acara20', [Acara20Controller::class, 'index']);
Route::post('/acara20/submit', [Acara20Controller::class, 'submit']);
Route::post('/acara20/submit-request', [Acara20Controller::class, 'submitWithRequest']);
Route::post('/acara20/submit-rule', [Acara20Controller::class, 'submitWithRule']);
