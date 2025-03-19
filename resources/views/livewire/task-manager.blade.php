<div>
<div class="bg-white shadow-md rounded-lg p-6">
    @if (session()->has('message'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4">
            {{ session('message') }}
        </div>
    @endif

    @if ($editing)
        <h1 class="text-xl font-bold mb-4">Edit Task</h1>
    @else
        <h1 class="text-xl font-bold mb-4">Add a Task</h1>
    @endif

    <form wire:submit.prevent="{{ $editing ? 'updatePost' : 'createPost' }}" class="space-y-4">
        <input type="text" wire:model="title" placeholder="Title"
            class="w-full border border-gray-300 p-2 rounded focus:outline-blue-500">
        <textarea wire:model="body" placeholder="Describe your task"
            class="w-full border border-gray-300 p-2 rounded focus:outline-blue-500"></textarea>

        @if ($editing)
            <select wire:model="status" class="w-full border border-gray-300 p-2 rounded focus:outline-blue-500">
                <option value="pending">To-Do</option>
                <option value="processing">In Progress</option>
                <option value="completed">Done</option>
            </select>
        @endif

        <button
            class="w-full bg-blue-600 text-white font-bold py-2 rounded hover:bg-blue-700 transition">
            {{ $editing ? 'Update Task' : 'Create Task' }}
        </button>
    </form>

    <h1 class="text-xl font-bold my-4">All Tasks</h1>

    @foreach ($posts as $post)
        <div class="bg-gray-100 p-4 rounded-lg mb-4 shadow">
            <div class="flex justify-between items-center">
                <h3 class="font-bold text-lg">{{ $post->title }}</h3>
                <p class="p-1 text-black rounded 
                        {{ $post->status === 'pending' ? 'bg-red-500' : ($post->status === 'processing' ? 'bg-orange-500' : 'bg-green-500') }}">
                    {{ ucfirst($post->status) }}
                </p>
            </div>
            <p class="mt-2">{{ $post->body }}</p>

            <div class="flex items-center space-x-4 mt-4">
                <button wire:click="editPost({{ $post->id }})"
                    class="text-blue-600 hover:underline">Edit</button>
                <button wire:click="deletePost({{ $post->id }})"
                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">Delete</button>
            </div>
        </div>
    @endforeach
</div>
</div>
