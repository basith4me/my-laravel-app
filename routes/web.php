<?php

// use App\Http\Controllers\PostController;
use App\Livewire\AuthComponent;
use App\Livewire\TaskManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
// use App\Models\Post;

Route::get('/', function () {
    $posts = [];
    if (auth()->check()) {
        $posts = auth()->user()->usersPost()->latest()->get();
    }
    return view('welcome', ['posts' => $posts]);
});

Route::get('/auth', AuthComponent::class)->name('auth');  //calling controller and function

Route::post('/logout', [UserController::class, 'logout']);
// Route::post('/login', [Auth::class, 'login']);

//post related routes
// Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/tasks', TaskManager::class)->name('tasks');
// Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);
// Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);