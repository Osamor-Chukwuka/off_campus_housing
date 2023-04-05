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
            uploaded, both the ones that have been rented/bought, and the ones that have not been rented/bought
        </p>

        {{-- <div class="mt-5 pt-3">
            <form class="row  float-end" method="post" action="{{route('search')}}">
                @csrf
                <div class="col-auto">
                    <select class="form-select border-5 border-warning" name="user_type">
                        <option>Tenant</option>
                        <option value="Student">Student</option>
                        <option value="Staff">Staff</option>
                        <option value="Anyone">Anyone</option>
                    </select>
                </div>

                <div class="col-auto">
                    <select class="form-select border-5 border-warning" aria-label="Default select example" name="roomates">
                        <option>Roomates</option>
                        <option value="1">Just Me</option>
                        <option value="2">Me +1</option>
                        <option value="3">me +2</option>
                        <option value="4">me +3</option>
                        <option value="5">me +4</option>
                    </select>
                </div>

                <div class="col-auto">
                    <select class="form-select border-5 border-warning" aria-label="Default select example" name="neighbourhood">
                        <option selected>Neighbourhood/Community</option>
                        <option value="kurudu">Kurudu</option>
                        <option value="karu">Karu</option>
                        <option value="Auta">Auta</option>
                    </select>
                </div>

                <div class="col-auto">
                    <div class="input-group ">
                        <span class="input-group-text border-5 border-warning">Min. N</span>
                        <input type="number" aria-label="First name" class="form-control border-5 border-warning" name="min">

                    </div>
                </div>

                <div class="col-auto">
                    <div class="input-group ">
                        <span class="input-group-text border-5 border-warning">Max. N</span>
                        <input type="number" aria-label="First name" class="form-control border-5 border-warning" name="max">

                    </div>
                </div>

                <div class="col-auto">
                    <button class="btn btn-lg btn-warning" type="submit">Search</button>
                
                    </form>
                </div>
            @if ($current_route == 'houses/search')
                <form action="{{route('search-redirect')}}" method="POST">
                @csrf
                <button class="btn btn-lg btn-danger" type="submit">Clear</button>
            </form>
            @endif    
            
        </div> --}}

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
            @foreach ($my_houses as $house)
                @php
                    $counter++;
                @endphp
                <div class="col-3">
                    <div class="card border-0" style="width: 18rem;">
                        <img src="{{ asset('storage/images/header-img3.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <a href="" class="text-decoration-none">
                                <h2 class="card-title fs-4 fw-bolder ">{{ $house->type }}</h2>
                            </a>
                            <p class="card-text h5">{{ 'N' . $house->price . '/' . $house->duration }} </p>
                            <p class="card-text h5 text-primary">{{ $house->address }}</p>
                            <form action="{{ route('delete_house') }}" method="post">
                                @csrf
                                <input type="text" hidden value="{{ $house->id }}" name="house_id" id="">
                                <button class="border-0 btn btn-lg" type="submit"><i
                                        class="bi bi-trash3-fill text-danger fs-2"></i></button>
                            </form>
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
                                        <li>{{ $house->tenants }}</li>
                                        <li>{{ 'N' . $house->price . '/' . $house->duration }}</li>
                                        <li>{{ $house->gender }}</li>
                                    </ul>
                                    <div class="d-grid gap-2 w-100">
                                        <button class="btn btn-warning dropdownn" type="button"><a
                                                href="/houses/full-page/{{ $house->id }}"
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
