<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Api Call All method

Route::get('/sutdent', [StudentController::class,'Student']);
Route::post('/sutdent', [StudentController::class,'insert']);
Route::put('/sutdent/{id}',[StudentController::class,'update']);
Route::delete('/sutdent/{id}', [StudentController::class,'delete']);



// For File Upload in Database
Route::post('File_upload', [StudentController::class,'FileUpload']);
