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
    <div class="container mt-3 pt-3">
        <form id="paymentForm" class="mt-5 text-center border border-3 py-3 px-3">
            <div class="form-group">
                <label class="h4" for="email">Email Address</label>
                <input type="email" class="form-control mb-4" id="email-address" readonly value="{{Auth::user()->email}}" required />
            </div>
            <div class="form-group">
                <label class="h4" for="amount">Amount</label>
                <input class="form-control mb-4" type="tel" id="amount" readonly value="{{$house[0]->price}}" required />
            </div>
            <div class="form-group">
                <label class="h4" for="first-name">First Name</label>
                <input class="form-control mb-4" type="text" readonly value="{{Auth::user()->name}}" id="first-name" />
            </div>
            <div class="form-group">
                <label class="h4" for="last-name">Last Name</label>
                <input class="form-control mb-4" type="text" readonly value="{{Auth::user()->name}}" id="last-name" />
            </div>
            <div class="form-group">
                <label class="h4" for="payment-for">Payment For</label>
                <input class="form-control mb-4" type="text" readonly value="{{$house[0]->type}} in {{$house[0]->address}}" id="payment-for" />
            </div>
            <div class="form-group">
                <label class="h4" for="payment-duration">Payment Duration</label>
                <input class="form-control mb-4" type="text" readonly value="N{{$house[0]->price}} / {{$house[0]->duration}}" id="payment-duration" />
            </div>
            {{-- <div class="form-group">
                <input type="text" id="productId" value="" hidden />
            </div> --}}
            <div class="form-submit">
                <button type="submit" class="btn btn-warning btn-lg mt-1" onclick="payWithPaystack()"> Pay </button>
            </div>
        </form>

        <form action="/houses/full-page/{{$house[0]->id}}">
            <button class="back btn btn-lg rounded"><i
                    class="bi bi-arrow-left-circle-fill  fs-1 pt-2 text-white bg-warning"></i>
            </button>
        </form>

        <script src="https://js.paystack.co/v1/inline.js"></script>
    </div>
</body>

</html>

<script>
    let segment = {{$segment}};
</script>

<script>
    const paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener("submit", payWithPaystack, false);

    function payWithPaystack(e) {
        e.preventDefault();

        let handler = PaystackPop.setup({
            key: 'pk_test_270f2e657ce9444f10ed0bc75ced8e2ce4a8ed7b', // Replace with your public key
            email: document.getElementById("email-address").value,
            amount: document.getElementById("amount").value * 100,
            ref: '' + Math.floor((Math.random() * 1000000000) +
            1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            // label: "Optional string that replaces customer email"
            onClose: function() {
                alert('Window closed.');
            },
            callback: function(response) {
                let reference = response.reference;
                window.location = "verify-payment/" + reference + "/" + segment;
            }
        });

        handler.openIframe();
    }
</script>

<style>
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