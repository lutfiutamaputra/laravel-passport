<?php

// routes/api.php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::apiResource('posts', PostController::class);
    Route::apiResource('comments', CommentController::class);
});
