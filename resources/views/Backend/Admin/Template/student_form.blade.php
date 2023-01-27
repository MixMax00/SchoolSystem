@php
    $generalInfo = \App\Models\GeneralSettings::find(1);
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Admission form</title>
    <link rel="stylesheet" href="">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
        }

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
            width: 80%;
            height: auto;
            margin: auto;
        }

        .logo img{
            width: 100px;
            height: 100px;
            border: 1px solid #fff;
            margin-top: 50px;
        }
        .student-image img{
            width: 100px;
            height: 100px;
            border: 1px solid rgb(26, 24, 24);
            margin-top: 50px;
        }
        .title{
            text-align: center;
        }
        .address p{
            line-height: 4px;
        }
        .form-group{
            width: 90%;
            margin: 5px;
        }
        .form-group label{
            font-size:18px;
            margin-bottom: 5px;
        }
        .form-group .form-control{
            width: 100%;
            padding: 5px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 300;
            background-color: rgb(235, 231, 231);
        }
        table{
            width: 100%;
            border: 1px solid #000;
            text-align: center;
        }
        table tr th{
            background-color: #ccc;
        }
        .sinature{
            justify-content: flex-end;
            align-items: flex-end;
            text-align: right;
            margin-top: 50px;
            margin-right: 10px;
            display: block;
        }
        .sinature img{
            width: 50px;
            height: 50px;
        }
        .address-footer p{
           text-align: right;
        }
        .sing{
            text-align: right;
        }


    </style>
</head>
<body>
    <div class="row">
        <div class="col-2">
            <div class="logo">
                <img src="{{ asset($generalInfo->logo) }}" alt="">
            </div>
        </div>
        <div class="col-8">
            <div class="title">
                <h3>{{ $generalInfo->website_name }}</h3>
                <div class="address">
                    <P>12/5 Dhaka Would Road, Dhaka, Bangladesh</P>
                    <P><span><i class="fas fa-envelope"></i></span> {{ $generalInfo->email }}</P>
                    <P><span><i class="fas fa-globe"></i></span> www.drutosoft.com</P>
                    <P><span><i class="fas fa-phone"></i></span> {{ $generalInfo->phone }}</P>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="student-image">
                <img src="{{ asset('assets/backend/avatar/student_avatar.jpg') }}" alt="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="title">
                <h4>Student Information</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Student Name</label>
                <input type="text" class="form-control" value="Nujmul Sakib">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Branch</label>
                <input type="text" class="form-control" value="Dhaka">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Father's Name</label>
                <input type="text" class="form-control" value="Nujmul Sakib">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Mother's Name</label>
                <input type="text" class="form-control" value="Dhaka">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Class</label>
                <input type="text" class="form-control" value="Five">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Section</label>
                <input type="text" class="form-control" value="A">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Reg No.</label>
                <input type="text" class="form-control" value="1234567890">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Roll No.</label>
                <input type="text" class="form-control" value="12345">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Date of Birth</label>
                <input type="text" class="form-control" value="12/3/1890">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Gender.</label>
                <input type="text" class="form-control" value="Male">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Religion</label>
                <input type="text" class="form-control" value="Islam">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Blood Group</label>
                <input type="text" class="form-control" value="A+">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="edu-title">
            <h4>Educational Qualification</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table>
                <tr>
                    <th>Sl No</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Borad</th>
                    <th>Year</th>
                    <th>Reg</th>
                    <th>Roll</th>
                    <th>GPA</th>
                </tr>
                <tr>
                    <td>01</td>
                    <td>JSC</td>
                    <td></td>
                    <td>Dhaka</td>
                    <td>2016</td>
                    <td>12345678</td>
                    <td>12345</td>
                    <td>5</td>
                </tr>
                <tr>
                    <td>01</td>
                    <td>SSC</td>
                    <td>Arts</td>
                    <td>Dhaka</td>
                    <td>2018</td>
                    <td>12345678</td>
                    <td>12345</td>
                    <td>4.5</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="sinature">
                <img src="{{ asset($generalInfo->logo) }}" alt="">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-3"></div>
        <div class="col-5">
            <div class="address-footer">
                <P>{{ $generalInfo->address }}</P>
            </div>
            <div class="principle-sing">

            </div>
            <h4 class="sing">
                Singnature
            </h4>
        </div>
    </div>
</body>
</html>
