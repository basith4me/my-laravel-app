<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class WeatherApp extends Component
{
    public $city = 'London';
    public $weatherData;

    public function fetchWeatherData()
    {
        $apikey = env('WEATHER_API_KEY'); 
        $url = "https://api.openweathermap.org/data/2.5/weather?q={$this->city}&appid={$apikey}&units=metric"; // Fixed URL

        $response = Http::get($url);

        if ($response->successful()) {
            $this->weatherData = $response->json();
        } else {
            $this->weatherData = null;
        }
    }

    public function render()
    {
        return view('livewire.weather-app');
    }
}
