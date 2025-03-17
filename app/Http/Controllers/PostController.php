<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //deletePost
    public function deletePost(Post $post)
    {
        if (auth()->user()->id === $post['user_id']) {
            $post->delete();
        }
        return redirect('/');
    }



    //updatePost
    public function updatePost(Post $post, Request $request)
    {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }
        $formData = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'status' => 'required|in:pending,processing,completed'
        ]);

        $formData['title'] = strip_tags($formData['title']);
        $formData['body'] = strip_tags($formData['body']);
        $formData['status'] = strip_tags($formData['status']);
        $post->update($formData);
        return redirect('/');
    }

    //editPost
    public function showEditScreen(Post $post)
    {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/');
        }
        return view('/edit-post', ['post' => $post]);
    }

    //createPost
    public function createPost(Request $request)
    {
        $formData = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        $formData['title'] = strip_tags($formData['title']);
        $formData['body'] = strip_tags($formData['body']);
        $formData['status'] = 'pending';
        $formData['user_id'] = auth()->id();

        Post::create($formData);
        return redirect('/');
    }

}
