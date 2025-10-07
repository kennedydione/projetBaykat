<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MeteoController extends Controller
{
        public function index(Request $request)
    {
        $ville = $request->get('ville', 'Dakar'); // Par défaut : Dakar

        // Météo actuelle
        $responseNow = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            'q' => $ville,
            'appid' => config('services.openweather.key'),
            'units' => 'metric',
            'lang' => 'fr'
        ]);

        // Prévisions 5 jours (toutes les 3 heures)
        $responseForecast = Http::get("https://api.openweathermap.org/data/2.5/forecast", [
            'q' => $ville,
            'appid' => config('services.openweather.key'),
            'units' => 'metric',
            'lang' => 'fr'
        ]);

        $meteo = $responseNow->successful() ? $responseNow->json() : null;
        $forecast = $responseForecast->successful() ? $responseForecast->json() : null;

        return view('meteo.index', compact('meteo', 'forecast', 'ville'));

        // Si l’API répond bien
        if ($response->successful()) {
            $meteo = $response->json();
        } else {
            $meteo = null;
        }

    }

}
