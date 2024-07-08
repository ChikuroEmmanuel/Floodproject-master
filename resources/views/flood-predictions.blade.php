<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Predict Floods</title>
</head>
<body>
    <h2>Enter Annual Rainfall (in mm)</h2>
    <form id="predictionForm" action="{{ route('predictFlood') }}" method="post">
        @csrf <!-- Laravel CSRF token -->
        <label for="annualRainfall">Annual Rainfall:</label>
        <input type="number" id="annualRainfall" name="annualRainfall" min="0" max="99999" required>
        <button type="submit">Predict</button>
    </form>

    
    <div id="predictionResult">
        <!-- Prediction result will be displayed here -->
    </div>

       
</body>
</html>
