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
        <h1 class="display-1 fw-light">17th Avenue</h1>
        <h1><i class="bi bi-dash-lg fs-1 display-1 fw-bolder h1 text-warning"></i></h1>
        <p style="padding-right: 13%; padding-left:13%" class="text-center fs-5 fw-semi-bold mb-5">326 Southeast 17th
            Avenue, Minneapolis, MN, 55414
        </p>
    </div>

    <div class="mb-5 pb-5">
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                {{-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button> --}}
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    {{-- <img src="{{ asset('images/header-img3.jpg') }}" class="d-block w-100" alt="..."> --}}
                    <div class="hstack gap-3">
                        <div class="bg-body-tertiary border">
                            <img src="{{ asset('images/header-img3.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="bg-body-tertiary border">
                            <img src="{{ asset('images/header-img3.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="bg-body-tertiary border">
                            <img src="{{ asset('images/header-img3.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="hstack gap-3">
                        <div class="bg-body-tertiary border">
                            <img src="{{ asset('images/header-img3.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="bg-body-tertiary border">
                            <img src="{{ asset('images/header-img3.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="bg-body-tertiary border">
                            <img src="{{ asset('images/header-img3.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
                {{-- <div class="carousel-item">
                    <img src="{{ asset('images/header-img3.jpg') }}" class="d-block w-100" alt="...">
                </div> --}}
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


    <div class="container mb-5">
        <div class="row">
            <div class="col-5">
                <div>
                    <h2 class="fw-bolder">ABOUT</h2>
                    <p class="fs-5">Built in 2013, the 17th Avenue residence hall has six floors with space for 600
                        first-year residents.</p><br>
                    <p class="fs-5">Residence Hall contracts run September-December and January-May. Room details
                        below are subject to change. Residents
                        should review their Housing contract terms for the most complete information.
                    </p>
                </div>


                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button border border-warning text-black fs-5 fw-bolder" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Room Types
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body border border-warning">
                                <strong>This is the first item's accordion body.</strong> It is shown by default, until
                                the collapse plugin adds the appropriate classes that we use to style each element.
                                These classes control the overall appearance, as well as the showing and hiding via CSS
                                transitions. You can modify any of this with custom CSS or overriding our default
                                variables. It's also worth noting that just about any HTML can go within the
                                <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed border border-warning text-black fs-5 fw-bolder" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Cost
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body border border-warning">
                                <strong>This is the second item's accordion body.</strong> It is hidden by default,
                                until the collapse plugin adds the appropriate classes that we use to style each
                                element. These classes control the overall appearance, as well as the showing and hiding
                                via CSS transitions. You can modify any of this with custom CSS or overriding our
                                default variables. It's also worth noting that just about any HTML can go within the
                                <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed border border-warning" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Accordion Item #3
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body border border-warning">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until
                                the collapse plugin adds the appropriate classes that we use to style each element.
                                These classes control the overall appearance, as well as the showing and hiding via CSS
                                transitions. You can modify any of this with custom CSS or overriding our default
                                variables. It's also worth noting that just about any HTML can go within the
                                <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
