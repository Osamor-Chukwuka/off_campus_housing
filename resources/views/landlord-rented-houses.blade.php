@include('layouts.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LandLord/Houses</title>
</head>

<body>
    <div class="mb-5">
        <figure style="position: relative;">
            <img src="{{ asset('storage/images/header-img3.jpg') }}" class="img-fluid w-100" alt="...">
            <figcaption style="position: absolute; bottom: 0; left: 0; right: 0;  padding: 70px; padding-bottom: 17%"
                class="text-white bold">
                <h1 class="display-4 w-10 text-uppercase fw-bolder">Rent a <br> Modern House <br> off campus</h1>
            </figcaption>
        </figure>

    </div>
    <div class="container text-center">
        <h1 class="display-1 fw-light">My Houses</h1>
        <h1><i class="bi bi-dash-lg fs-1 display-1 fw-bolder h1 text-warning"></i></h1>
        <p style="padding-right: 13%; padding-left:13%" class="text-start fs-5 fw-semi-bold mb-5">Here, you will find
            all the Houses you have
            that has been rented or bought
        </p>



        @if (session('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
            <script>
                setTimeout(function(){ window. location. reload(); }, 3000); 
            </script>
        @endif

    </div>

    <div class="container mt-5 pt-5 mb-4">
        <div class="row allign-items-center g-5">
            @php
                $counter = 0;
            @endphp
            @foreach ($houser as $house)
                
                
                @php

                    $tenant = $tenants[$counter][0]->name;
                    
                    $counter++;
                    
                
                @endphp
                <div class="col-3">
                    <div class="card border-0" style="width: 18rem;">
                        <img src="{{ asset('storage/images/header-img3.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="" class="text-decoration-none">
                                <h2 class="card-title fs-4 fw-bolder ">{{ $house[0]->type }}</h2>
                            </a>
                            <p class="card-text h5">{{ 'N' . $house[0]->price . '/' . $house[0]->duration }} </p>
                            <p class="card-text h5 text-primary">{{ $house[0]->address }}</p>
                            <p class="card-text h5 ">Buyer: {{$tenant}}</p>
                        </div>
                    </div>

                    <div>
                        <p>
                            <button class="btn btn-lg ps-5 pe-1 ms-2 collapse-btn border-0 " type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseWidthExample{{ $counter }}"
                                aria-expanded="false" aria-controls="collapseWidthExample{{ $counter }}">
                                Details about Building <span
                                    class="dropdownn btn btn-warning dropdown-toggle border-0"></span>
                            </button>
                        </p>
                        <div style="min-height: 120px;">
                            <div class="collapse collapse-vertical border border-warning"
                                id="collapseWidthExample{{ $counter }}">
                                <div class="card card-body" style="width: 280px;">
                                    <ul>
                                        <li>{{ $house[0]->tenants }}</li>
                                        <li>{{ 'N' . $house[0]->price . '/' . $house[0]->duration }}</li>
                                        <li>{{ $house[0]->gender }}</li>
                                    </ul>
                                    <div class="d-grid gap-2 w-100">
                                        <button class="btn btn-warning dropdownn" type="button"><a
                                                href="/houses/full-page/{{ $house[0]->id }}"
                                                class="text-white text-decoration-none">Full Details</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach


        </div>



    </div>
</body>

</html>









<style>
    .choose-us {
        background: #0f2480;
    }

    option:checked {
        background-color: rgb(246, 250, 0);
    }

    .collapse-btn {
        background: rgb(243, 243, 230);
        /* opacity: 12%; */
    }

    .collapse-btn:hover {
        background: rgb(243, 243, 230);
        /* opacity: 12%; */
    }

    .dropdownn:hover {
        background: rgb(141, 34, 34)
    }
</style>
