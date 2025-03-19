<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Register -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-xl font-bold mb-4">Register</h1>
        <form wire:submit.prevent="register" class="space-y-4">
            <input wire:model="name" type="text" placeholder="Name"
                class="w-full border border-gray-300 p-2 rounded focus:outline-blue-500">
            @error('name')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror

            <input wire:model="email" type="email" placeholder="Email"
                class="w-full border border-gray-300 p-2 rounded focus:outline-blue-500">
            @error('email')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror

            <input wire:model="password" type="password" placeholder="Password"
                class="w-full border border-gray-300 p-2 rounded focus:outline-blue-500">
            @error('password')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror

            <button class="w-full bg-blue-600 text-white font-bold py-2 rounded hover:bg-blue-700 transition">
                Register
            </button>
        </form>
    </div>

    <!-- Login -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-xl font-bold mb-4">Login</h1>
        <form wire:submit.prevent="login" class="space-y-4">
            <input wire:model="loginName" type="text" placeholder="Name"
                class="w-full border border-gray-300 p-2 rounded focus:outline-blue-500">
            @error('loginName')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror

            <input wire:model="loginPassword" type="password" placeholder="Password"
                class="w-full border border-gray-300 p-2 rounded focus:outline-blue-500">
            @error('loginPassword')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror

            <button class="w-full bg-blue-600 text-white font-bold py-2 rounded hover:bg-blue-700 transition">
                Login
            </button>
        </form>
        @if (session()->has('error'))
            <p class="text-red-500 text-sm mt-2">{{ session('error') }}</p>
        @endif
    </div>
</div>
