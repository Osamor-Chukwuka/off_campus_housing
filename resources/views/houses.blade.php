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
        <h1 class="display-1 fw-light">Our Buildings</h1>
        <h1><i class="bi bi-dash-lg fs-1 display-1 fw-bolder h1 text-warning"></i></h1>
        <p style="padding-right: 13%; padding-left:13%" class="text-start fs-5 fw-semi-bold mb-5">Residence halls and
            apartments for
            undergrads feature unlimited utilities, free laundry, high speed internet, furnished spaces, 24/7
            information desks,
            study rooms, lounges, music practice rooms, and more. We also offer exclusive options for graduate students
            and students
            with families. Compare your options using the filters below.
        </p>

        <div class="mt-5 pt-3">
            <form class="row  float-end" method="post" action="{{ route('search') }}">
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
                    <select class="form-select border-5 border-warning" aria-label="Default select example"
                        name="roomates">
                        <option>Roomates</option>
                        <option value="1">Just Me</option>
                        <option value="2">Me +1</option>
                        <option value="3">me +2</option>
                        <option value="4">me +3</option>
                        <option value="5">me +4</option>
                    </select>
                </div>

                <div class="col-auto">
                    <select class="form-select border-5 border-warning" aria-label="Default select example"
                        name="neighbourhood">
                        <option selected>Neighbourhood/Community</option>
                        <option value="kurudu">Kurudu</option>
                        <option value="karu">Karu</option>
                        <option value="Auta">Auta</option>
                    </select>
                </div>

                <div class="col-auto">
                    <div class="input-group ">
                        <span class="input-group-text border-5 border-warning">Min. N</span>
                        <input type="number" aria-label="First name" class="form-control border-5 border-warning"
                            name="min">

                    </div>
                </div>

                <div class="col-auto">
                    <div class="input-group ">
                        <span class="input-group-text border-5 border-warning">Max. N</span>
                        <input type="number" aria-label="First name" class="form-control border-5 border-warning"
                            name="max">

                    </div>
                </div>

                <div class="col-auto">
                    <button class="btn btn-lg btn-warning" type="submit">Search</button>

            </form>
        </div>
        @if ($current_route == 'houses/search')
            <form action="{{ route('search-redirect') }}" method="POST">
                @csrf
                <button class="btn btn-lg btn-danger" type="submit">Clear</button>
            </form>
        @endif

    </div>

    </div>

    <div class="container mt-5 pt-5 mb-4">
        <div class="row allign-items-center g-5">
            @php
                $counter = 0;
            @endphp
            @foreach ($houses as $house)
                @php
                    $counter++;
                @endphp
                <div class="col-3">
                    <div class="card border-0" style="width: 18rem;">
                        <img src="{{ asset('images/header-img3.jpg') }}" class="card-img-top" alt="...">
                        @if ($order->where('productId', $house->id)->exists())
                            <figcaption
                                style="position: absolute; bottom: 0; left: 0; right: 0%;  padding-left: 10px; padding-bottom: 37%"
                                class="text-white bold">
                                <h5 class=" w-10 text-uppercase text-center text-danger fw-bolder bg-blur"><i
                                        class="bi display-1 bi-exclamation-triangle-fill text-danger"></i><span
                                        class="fs-3 ">
                                        not Available
                                    </span></h5>
                            </figcaption>
                            
                        @else
                        <h1>{{$house->id}}</h1>
                        @endif

                        <div class="card-body">
                            <a href="" class="text-decoration-none">
                                <h2 class="card-title fs-4 fw-bolder ">{{ $house->type }}</h2>
                            </a>
                            <p class="card-text h5">{{ 'N' . $house->price . '/' . $house->duration }}</p>
                            <p class="card-text h5 text-primary">{{ $house->address }}</p>
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








