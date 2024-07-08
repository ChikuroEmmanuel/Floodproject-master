<!-- results.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prediction Results</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Prediction Results</h1>
        <p><strong>Min Temp:</strong> {{ $input['MinTemp'] }}</p>
        <p><strong>Max Temp:</strong> {{ $input['MaxTemp'] }}</p>
        <p><strong>Wind Speed 9am:</strong> {{ $input['WindSpeed9am'] }}</p>
        <p><strong>Wind Speed 3pm:</strong> {{ $input['WindSpeed3pm'] }}</p>
        <p><strong>Humidity 9am:</strong> {{ $input['Humidity9am'] }}</p>
        <p><strong>Humidity 3pm:</strong> {{ $input['Humidity3pm'] }}</p>
        <p><strong>Rain Today:</strong> {{ $input['RainToday'] == 1 ? 'Yes' : 'No' }}</p>
        <p><strong>Prediction:</strong> {{ $prediction }}</p>
        <a href="{{ route('flood-predictions') }}" class="btn btn-primary">Back to Prediction Form</a>
    </div>
</body>
</html>
