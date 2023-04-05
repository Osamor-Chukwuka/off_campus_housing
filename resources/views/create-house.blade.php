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
    <div class="container pt-5 mb-5   fw-bolder">
        @if ($account[0]->account_number == 'NULL')
            <p class="lead">Provide your account details, before you create a House, so you can receive funds</p>
            <form method="post" action="{{route('update_account_details')}}">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="account_number" placeholder="account nummber"
                        aria-label="Username">
                    <span class="input-group-text">AND</span>
                    <input type="text" class="form-control" name="sort_code" placeholder="sort code"
                        aria-label="Server">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        @else
            <h2 class="pb-3 text-center">CREATE A HOUSE <i
                    class="bi bi-house-fill display-5 text-secondary houseImg"></i>
            </h2>
            <form class="row g-3 create_house" method="post" enctype="multipart/form-data" action="{{ route('create_house') }}">
                @csrf
                <div class="col-md-6">
                    <label for="type" class="form-label">House Type. <i>e.g Bungalow</i> </label>
                    <input type="text" name="type" class="form-control" id="type">
                </div>
                <div class="col-md-6">
                    <label for="address" class="form-label">House Address. <i>e.g house 10, kurudu, Abuja</i></label>
                    <input type="text" name="address" class="form-control" id="address">
                </div>


                <div class="col-12 light_bg pb-4">
                    <label for="inputAddress" class="form-label ">About the House</label>
                    <textarea name="about" id="" cols="30" rows="5" class="form-control"></textarea>
                    {{-- <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"> --}}
                </div>


                <div class="col-md-6">
                    <label for="price" class="form-label">Price. <i>e.g N50000</i> </label>
                    <input type="number" name="price" class="form-control" id="price">
                </div>
                <div class="col-md-6">
                    <label for="address" class="form-label">Payment duration. <i>e.g per month, per year,
                            Forever/permanently</i></label>
                    <input type="text" name="duration" class="form-control" id="address">
                </div>



                <div class="col-md-6 light_bg pb-3">
                    <label for="gender" class="form-label">Gender Specification. <i>e.g for males, females, both.</i>
                    </label>
                    <textarea name="gender" id="" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="col-md-6 light_bg pb-3 pb-3">
                    <label for="address" class="form-label">Security Situation. <i>what is the Security Situation in
                            the
                            Area</i></label>
                    <textarea name="security" id="" cols="30" rows="5" class="form-control"></textarea>
                </div>


                <div class="col-6">
                    <label for="inputAddress" class="form-label">FEATURES & AMENITIES... <i>please seperate each
                            feature/amenities with comma(<b class="fs-2">,</b>). e.g Air conditioning
                            <b class="fs-2">,</b> Meditation room<b class="fs-2">,</b> Study rooms</i>
                    </label>
                    <textarea name="features" id="" cols="30" rows="5" class="form-control"></textarea>
                    {{-- <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"> --}}
                </div>
                <div class="col-6">
                    <label for="inputAddress" class="form-label">FURNISHINGS... <i>please seperate each FURNISHINGS with
                            comma(<b class="fs-2">,</b>). e.g 2 Desk and chair
                            <b class="fs-2">,</b> Carpeted floors<b class="fs-2">,</b> Twin bed</i>
                    </label>
                    <textarea name="furnishings" id="" cols="30" rows="5" class="form-control"></textarea>
                    {{-- <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"> --}}
                </div>




                {{-- <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div> --}}



                <div class="col-md-3 light_bg pb-3">
                    <label for="inputCity" class="form-label">Neighbourhood/Community</label>
                    <input type="text" name="city" class="form-control" id="inputCity">
                </div>
                <div class="col-md-3 light_bg pb-3">
                    <label for="inputCity" class="form-label">Expected Tenants/Buyers</label>
                    <select id="tenants" class="form-select" name="tenants">
                        <option>Choose...</option>
                        <option> Students</option>
                        <option>Staff</option>
                        <option>Anyone</option>
                    </select>
                </div>
                <div class="col-md-4 light_bg pb-3">
                    <label for="inputroomates" class="form-label">Number of roomates</label>
                    <select class="form-select border-5 border-warning" aria-label="Default select example"
                        name="roomates">
                        <option>Roomates</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="col-md-2 light_bg pb-3">
                    <label for="inputZip" class="form-label">Zip</label>
                    <input type="text" name="zip" class="form-control" id="inputZip">
                </div>




                <div class="col-md-4  pb-3">
                    <label for="inputCity" class="form-label">House Image 1</label>
                    <input type="file" class="form-control" id="inputCity" multiple name="images[]">
                </div>
                {{-- <div class="col-md-4  pb-3">
                    <label for="inputZip" class="form-label">House Image 2</label>
                    <input type="file" class="form-control" id="inputZip" name="image2">
                </div>
                <div class="col-md-4  pb-3">
                    <label for="inputZip" class="form-label">House Image 3</label>
                    <input type="file" class="form-control" id="inputZip" name="image3">
                </div> --}}



                {{-- <div class="col-md-4  pb-3">
                <label for="inputCity" class="form-label">Account </label>
                <input type="file" class="form-control" id="inputCity" name="image1">
                </div>
                <div class="col-md-4  pb-3">
                    <label for="inputZip" class="form-label">House Image 2</label>
                    <input type="file" class="form-control" id="inputZip" name="image2">
                </div>
                <div class="col-md-4  pb-3">
                    <label for="inputZip" class="form-label">House Image 3</label>
                    <input type="file" class="form-control" id="inputZip" name="image3">
                </div> --}}


                {{-- <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                </div>
                </div> --}}


                <div class="col-12 light_bg pb-3 pt-3">
                    <button type="submit" class="btn btn-primary">Create House</button>
                </div>
            </form>
        @endif

    </div>
</body>

</html>


<style>
    .create_house {
        background: #b98f58;
    }

    .light_bg {
        background: #deb887;
    }
</style>
