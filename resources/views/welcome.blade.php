<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Laravel App</title>
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-6">
        <div class="text-center mb-6 bg-blue-200 text-blue p-4 rounded-lg">
            <h1 class="font-bold text-xl">Task Manager Application</h1>
        </div>
        @auth
            <div class="bg-white shadow-md rounded-lg p-6 mb-6 flex flex-col items-end justify-end">
                <p class="text-lg font-semibold text-green-600">You are logged in.</p>
                <form action="/logout" method="POST" class="mt-4">
                    @csrf
                    <button
                        class="bg-orange-600 text-white px-4 py-2 font-bold rounded hover:bg-orange-700 transition">Logout</button>
                </form>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                <h1 class="text-xl font-bold mb-4">Add a task</h1>
                <form action="/create-post" method="POST" class="space-y-4">
                    @csrf
                    <input type="text" name="title" placeholder="Title"
                        class="w-full border border-gray-300 p-2 rounded focus:outline-blue-500">
                    <textarea name="body" placeholder="Describe your task"
                        class="w-full border border-gray-300 p-2 rounded focus:outline-blue-500"></textarea>
                    <button class="w-full bg-blue-600 text-white font-bold py-2 rounded hover:bg-blue-700 transition">Create
                        Task</button>
                </form>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6">
                <h1 class="text-xl font-bold mb-4">All Tasks</h1>
                @foreach ($posts as $post)
                    <div class="bg-gray-100 p-4 rounded-lg mb-4 shadow">
                        <div class="flex justify-between items-center">
                            <h3 class="font-bold text-lg">{{ $post['title'] }} 
                                   </h3>
                            <p
                                class="p-1 text-black rounded 
                        {{ $post['status'] === 'pending' ? 'bg-red-500' : ($post['status'] === 'processing' ? 'bg-orange-500' : 'bg-green-500') }}">
                                @if ($post['status'] === 'pending')
                                    To-Do
                                @elseif ($post['status'] === 'processing')
                                    In Progress
                                @else
                                    Done
                                @endif

                            </p>

                        </div>
                        <p class="mt-2">{{ $post['body'] }}</p>

                        <div class="flex items-center space-x-4 mt-4">
                            <a href="/edit-post/{{ $post->id }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="/delete-post/{{ $post->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h1 class="text-xl font-bold mb-4">Register</h1>
                    <form action="/register" method="POST" class="space-y-4">
                        @csrf
                        <input name="name" type="text" placeholder="Name"
                            class="w-full border border-gray-300 p-2 rounded focus:outline-blue-500">
                        <input name="email" type="email" placeholder="Email"
                            class="w-full border border-gray-300 p-2 rounded focus:outline-blue-500">
                        <input name="password" type="password" placeholder="Password"
                            class="w-full border border-gray-300 p-2 rounded focus:outline-blue-500">
                        <button
                            class="w-full bg-blue-600 text-white font-bold py-2 rounded hover:bg-blue-700 transition">Register</button>
                    </form>
                </div>
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h1 class="text-xl font-bold mb-4">Login</h1>
                    <form action="/login" method="POST" class="space-y-4">
                        @csrf
                        <input name="loginName" type="text" placeholder="Name"
                            class="w-full border border-gray-300 p-2 rounded focus:outline-blue-500">
                        <input name="loginPassword" type="password" placeholder="Password"
                            class="w-full border border-gray-300 p-2 rounded focus:outline-blue-500">
                        <button
                            class="w-full bg-blue-600 text-white font-bold py-2 rounded hover:bg-blue-700 transition">Login</button>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</body>

</html>
