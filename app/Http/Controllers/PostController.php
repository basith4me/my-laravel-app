<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $formData = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        $formData['title'] = strip_tags($formData['title']);
        $formData['body'] = strip_tags($formData['body']);
        $formData['user_id'] = auth()->id();

        Post::create($formData);
        return redirect('/');
    }
    
}
