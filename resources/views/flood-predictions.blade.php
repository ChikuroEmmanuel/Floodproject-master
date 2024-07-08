<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rain Prediction</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Rain Prediction</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('predictFlood') }}">
            @csrf
            <div class="form-group">
                <label for="MinTemp">Min Temp</label>
                <input type="number" step="any" class="form-control" id="MinTemp" name="MinTemp" required>
            </div>
            <div class="form-group">
                <label for="MaxTemp">Max Temp</label>
                <input type="number" step="any" class="form-control" id="MaxTemp" name="MaxTemp" required>
            </div>
            <div class="form-group">
                <label for="WindSpeed9am">Wind Speed 9am</label>
                <input type="number" step="any" class="form-control" id="WindSpeed9am" name="WindSpeed9am" required>
            </div>
            <div class="form-group">
                <label for="WindSpeed3pm">Wind Speed 3pm</label>
                <input type="number" step="any" class="form-control" id="WindSpeed3pm" name="WindSpeed3pm" required>
            </div>
            <div class="form-group">
                <label for="Humidity9am">Humidity 9am</label>
                <input type="number" step="any" class="form-control" id="Humidity9am" name="Humidity9am" required>
            </div>
            <div class="form-group">
                <label for="Humidity3pm">Humidity 3pm</label>
                <input type="number" step="any" class="form-control" id="Humidity3pm" name="Humidity3pm" required>
            </div>
            <div class="form-group">
                <label for="RainToday">Rain Today (1 for Yes, 0 for No)</label>
                <input type="number" step="1" min="0" max="1" class="form-control" id="RainToday" name="RainToday" required>
            </div>
            <button type="submit" class="btn btn-primary">Predict</button>
        </form>
    </div>
</body>
</html>
