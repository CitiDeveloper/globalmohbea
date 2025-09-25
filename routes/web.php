<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminTourController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
   
    return view('welcome');
});
Route::get('/transport', function () {
  
    return view('transport');
});
Route::get('/commodity-trade', function () {   
    return view('commodity');
});

