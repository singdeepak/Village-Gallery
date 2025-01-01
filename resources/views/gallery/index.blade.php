@php
    $categories = App\Models\Category::get();
@endphp

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Village Banekh</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    <div class="photo-gallery">
        <div class="container">
            <h4 class="h2 text-center my-5">Photo Gallery</h4>

            <!-- Category Tabs -->
            <ul class="nav nav-pills justify-content-center mb-5" id="categoryTabs">
                <li class="nav-item">
                    <a class="nav-link active" data-category="all" href="#">All</a>
                </li>
                @foreach ($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link" data-category="{{ $category->id }}" href="#">{{ $category->category_name }}</a>
                    </li>
                @endforeach
            </ul>

            <!-- Photo Gallery -->
            <div class="row photos my-5">
                @foreach ($photos as $photo)
                    <div class="col-sm-6 col-md-4 col-lg-3 item photo-item" data-category="{{ $photo->category_id }}">
                        <a href="{{ asset('storage/'.$photo->photo) }}" data-lightbox="photos">
                            <img class="img-fluid" src="{{ asset('storage/'.$photo->photo) }}">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>

    <script>
        $(document).ready(function () {
            // Filter images based on category
            $(".nav-link").on("click", function (e) {
                e.preventDefault();
                let category = $(this).data("category");

                $(".nav-link").removeClass("active");
                $(this).addClass("active");

                if (category === "all") {
                    $(".photo-item").show();
                } else {
                    $(".photo-item").hide();
                    $(`.photo-item[data-category='${category}']`).show();
                }
            });
        });
    </script>
</body>

</html>
