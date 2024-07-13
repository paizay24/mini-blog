<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::redirect('/','/blog');

Route::resource('/blog', BlogController::class);



