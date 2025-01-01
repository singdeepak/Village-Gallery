<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Village Banekh</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    <div class="photo-gallery">
        <div class="container">
            <h4 class="h2 text-center my-5">Photo Gallery</h4>
            <div class="row photos my-5">
                @foreach ($photos as $photo)
                    <div class="col-sm-6 col-md-4 col-lg-3 item">
                        <a href="{{ asset('storage/'.$photo->photo) }}" data-lightbox="photos"><img class="img-fluid" src="{{ asset('storage/'.$photo->photo) }}"></a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
</body>

</html>