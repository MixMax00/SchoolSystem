
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice</title>
    <!-- Bootstrap CSS CDN -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> --}}
    <!-- Custom CSS -->
    <style>
        .col-1 {
            width: 8.33%;
        }

        .col-2 {
            width: 16.66%;
        }

        .col-3 {
            width: 25%;
        }

        .col-4 {
            width: 33.33%;
        }

        .col-5 {
            width: 41.66%;
        }

        .col-6 {
            width: 50%;
        }

        .col-7 {
            width: 58.33%;
        }

        .col-8 {
            width: 66.66%;
        }

        .col-9 {
            width: 75%;
        }

        .col-10 {
            width: 83.33%;
        }

        .col-11 {
            width: 91.66%;
        }

        .col-12 {
            width: 100%;
        }

        [class*='col-'] {
            float: left;
        }

        .row:after {
            content: " ";
            clear: both;
            display: block;
        }

        .container {
            width: 100%;
            height: auto;
            margin: auto;
        }

        .logo img{
            width: 150px;
            height: 150px;
        }
        .student-image{
            position: relative;
        }
        .student-image img{
            position: absolute;
            right: 0;
            width: 150px;
            height: 150px;
            margin-right: 0;
        }
        title{
            text-align: center;
            justify-items: center;
        }
        .title h2,
        .title h4{
            text-align: center;
            line-height: 5px;
        }
        .title{
            position: relative;
        }
        .title img{
            position: absolute;
            left: 20%;
            width: 150px;
            height: 150px;
        }
        .mt{
            margin-top: 30px;
        }

        .p-4 {
            padding: 1.5rem!important;
        }

        .shadow-sm {
            box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
        }
        .border-0 {
            border: 0!important;
        }

        .item{
            width: 90%;
            height: auto;
            box-sizing: border-box;
            padding:1% 5%;
        }
        .border{
            border: 1px solid #dad5d5;
        }
        .rounded{
            border-radius: 7px;
        }

        table, td, th {
            border: 1px solid #dad5d5;
            height: 30px;
            text-align: left;
            padding-left: 7px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
    </style>


</head>

<body>
        <div class="container">

            <div class="row mt">
                <div class="col-12">
                    <div class="title">
                        <h2 style="text-decoration: underline;">School Management System</h2>
                        <h4 style="text-decoration: underline; color:#ccc;">Invoice @2022</h4>
                    </div>
                </div>
            </div>
            <div class="row mt">
                <div class="col-4">
                    <div class="item border rounded">
                        <p><strong>Name:</strong> {{ $data->invoice->supplier->name }}</p>
                        <p><strong>Email:</strong> {{ $data->invoice->supplier->email }}</p>
                        <p><strong>Address:</strong> {{ $data->invoice->supplier->address }}</p>
                        <p class="mb-0"><strong>Date:</strong> {{  $data->created_at }}</p>
                    </div>
                </div>
                <div class="col-4">

                </div>
                <div class="col-4">
                    <div class="item border rounded">
                        <p><strong>Paid Amount:</strong>{{ $data->payment }} <br> <strong class="ms-3">Status:</strong> {{ $data->status == 1 ? "Unpaid" : "Paid" }}</p>
                        <p class="mb-0"><strong>Mode of Payment:</strong> {{ $data->type }}</p>
                    </div>
                </div>
            </div>
            <div class="row mt">
                <div class="col-12">
                    <table>
                            <tr>
                                <th>No</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total Price (Tk.)</th>
                            </tr>

                            <tr>
                                <td>1</td>
                                <td>{{ $data->invoice->name }}</td>
                                <td>{{ $data->invoice->total_quantity }}</td>
                                <td>{{ $data->invoice->price }} Tk.</td>
                                <td>{{ $data->invoice->total_price }} Tk.</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align:right;padding-right:10px;">Paid</td>
                                <td>{{ $data->payment  }} Tk.</td>
                            </tr>
                            @if ($data->due == "0")

                            @else
                            <tr>
                                <td colspan="4" style="text-align:right;padding-right:10px;">Due</td>
                                <td>{{ $data->due }} Tk.</td>
                            </tr>
                            @endif



                    </table>
                </div>
            </div>
            <div class="row" style="margin-top: 50px;">
                <div class="col-6" style="line-height: 1px;">
                    <p style="margin-left:15%;">Aminul</p>
                    <h5 style="text-decoration: underline;">Signature of the Participant</h5>
                </div>
            </div>
        </div>




    <!-- Bootstrap JS CDN -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> -->

</body>

</html>
