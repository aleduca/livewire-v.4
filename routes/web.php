<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::home.index');
Route::livewire('/blog', 'pages::blog.index');
