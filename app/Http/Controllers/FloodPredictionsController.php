<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Mail\PredictionResultMail;



class FloodPredictionsController extends Controller
{
    public function showForm()
    {
        return view('flood-predictions');
    }

    public function predictFlood(Request $request)
    {
        // Validate the input
        $request->validate([
            'annualRainfall' => 'required|numeric|min:0|max:99999',
        ]);

        // Get the input value
        $annualRainfall = $request->input('annualRainfall');

        // Prepare the data to send to the Flask API
        $data = ['ANNUAL RAINFALL' => [(int)$annualRainfall]];

        // Send POST request to Flask API
        $response = Http::post('http://127.0.0.1:5000/predict', $data);

        // Check if the response is successful
        if ($response->successful()) {
            $prediction = $response->json()['prediction'] ?? null;
            if ($prediction !== null) {

                $user = Auth::user();
                Mail::to($user->email)->send(new PredictionResultMail([
                    'input' => $annualRainfall,
                    'prediction' => $prediction
                ]));

                return view('predictionResult', ['prediction' => [
                    'input' => $annualRainfall,
                    'prediction' => $prediction
        ]]);
            } else {
                return redirect()->back()->withErrors(['error' => 'Failed to get prediction from the API']);
            }
        } else {
            return redirect()->back()->withErrors(['error' => 'Failed to predict. API response status: ' . $response->status()]);
        }
    }
}

