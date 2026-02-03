<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::home.index')->name('home.index');
Route::livewire('/blog', 'pages::blog.index')->name('blog.index');
