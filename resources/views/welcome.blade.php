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
                <p class="text-lg font-semibold text-green-600">You are logged as {{auth()->user()->name}}</p>
                <form action="/logout" method="POST" class="mt-4">
                  @csrf
                    <button  class="bg-orange-600 text-white px-4 py-2 font-bold rounded hover:bg-orange-700 transition">Logout</button>
                </form>
            </div>

            <div>
                <livewire:task-manager />
            </div>
        @else
            <div>
                <livewire:auth-component />
            </div>
        @endauth
    </div>
</body>

</html>
