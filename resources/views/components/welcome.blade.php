
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rainy Brain</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/dist/css/style1.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
</head>
<body>

    <section>
        <input type="checkbox" id="check">
        <header>
            <div>
                <h2><a href="#" class="logo">Rainy Brain</a></h2>
                <div class="navigation">
                    <a href="#">Home</a>
                    <a href="{{route('analytic')}}">Dashboard</a>
                    <a href="{{ route('pred-view')}}">Recent Predictions</a>
                    <a href="{{route('flood-predictions')}}">Predictor</a>
                    <a href="{{route('feedback')}}">Feedback</a>
                </div>
                <label for="check">
                    <i class="fas fa-bars menu-btn"></i>
                    <i class="fas fa-times close-btn"></i>
                </label>
            </div>
        </header>
        <div class="content" style="margin-top: 8%;">
            <div class="info">
                <h2>Plant Trees <br><span>Save Rain</span></h2>
                <p> "Plant trees to bring the rains and get rid of the summer's heat.” - Trees help reduce and moderate the temperature and climate, which is why it is so important that we have more of them</p>
                <a href="#about" class="info-btn">More info</a>
            </div>
        </div>
        <div class="media-icons">
            <a href="https://www.linkedin.com/in/vasanth-p-90826218b/"><i class="fab fa-linkedin"></i></a>
            <a href="https://github.com/Vasanthengineer4949"><i class="fab fa-github"></i></a>
            <a href="https://twitter.com/V51430"><i class="fab fa-twitter"></i></a>
        </div>
    </section>
    <footer>
        <p>
            Developed with ❤️ by Vasanth
        </p> 
        <div class="media-icons">
            <a href="https://www.linkedin.com/in/vasanth-p-90826218b/"><i class="fab fa-linkedin"></i></a>
            <a href="https://github.com/Vasanthengineer4949"><i class="fab fa-github"></i></a>
            <a href="https://twitter.com/V51430"><i class="fab fa-twitter"></i></a>
        </div>
    </footer>

</body>
</html>