{{-- <div class="row allign-items-center g-5">
    <div class="col-3">
        <div class="card border-0" style="width: 18rem;">
            <img src="{{ asset('images/header-img3.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <a href="" class="text-decoration-none">
                    <h2 class="card-title fs-4 fw-bolder ">17TH AVENUE</h2>
                </a>
                <p class="card-text h5">Residence Hall</p>
                <p class="card-text h5 text-primary">Dinkytown</p>
            </div>
        </div>

    </div>

    <div class="col-3">
        <div class="card border-0" style="width: 18rem;">
            <img src="{{ asset('images/header-img3.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <a href="" class="text-decoration-none">
                    <h2 class="card-title fs-4 fw-bolder ">17TH AVENUE</h2>
                </a>
                <p class="card-text h5">Residence Hall</p>
                <p class="card-text h5 text-primary">Dinkytown</p>
            </div>
        </div>
    </div>

    <div class="col-3">
        <div class="card border-0" style="width: 18rem;">
            <img src="{{ asset('images/header-img3.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <a href="" class="text-decoration-none">
                    <h2 class="card-title fs-4 fw-bolder ">17TH AVENUE</h2>
                </a>
                <p class="card-text h5">Residence Hall</p>
                <p class="card-text h5 text-primary">Dinkytown</p>
            </div>
        </div>
    </div>

    <div class="col-3">
        <div class="card border-0" style="width: 18rem;">
            <img src="{{ asset('images/header-img3.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <a href="" class="text-decoration-none">
                    <h2 class="card-title fs-4 fw-bolder ">17TH AVENUE</h2>
                </a>
                <p class="card-text h5">Residence Hall</p>
                <p class="card-text h5 text-primary">Dinkytown</p>
            </div>
        </div>
    </div>

    <div class="col-auto">
        {{-- The drop Down --}}
{{-- <div>
            <p>
                <button class="btn btn-lg ps-5 pe-1 ms-2 collapse-btn border-0 " type="button"
                    data-bs-toggle="collapse" data-bs-target="#collapseWidthExample1" aria-expanded="false"
                    aria-controls="collapseWidthExample1">
                    Details about Building <span
                        class="dropdownn btn btn-warning dropdown-toggle border-0"></span>
                </button>
            </p>
            <div style="min-height: 120px;">
                <div class="collapse collapse-vertical border border-warning" id="collapseWidthExample1">
                    <div class="card card-body" style="width: 280px;">
                        <ul>
                            <li>First Year Students</li>
                            <li>$3,652 - $4,313 /semester</li>
                            <li>Living Learning Communities</li>
                        </ul>
                        <div class="d-grid gap-2 w-100">
                            <button class="btn btn-warning dropdownn" type="button"><a href="{{route('full-details')}}"
                                    class="text-white text-decoration-none">Full Details</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-auto">
        //The drop Down
        <p>
            <button class="btn btn-lg ps-5 pe-0 ms-2  collapse-btn border-0" type="button"
                data-bs-toggle="collapse" data-bs-target="#collapseWidthExample2" aria-expanded="false"
                aria-controls="collapseWidthExample2">
                Details about Building <span class="dropdownn btn btn-warning dropdown-toggle border-0"></span>
            </button>
        </p>
        <div style="min-height: 120px;">
            <div class="collapse collapse-vertical border border-warning" id="collapseWidthExample2">
                <div class="card card-body" style="width: 280px;">
                    <ul>
                        <li>First Year Students</li>
                        <li>$3,652 - $4,313 /semester</li>
                        <li>Living Learning Communities</li>
                    </ul>
                    <div class="d-grid gap-2 w-100">
                        <button class="btn btn-warning dropdownn" type="button"><a href="{{route('full-details')}}"
                                class="text-white text-decoration-none">Full Details</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-auto"> --}}
{{-- The drop Down --}}
{{-- <p>
            <button class="btn btn-lg ps-2 pe-1 ms-5  collapse-btn border-0" type="button"
                data-bs-toggle="collapse" data-bs-target="#collapseWidthExample3" aria-expanded="false"
                aria-controls="collapseWidthExample3">
                Details about Building <span class="dropdownn btn btn-warning dropdown-toggle border-0"></span>
            </button>
        </p>
        <div style="min-height: 120px;">
            <div class="collapse collapse-vertical border border-warning" id="collapseWidthExample3">
                <div class="card card-body" style="width: 280px;">
                    <ul>
                        <li>First Year Students</li>
                        <li>$3,652 - $4,313 /semester</li>
                        <li>Living Learning Communities</li>
                    </ul>
                    <div class="d-grid gap-2 w-100">
                        <button class="btn btn-warning dropdownn" type="button"><a href="{{route('full-details')}}"
                                class="text-white text-decoration-none">Full Details</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-auto">
        // The drop Down
        <p>
            <button class="btn  btn-lg ps-2 pe-1 ms-1 ms-5  collapse-btn border-0" type="button"
                data-bs-toggle="collapse" data-bs-target="#collapseWidthExample4" aria-expanded="false"
                aria-controls="collapseWidthExample4">
                Details about Building <span class="btn btn-warning dropdown-toggle border-0 dropdownn"></span>
            </button>
        </p>
        <div style="min-height: 120px;">
            <div class="collapse collapse-vertical border border-warning ms-1" id="collapseWidthExample4">
                <div class="card card-body" style="width: 280px;">
                    <ul>
                        <li>First Year Students</li>
                        <li>$3,652 - $4,313 /semester</li>
                        <li>Living Learning Communities</li>
                    </ul>
                    <div class="d-grid gap-2 w-100">
                        <button class="btn btn-warning dropdownn" type="button"><a href="{{route('full-details')}}"
                                class="text-white text-decoration-none">Full Details</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div> --}}
