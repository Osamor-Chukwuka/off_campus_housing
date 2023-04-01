@include('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receipt</title>
</head>
<body>
    <div class="container ">
        <h1 class="text-center">Your Receipt</h1>

        <div class="row border border-4" style="width: 50%;">
            <div class="col fs-3 align-self-center">
                <ul class="receipt_list">
                    <li>House type:</li>
                    <li>House address:</li>
                    <li>Price:</li>
                    <li>Duration</li>
                    <li>Land Lord:</li>
                    <li>reference number:</li>
                </ul>
            </div>
            
            <div class="col">
                <div class="d-flex" style="height: 400px;">
                    <div class="vr"></div>
                </div>  

                <button onclick="window.print()" class="btn btn-outline-success">Print</button>
            </div>

            <div class="col fs-3 align-self-center">
                <ul class="receipt_list">
                    <li>bungalow</li>
                    <li>bungalow</li>
                    <li>bungalow</li>
                    <li>bungalow</li>
                    <li>bungalow</li>
                    <li>bungalow</li>
                    <li>bungalow</li>
                    <li>bungalow</li>
                    
                </ul>
            </div>
        </div>
        
    </div>
</body>
</html>



<style>
    .receipt_list{
        list-style-type:none;
    }
</style>