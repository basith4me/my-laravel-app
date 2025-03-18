<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen p-6">
    <div class="text-center mb-6 bg-blue-200 text-blue p-4 rounded-lg w-full">
        <h1 class="font-bold text-xl">Task Manager Application</h1>
    </div>
    <div class="w-full max-w-lg bg-white p-6 rounded-lg shadow-md">

        <h1 class="text-2xl font-bold text-gray-800 mb-4 text-center">Edit Task</h1>
        <form action="/edit-post/{{ $post->id }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-gray-700 font-semibold">Title</label>
                <input type="text" name="title" value="{{ $post->title }}"
                    class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold">Content</label>
                <textarea name="body" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    rows="4">{{ $post->body }}</textarea>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold">Status</label>
                <select name="status"
                    class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="pending" {{ $post->status === 'pending' ? 'selected' : '' }}>To-Do</option>
                    <option value="processing" {{ $post->status === 'processing' ? 'selected' : '' }}>In progress
                    </option>
                    <option value="completed" {{ $post->status === 'completed' ? 'selected' : '' }}>Done</option>
                </select>
            </div>
            <button
                class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">Save
                Changes</button>
        </form>
    </div>
</body>

</html>
