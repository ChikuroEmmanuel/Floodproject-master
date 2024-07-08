<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Prediction;

class FloodPredictionsController extends Controller
{
    public function showForm()
    {
        return view('flood-predictions');
    }

    public function showPredictions()
  {
    $predictions = Prediction::all();
    return view('pred-view', ['predictions' => $predictions]);
}

    public function predictFlood(Request $request)
    {
        // Validate the input
        $request->validate([
            'MinTemp' => 'required|numeric',
            'MaxTemp' => 'required|numeric',
            'WindSpeed9am' => 'required|numeric',
            'WindSpeed3pm' => 'required|numeric',
            'Humidity9am' => 'required|numeric',
            'Humidity3pm' => 'required|numeric',
            'RainToday' => 'required|numeric',
        ]);

        // Prepare the data to send to the Flask server
        $data = $request->only([
            'MinTemp', 'MaxTemp', 'WindSpeed9am',
            'WindSpeed3pm', 'Humidity9am', 'Humidity3pm', 'RainToday'
        ]);

        // Ensure all form data is present and convert to float
        foreach ($data as $key => $value) {
            if ($value === null) {
                return redirect()->back()->withInput()->withErrors([$key => 'Field is required.']);
            }
            $data[$key] = floatval($value);
        }

        // Send POST request to Flask server
        try {
            $response = Http::post('http://127.0.0.1:5000/predict',['json' => true]);
            if ($response->successful()) {
                $prediction = $response->body();
                // Save prediction to the database
                $prediction = new Prediction();
                $prediction->MinTemp = $data['MinTemp'];
                $prediction->MaxTemp = $data['MaxTemp'];
                $prediction->WindSpeed9am = $data['WindSpeed9am'];
                $prediction->WindSpeed3pm = $data['WindSpeed3pm'];
                $prediction->Humidity9am = $data['Humidity9am'];
                $prediction->Humidity3pm = $data['Humidity3pm'];
                $prediction->RainToday = $data['RainToday'];
                $prediction->RainTomorrow = $prediction['RainTomorrow']; // Adjust according to Flask server response
                $prediction->save();
                // Return the view with the prediction result
                return view('predictionResult', ['prediction' => $prediction, 'input' => $data]);
            } else {
                $errorMessage = 'Error: Could not get prediction from Flask server.';
                return view('predictionResult', ['prediction' => $errorMessage, 'input' => $data]);
            }
        } catch (\Exception $e) {
            $errorMessage = 'Error: Could not connect to Flask server.';
            return view('predictionResult', ['prediction' => $errorMessage, 'input' => $data]);
        }
    }
}
