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
            @php
                $images = explode('|', $house->images);
                $features = explode(',', $house->features);
                $furnishings = explode(',', $house->furnishings);
                $counter2 = 0;
                // dd($features);
                
                $user_id = 0;
                $landlord_id = $house->landlord_id;
                $house_id = $house->id;
                $account_type = 'Account-type';
            @endphp

            <img src="{{ asset('storage/images/houses/' . $images[1]) }}" class="img-fluid w-100 opacity-50"
                alt="...">
            <figcaption style="position: absolute; bottom: 0; left: 0; right: 0;  padding: 70px; padding-bottom: 17%"
                class="text-white bold">
                <h1 class="display-4 w-10 text-uppercase fw-bolder text-reset opacity-100">Rent a <br> Modern House <br>
                    off campus</h1>
            </figcaption>
        </figure>

    </div>
    <div class="container text-center">
        <h1 class="display-1 fw-light">{{ $house->type }}</h1>
        <h1><i class="bi bi-dash-lg fs-1 display-1 fw-bolder h1 text-warning"></i></h1>
        <p style="padding-right: 13%; padding-left:13%" class="text-center fs-5 fw-semi-bold mb-5">{{ $house->address }}
        </p>
    </div>

    <div class="mb-5 pb-5">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                {{-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button> --}}
            </div>
            <div class="carousel-inner container">
                @foreach ($images as $item)
                    <div class="carousel-item active">
                        {{-- <img src="{{ asset('storage/images/header-img3.jpg') }}" class="d-block w-100" alt="..."> --}}
                        <div class="hstack gap-5">
                            @foreach ($images as $item)
                                <div class="bg-body-tertiary border">
                                    <img src="{{ asset('storage/images/houses/' . $item) }}" class="d-block"
                                        alt="...">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

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

        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
            @if ($order != '[]' && $order[0]->productId)
                <a class="btn mt-3 pt-3 btn-lg btn-warning fs-5 fw-bolder text-decoration-none text-center disabled text-white"
                    href="/house/pay/{{ $house->id }}"><i
                        class="bi bi-exclamation-triangle-fill fs-3 text-danger"></i> Not Available
                </a>
                
                @if ($house->landlord_id == Auth::user()->id or $order[0]->userId == Auth::user()->id)
                    <a class="btn mt-3 pt-3 btn-lg btn-warning fs-5 fw-bolder text-decoration-none text-center text-white"
                        href="/house/pay/receipt/{{ $house->id }}/{{ $house->landlord_id }}">View Receipt
                    </a>
                @endif
            @else
                <a class="btn mt-3 pt-3 btn-lg btn-warning fs-5 fw-bolder text-decoration-none text-center text-white"
                    href="/house/pay/{{ $house->id }}">Pay Now
                </a>
            @endif

            <a class="btn mt-3 btn-lg btn-outline-warning fs-5 fw-bolder text-decoration-none text-center"
                href="https://wa.me/{{ $landlord_phone[0]->number }}"><i class="bi bi-whatsapp fs-3"></i> Message
                LandLord
            </a>
        </div>
    </div>




    <div class="container mb-5">
        <div class="row g-5">
            <div class="col-6">
                <div>
                    <h2 class="fw-bolder">Details</h2>
                    {{-- <p class="fs-5"></p><br> --}}
                </div>


                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button border border-warning text-black fs-5 fw-bolder"
                                type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                ABOUT
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body border border-warning">
                                {{ $house->about }}
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed border border-warning text-black fs-5 fw-bolder"
                                type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                aria-expanded="false" aria-controls="collapseTwo">
                                Cost
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body border border-warning">
                                This House Cost <strong>{{ 'N' . $house->price . '/' . $house->duration }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed border border-warning text-black fs-5 fw-bolder"
                                type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                aria-expanded="false" aria-controls="collapseThree">
                                Gender Open Housing
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body border border-warning">
                                {{ $house->gender }}
                            </div>
                        </div>
                    </div>
                </div>



                <div class="mt-5 pt-5">
                    <h2 class="fw-bolder">FEATURES & AMENITIES</h2>
                    <div class="border border-warning">
                        <ul class="mt-2 fs-5">
                            @foreach ($features as $key)
                                <li>{{ $key }}</li>
                                @php
                                    $counter2++;
                                    
                                    if ($counter2 >= 2) {
                                        break;
                                    }
                                @endphp
                            @endforeach
                        </ul>
                        <button class="btn btn-warning fs-5 fw-bold" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Show
                            All</button>

                        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1"
                            id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title fw-bolder" id="offcanvasWithBothOptionsLabel">FEATURES &
                                    AMENITIES
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="fs-5">
                                    @foreach ($features as $feature)
                                        <li>{{ $feature }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>




                <div class="mt-5 pt-5">
                    <h2 class="fw-bolder">FURNISHINGS</h2>
                    <div class="border border-warning">
                        <ul class="mt-2 fs-5">
                            @foreach ($furnishings as $furnishing)
                                <li>{{ $furnishing }}</li>
                                @php
                                    $counter2++;
                                    
                                    if ($counter2 >= 4) {
                                        break;
                                    }
                                @endphp
                            @endforeach
                        </ul>
                        <button class="btn btn-warning fs-5 fw-bold" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Show All
                        </button>

                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                            aria-labelledby="offcanvasRightLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title fw-bolder" id="offcanvasRightLabel">FURNISHINGS</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="mt-2 fs-5">
                                    @foreach ($furnishings as $furnishing)
                                        <li>{{ $furnishing }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-6">
                <h2 class="fw-bolder">Location</h2>

                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15765.097872139924!2d7.557224000000001!3d8.946836699999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sng!4v1678842587306!5m2!1sen!2sng"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>


                <div class="accordion mt-3" id="accordionExample3">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne3">
                            <button class="accordion-button border border-warning text-black fs-5 fw-bolder"
                                type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne3"
                                aria-expanded="true" aria-controls="collapseOne3">
                                Getting Around
                            </button>
                        </h2>
                        <div id="collapseOne3" class="accordion-collapse collapse show" aria-labelledby="headingOne3"
                            data-bs-parent="#accordionExample3">
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
                </div>


                <div class="mt-5 pt-5">
                    <h2 class="fw-bolder">CONTACT</h2>
                    <div class="border border-warning">
                        <ul class="mt-2 fs-5 fw-bold">
                            <li>Phone: <a
                                    href="tel:{{ $landlord_phone[0]->number }}">+{{ $landlord_phone[0]->number }}</a>
                            </li>
                            <li>Email: <a
                                    href="mailto: {{ $landlord_phone[0]->email }}">{{ $landlord_phone[0]->email }}</a>
                            </li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>

        <div class="accordion mt-5" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button border border-warning text-black fs-5 fw-bolder" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseComment" aria-expanded="true"
                        aria-controls="collapseComment">
                        Comments and Reviews
                    </button>
                </h2>
                <div id="collapseComment" class="accordion-collapse collapse show" aria-labelledby="headingComment"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body border border-warning">
                        <div class="">
                            <div class="overflow-y-auto">
                                @if ($messages == '[]')
                                @else
                                    @foreach ($messages as $message)
                                        @php
                                            $user = Auth::user()
                                                ->where('id', $message->user_id)
                                                ->get('*');
                                            // dd($user)
                                        @endphp
                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info"
                                            class="user_name">
                                            <img src="{{ asset('storage/images/profile/' . $user[0]->picture) }}"
                                                class="img-comment" alt="avatar"> <span
                                                class="ms-2 h5 text-black bolder fw-5">{{ $user[0]->name }}</span>
                                        </a>
                                        <div class="chat-about mb-5">
                                            <h6 class="m-b-0 fs-5">{{ $message->message }}
                                            </h6>
                                            <small class="italics bg-s"><i class="bi bi-calendar"></i>
                                                {{ $message->created_at }}</small>
                                        </div>
                                    @endforeach

                                @endif


                                {{-- <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info"
                                    class="user_name">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="img-comment"
                                        alt="avatar"> <span class="ms-2 h5 text-black bolder fw-5">User 1</span>
                                </a>
                                <div class="chat-about mb-5">
                                    <h6 class="m-b-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Similique dolores nulla explicabo cumque ipsam veniam eos nesciunt esse magni
                                        totam iure autem facilis est, repellat velit reiciendis quos vero. Nulla.</h6>
                                    <small>Last seen: 2 hours ago</small>
                                </div> --}}

                                <div class="chat-message clearfix">
                                    <form action="/house/comment/{{ $house_id }}/{{ $landlord_id }}"
                                        method="post">
                                        @csrf
                                        <div class="input-group mb-0">
                                            <input type="text" name="message" class="form-control"
                                                placeholder="Enter text here...">
                                            <div class="input-group-prepend">
                                                <button type="submit" class="border-0">
                                                    <span class="input-group-text"><i
                                                            class="bi bi-send-fill"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="/houses">
            <button class="back btn btn-lg rounded"><i
                    class="bi bi-arrow-left-circle-fill  fs-1 pt-2 text-white bg-warning"></i>
            </button>
        </form>
</body>

</html>


<style>
    .img-comment {
        width: 45px;
        border-radius: 50%;
        text-decoration: none;
    }

    .user_name {
        text-decoration: none;
        font-weight: bolder;
    }



    .back {
        position: fixed;
        top: 50%;
        left: 40px;
        z-index: 9999;
        width: 52px;
        height: 57px;
        text-align: center;
        line-height: 5px;
        /* background: #b0b435; */
        /* color: #ffffff; */
        cursor: pointer;
        border: 0;
        border-radius: 0px;
        text-decoration: none;
        transition: opacity 0.2s ease-out;
        font-size: 28px;
    }
</style>

<script>
    if (window.history && window.history.pushState) {
        $(window).on('popstate', function() {
            window.history.pushState('forward', null, './#');
            window.history.forward();
        });
    }
</script>
