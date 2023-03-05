@include('layouts.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="mb-5">
        <figure style="position: relative;">
            <img src="{{ asset('images/header-img3.jpg') }}" class="img-fluid w-100" alt="...">
            <figcaption style="position: absolute; bottom: 0; left: 0; right: 0;  padding: 70px; padding-bottom: 17%"
                class="text-white bold">
                <h1 class="display-4 w-10 text-uppercase fw-bolder">Rent a <br> Modern House <br> off campus</h1>
            </figcaption>
        </figure>

    </div>
    <div class="container text-center">
        <h1 class="display-1 fw-light">Off-Campus Living</h1>
        <h1><i class="bi bi-dash-lg fs-1 display-1 fw-bolder h1 text-warning"></i></h1>
        <p style="padding-right: 13%; padding-left:13%" class="text-start fs-5 fw-semi-bold">Statistics show students
            who live on campus are more likely to have better grades, stick with school, and graduate on time.
            Those are just some of the reasons thousands of new and returning students choose University housing to make
            the most of
            their Gopher experience. <br> <br> Are you looking for a social hub in the middle of everything? A laid-back
            atmosphere with plenty
            of quiet space? Or something in between? We offer diverse housing options across campus, including nine
            residence halls and
            four apartment buildings, each with its own vibe.
        </p>
    </div>

    <div class="container text-center mt-5 pt-5">
        <h2 class="fw-bolder mt-5">House For Sale</h2>
        <p>Some of the Houses that are up for rent/sale</p>

        <div class="row align-items-center">
            <div class="col ">
                <div class="card" style="width: 100%;">
                    <img src="{{ asset('images/house1.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bolder">APERTMENTS HOUSE</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 100%;">
                    <img src="{{ asset('images/house2.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bolder">APERTMENTS HOUSE</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 100%;">
                    <img src="{{ asset('images/house3.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bolder">APERTMENTS HOUSE</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="row align-items-center">
            <div class="col ">
                <div class="card" style="width: 100%;">
                    <img src="{{ asset('images/house1.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bolder">APERTMENTS HOUSE</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 100%;">
                    <img src="{{ asset('images/house2.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bolder">APERTMENTS HOUSE</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 100%;">
                    <img src="{{ asset('images/house3.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bolder">APERTMENTS HOUSE</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
