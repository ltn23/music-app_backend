<?php

use App\Http\Controllers\AudioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;

// Lấy danh sách tất cả bài hát
Route::get('/songs', [SongController::class, 'index']);

// Lấy chi tiết một bài hát theo ID
Route::get('/songs/{id}', [SongController::class, 'show']);

// Thêm bài hát mới
Route::post('/songs', [SongController::class, 'store']);

Route::post('/upload-audio', [AudioController::class, 'uploadAudio']);

Route::post('/upload-image', [AudioController::class, 'uploadImage']);  
