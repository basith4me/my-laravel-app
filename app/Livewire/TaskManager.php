<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class TaskManager extends Component
{
    public $title, $body, $status = 'pending', $postId;
    public $editing = false;

    // Create Post
    public function createPost()
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        Post::create([
            'title' => strip_tags($this->title),
            'body' => strip_tags($this->body),
            'status' => 'pending',
            'user_id' => Auth::id(),
        ]);

        session()->flash('message', 'Task Created Successfully!');
        $this->resetFields();
    }

    // Delete Post
    public function deletePost(Post $post)
    {
        if (Auth::id() === $post->user_id) {
            $post->delete();
            session()->flash('message', 'Task Deleted Successfully!');
        }
    }

    // Edit Post
    public function editPost(Post $post)
    {
        if (Auth::id() !== $post->user_id) {
            return;
        }

        $this->postId = $post->id;
        $this->title = $post->title;
        $this->body = $post->body;
        $this->status = $post->status;
        $this->editing = true;
    }

    // Update Post
    public function updatePost()
    {
        if (!$this->postId) {
            return;
        }

        $validatedData = $this->validate([
            'title' => 'required',
            'body' => 'required',
            'status' => 'required|in:pending,processing,completed'
        ]);

        $post = Post::find($this->postId);
        if (Auth::id() !== $post->user_id) {
            return;
        }

        $post->update([
            'title' => strip_tags($this->title),
            'body' => strip_tags($this->body),
            'status' => strip_tags($this->status),
        ]);

        session()->flash('message', 'Task Updated Successfully!');
        $this->resetFields();
    }

    // Reset Fields
    private function resetFields()
    {
        $this->title = '';
        $this->body = '';
        $this->status = 'pending';
        $this->postId = null;
        $this->editing = false;
    }

    public function render()
    {
        return view('livewire.task-manager', [
            'posts' => Post::where('user_id', Auth::id())->latest()->get(),
        ]);
    }
}
