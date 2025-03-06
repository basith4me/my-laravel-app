<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Laravel app</title>
</head>

<body>
    @auth
        <p>You are logged in.</p>
        <form action="/logout" method="POST">
            @csrf
            <button class="bg-orange-600 text-white p-2 font-bold m-3 rounded">Logout</button>
        </form>
        <div class="p-2 flex justify-center items-center border border-blue-300 space-x-2">

            <h1>Create a post</h1>
            <form action="/create-post" method="POST" class="item-center justify-center flex space-x-3">
                @csrf
                <input type="text" name="title" placeholder="Title" class="border border-blue-300">
                <textarea name="body" placeholder="write your content" class="border border-blue-200"></textarea>
                <button class="text-white bg-blue-600 font-bold rounded p-2">Create Post</button>
            </form>
        </div>
        <div class="w-full p-2 flex flex-col justify-center items-center border border-blue-300 space-x-2 mt-2">
            <h1>All posts</h1>
            @foreach ($posts as $post)
                <div class="bg-blue-100 flex flex-col p-2 m-2 w-full">
                    <h3 class="font-bold">{{ $post['title'] }} by {{ $post->user->name}}</h3>
                    {{$post['body']}}
                    <P class="text-blue-600"><a href="/edit-post/{{$post->id}}">Edit</a></P>
                    <form action="/delete-post/{{$post->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white p-2 rounded">Delete</button>
                    </form>
                </div>
            @endforeach

        </div>
    @else
        <div class="p-2 flex justify-center items-center border border-blue-300">
            <form action="/register" method="POST">
                @csrf
                <h1>Register Form</h1>
                <input name="name" type="text" placeholder="Name" class="border border-blue-300">
                <input name="email" type="email" placeholder="Email" class="border border-blue-300">
                <input name="password" type="password" placeholder="password" class="border border-blue-300">
                <button class="text-white bg-blue-600 p-2 rounded">Register</button>
            </form>
        </div>
        <div class="p-2 flex justify-center items-center border border-blue-300">
            <form action="/login" method="POST">
                @csrf
                <h1>Login Form</h1>
                <input name="loginName" type="text" placeholder="Name" class="border border-blue-300">
                <input name="loginPassword" type="password" placeholder="password" class="border border-blue-300">
                <button class="text-white bg-blue-600 p-2 rounded">Login</button>
            </form>
        </div>
    @endauth

</body>

</html>
