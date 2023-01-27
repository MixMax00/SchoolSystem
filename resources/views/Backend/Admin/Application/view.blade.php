@extends('Backend.Admin.master')
@section('title')
    Application Canidate
@endsection

@section('css')
<style>
    .address h6{
        padding: 0!important;
    }
    span {
    font-size: 16px;
    }
    .form-control {
    background-color: #ffffff;
    }
    .form-select {
    background-color: #ffffff;
    }
    p {
    font-size: 10px;
    }
    .border-section {
        box-shadow: 5px 5px 5px 0px rgba(0, 0, 0, 0.15);
        background-color: #e5e5e5;
        padding: 1.5rem 3rem 3rem 3rem;
        border-radius: 12px;
    }
    @media (max-width: 767.98px) {
    .border-section {
        padding: 0.25rem 1.5rem 1.5rem 1.5rem;
    }
    }
    label {
    margin-top: 1rem;
    }
    h3 {
        font-family: "Poppins";
        font-style: normal;
        font-weight: 600;
        font-size: 20px;
        text-transform: uppercase;
        color: var(--primary-color);
    }
    @media (max-width: 767.98px) {
    h3 {
        font-size: 18px;
        }
    }

</style>
@endsection

@section('content')

    <section class="section_padding mt-5">
        <div class="container">
        <div class="row border-section mb-4">
            <div class="col-4">
                <div class="logo">
                    <img src="{{ asset('assets/frontend/image/logo/Logo.png') }}" width="200px" height="300px"/>
                </div>
            </div>
            <div class="col-4">
                <div class="address mt-3">
                    <h4>Thakurgaon Polytechnic Institute</h4>
                    <h6>498 Street Area,
                     Dhaka, Bangladesh.</h6>
                     <h6>tpi@gmail.com</h6>
                     <h6>0178954612</h6>
                </div>
            </div>
            <div class="col-4">
                <div class="image d-flex justify-content-end align-items-center">
                    <img src="{{ asset('assets/frontend/image/event/1.png') }}" width="200px" height="200px"/>
                </div>
            </div>
        </div>
        <div class="row border-section">
            <div class="col-lg-6 col-sm-12">

                <div class="form-group">
                <label for="name">Name</label>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    aria-describedby="emailHelp"
                />
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input
                    type="email"
                    class="form-control"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                />
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Cannot understand</label>
                <input
                    type="email"
                    class="form-control"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                />
                </div>
                <div class="form-group">
                <label for="phone">Gender</label>
                <div class="input-group">
                    <select
                    class="form-select"
                    id="inputGroupSelect03"
                    aria-label="Example select with button addon"
                    >
                    <option selected>Select Blood Group</option>
                    <option value="1">Female</option>
                    <option value="2">Male</option>
                    <option value="3">Common</option>
                    </select>
                </div>
                </div>
                <div class="form-group">
                <label for="name">Religion</label>
                <input
                    type="text"
                    class="form-control"
                    id="religion"
                    aria-describedby="emailHelp"
                />
                </div>
            </form>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="form-group">
                <label for="phone">Mobile Number</label>
                <input
                    type="number"
                    class="form-control"
                    id="phone"
                    aria-describedby="emailHelp"
                />
                </div>
                <div class="form-group">
                <label for="phone">BirthDate</label>
                <input
                    type="date"
                    class="form-control"
                    id="exampleFormControlInput1"
                    placeholder=""
                />
                </div>
                <div class="form-group">
                <label for="phone">Blood Group</label>
                <div class="input-group">
                    <select
                    class="form-select"
                    id="inputGroupSelect03"
                    aria-label="Example select with button addon"
                    >
                    <option selected>Select Blood Group</option>
                    <option value="1">B+</option>
                    <option value="2">AB+</option>
                    <option value="3">O-</option>
                    </select>
                </div>
                </div>
                <div class="form-group">
                <label for="name">Nationality</label>
                <input
                    type="text"
                    class="form-control"
                    id="nationality"
                    aria-describedby="emailHelp"
                />
                </div>
            </div>
        </div>
        <h3 class="text-uppercase mt-4 header">Parents:</h3>
        <div class="row border-section">
            <div class="col-lg-6 col-sm-12">
            <h6>Father's Information:</h6>
            <form>
                <div class="form-group">
                <label for="name">Father's Name</label>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    aria-describedby="emailHelp"
                />
                </div>
                <div class="form-group">
                <label for="phone">Mobile Number</label>
                <input
                    type="text"
                    class="form-control"
                    id="phone"
                    aria-describedby="emailHelp"
                />
                </div>
                <div class="form-group">
                <label for="NID">NID</label>
                <input
                    type="number"
                    class="form-control"
                    id="NID"
                    aria-describedby="emailHelp"
                />
                </div>

            </div>

            <div class="col-lg-6 col-sm-12">
            <h6>Mother's Information:</h6>

                <div class="form-group">
                <label for="name"> Mother's Name</label>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    aria-describedby="emailHelp"
                />
                </div>
                <div class="form-group">
                <label for="NID">Mobile Number</label>
                <input
                    type="number"
                    class="form-control"
                    id="NID"
                    aria-describedby="emailHelp"
                />
                </div>
                <div class="form-group">
                <label for="phone">NID</label>
                <input
                    type="number"
                    class="form-control"
                    id="phone"
                    aria-describedby="emailHelp"
                />
                </div>

            </div>
        </div>
        <h3 class="text-uppercase mt-4 header">local guardian:</h3>
        <div class="row border-section">
            <div class="col-lg-6 col-sm-12">

                <div class="form-group">
                <label for="name">Name</label>
                <input
                    type="text"
                    class="form-control"
                    id="name"
                    aria-describedby="emailHelp"
                />
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Email </label>
                <input
                    type="email"
                    class="form-control"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                />
                </div>

            </div>
            <div class="col-lg-6 col-sm-12">

                <div class="form-group">
                <label for="phone">Mobile Number</label>
                <input
                    type="number"
                    class="form-control"
                    id="phone"
                    aria-describedby="emailHelp"
                />
                </div>
                <div class="form-group">
                <label for="NID">NID</label>
                <input
                    type="number"
                    class="form-control"
                    id="NID"
                    aria-describedby="emailHelp"
                />
                </div>

            </div>
        </div>
        <h3 class="text-uppercase mt-4 header">Present Address:</h3>
        <div class="row border-section">
            <div class="col-lg-6 col-sm-12">

                <div class="form-group">
                <label for="name">Village</label>
                <input
                    type="text"
                    class="form-control"
                    id="Village"
                    aria-describedby="emailHelp"
                />
                </div>
                <div class="form-group">
                <label for="phone">Division</label>
                <div class="input-group">
                    <select
                    class="form-select"
                    id="inputGroupSelect03"
                    aria-label="Example select with button addon"
                    >
                    <option selected>Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    </select>
                </div>
                </div>
                <div class="form-group">
                <label for="phone">union</label>
                <div class="input-group">
                    <select
                    class="form-select"
                    id="inputGroupSelect03"
                    aria-label="Example select with button addon"
                    >
                    <option selected>Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    </select>
                </div>
                </div>

            </div>
            <div class="col-lg-6 col-sm-12">

                <div class="form-group">
                <label for="phone">Thana</label>
                <div class="input-group">
                    <select
                    class="form-select"
                    id="inputGroupSelect03"
                    aria-label="Example select with button addon"
                    >
                    <option selected>Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    </select>
                </div>
                </div>
                <div class="form-group">
                <label for="phone">Distric</label>
                <div class="input-group">
                    <select
                    class="form-select"
                    id="inputGroupSelect03"
                    aria-label="Example select with button addon"
                    >
                    <option selected>Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    </select>
                </div>
                </div>

            </div>
        </div>
        <div class="row pt-4">
            <div class="col-lg-6">
            <div class="form-group form-check">
                <input
                type="checkbox"
                class="form-check-input"
                id="exampleCheck1"
                />
                <span class="form-check-label" for="exampleCheck1"
                >Check me out</span
                >
            </div>
            </div>
        </div>

        <h3 class="text-uppercase mt-4 header">Permanant Address:</h3>
        <div class="row border-section">
            <div class="col-lg-6 col-sm-12">

                <div class="form-group">
                <label for="name">Village</label>
                <input
                    type="text"
                    class="form-control"
                    id="Village"
                    aria-describedby="emailHelp"
                />
                </div>
                <div class="form-group">
                <label for="phone">Division</label>
                <div class="input-group">
                    <select
                    class="form-select"
                    id="inputGroupSelect03"
                    aria-label="Example select with button addon"
                    >
                    <option selected>Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    </select>
                </div>
                </div>
                <div class="form-group">
                <label for="phone">union</label>
                <div class="input-group">
                    <select
                    class="form-select"
                    id="inputGroupSelect03"
                    aria-label="Example select with button addon"
                    >
                    <option selected>Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    </select>
                </div>
                </div>

            </div>
            <div class="col-lg-6 col-sm-12">

                <div class="form-group">
                <label for="phone">Thana</label>
                <div class="input-group">
                    <select
                    class="form-select"
                    id="inputGroupSelect03"
                    aria-label="Example select with button addon"
                    >
                    <option selected>Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    </select>
                </div>
                </div>
                <div class="form-group">
                <label for="phone">Distric</label>
                <div class="input-group">
                    <select
                    class="form-select"
                    id="inputGroupSelect03"
                    aria-label="Example select with button addon"
                    >
                    <option selected>Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    </select>
                </div>
                </div>

            </div>
        </div>

        <h3 class="text-uppercase mt-4 header">SSC:</h3>
        <div class="row border-section">
            <div class="col-lg-6 col-sm-12">

                <div class="form-group">
                <label for="name">Roll</label>
                <input
                    type="number"
                    class="form-control"
                    id="roll"
                    aria-describedby="emailHelp"
                />
                </div>
                <div class="form-group">
                <label for="name">GPA</label>
                <input
                    type="number"
                    class="form-control"
                    id="gpa"
                    aria-describedby="emailHelp"
                />
                </div>

                <div class="form-group">
                <label for="phone">Trade</label>
                <div class="input-group">
                    <select
                    class="form-select"
                    id="inputGroupSelect03"
                    aria-label="Example select with button addon"
                    >
                    <option selected>Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    </select>
                </div>
                </div>

            </div>
            <div class="col-lg-6 col-sm-12">

                <div class="form-group">
                <label for="name">Registration</label>
                <input
                    type="number"
                    class="form-control"
                    id="regi"
                    aria-describedby="emailHelp"
                />
                </div>
                <div class="form-group">
                <label for="phone">Board</label>
                <div class="input-group">
                    <select
                    class="form-select"
                    id="inputGroupSelect03"
                    aria-label="Example select with button addon"
                    >
                    <option selected>Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    </select>
                </div>
                </div>
                <div class="form-group">
                <label for="phone">Course</label>
                <div class="input-group">
                    <select
                    class="form-select"
                    id="inputGroupSelect03"
                    aria-label="Example select with button addon"
                    >
                    <option selected>Select</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    </select>
                </div>
                </div>

            </div>
        </div>
        </div>
    </section>


@endsection
