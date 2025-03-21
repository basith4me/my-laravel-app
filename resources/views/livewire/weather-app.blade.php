<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="p-6 bg-white rounded shadow-md">
        <h2 class="text-lg font-bold mb-4">Weather Information</h2>

        <input type="text" wire:model="city" placeholder="Enter city name" class="border p-2 rounded">
        <button wire:click="fetchWeatherData" class="bg-blue-500 text-white p-2 rounded ml-2">Get Weather</button>

        @if ($weatherData)
            <div class="mt-4">
                <h3 class="text-xl font-semibold">{{ $weatherData['name'] }}, {{ $weatherData['sys']['country'] }}</h3>
                <p>Temperature: {{ $weatherData['main']['temp'] }}°C</p>
                <p>Condition: {{ $weatherData['weather'][0]['description'] }}</p>
            </div>
        @endif
    </div>

</div>
