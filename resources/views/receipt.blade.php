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
    <div class="container mt-5 pt-5">
        <h1 class="text-center">Your Receipt</h1>

        <table class="table table-responsive     table-striped ms-5 container ps-5 border border-3" style="width: 40%;">
            {{-- <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead> --}}
            <tbody>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">House address:</th>
                    <td>{{$house[0]->address}}</td>
                </tr>
                <tr>
                    <th scope="row">Price:</th>
                    <td>N{{$house[0]->price}}</td>
                </tr>
                <tr>
                    <th scope="row">Duration:</th>
                    <td colspan="2">per / {{$house[0]->duration}}</td>
                </tr>
                <tr>
                    <th scope="row">Land Lord:</th>
                    <td colspan="2">{{$landLord[0]->name}}</td>
                </tr>
                <tr>
                    <th scope="row">reference number:</th>
                    <td colspan="2">{{$reference}}</td>
                </tr>
                <tr>
                    <th scope="row">Buyer:</th>
                    <td colspan="2">{{$user[0]->name}}</td>
                </tr>

                <tr>
                    <th> </th>
                    <td><button onclick="window.print()" class="btn btn-outline-success float-end">Print</button></td>
                </tr>
                
            </tbody>
        </table>

        

    </div>

    <form action="/houses/full-page/{{$house[0]->id}}">
        <button class="back btn btn-lg rounded"><i
                class="bi bi-arrow-left-circle-fill  fs-1 pt-2 text-white bg-warning"></i>
        </button>
    </form>
</body>

</html>

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

