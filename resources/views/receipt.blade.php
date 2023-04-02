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
                    <th> </th>
                    <td><button onclick="window.print()" class="btn btn-outline-success float-end">Print</button></td>
                </tr>
                
            </tbody>
        </table>

        

    </div>
</body>

</html>

