<!-- predictions.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Predictions</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>All Predictions</h1>
        @if ($predictions->isEmpty())
            <p>No predictions found.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Min Temp</th>
                        <th>Max Temp</th>
                        <th>Wind Speed 9am</th>
                        <th>Wind Speed 3pm</th>
                        <th>Humidity 9am</th>
                        <th>Humidity 3pm</th>
                        <th>Rain Today</th>
                        <th>Rain Tomorrow</th>
                        <th>Predicted At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($predictions as $prediction)
                        <tr>
                            <td>{{ $prediction->MinTemp }}</td>
                            <td>{{ $prediction->MaxTemp }}</td>
                            <td>{{ $prediction->WindSpeed9am }}</td>
                            <td>{{ $prediction->WindSpeed3pm }}</td>
                            <td>{{ $prediction->Humidity9am }}</td>
                            <td>{{ $prediction->Humidity3pm }}</td>
                            <td>{{ $prediction->RainToday == 1 ? 'Yes' : 'No' }}</td>
                            <td>{{ $prediction->RainTomorrow == 1 ? 'Yes' : 'No' }}</td>
                            <td>{{ $prediction->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Back to Home</a>
    </div>
</body>
</html>
