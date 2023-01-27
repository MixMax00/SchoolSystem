@extends('Backend.Admin.master')
@section('title')
    Accountant
@endsection


@php
    $accountants = \App\Models\Accountant::all();
@endphp
@section('content')
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h3>@yield('title')</h3>
        <ul>
            <li>
                <a href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li>@yield('title')</li>
        </ul>
    </div>

    <!-- Breadcubs Area End Here -->
    <div class="card">
        <div class="card-body">
            <div class="heading-layout1">
                <div class="item-title">
                    <h3>Accountant</h3>
                </div>
                <div class="dropdown">
                    @if (auth()->user()->hasPermission('app.accountant.create'))
                        <a href="{{ route('admin.accountant.create') }}" class="fw-btn-fill btn-gradient-yellow"><i
                                class="fa fa-plus"></i> Add Accountant</a>
                    @endif
                </div>
            </div>
        <div class="table-responsive">
            <table class="table display data-table text-nowrap">
                <thead>
                    <tr>
                        <th>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input checkAll">
                                <label class="form-check-label">ID</label>
                            </div>
                        </th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Salary</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($accountants as $accountant)
                        <tr>
                            <td>
                                {{ $loop->index + 1 }}
                            </td>
                            <td>{{ $accountant->name }}</td>
                            <td>{{ $accountant->designation }}</td>
                            <td>{{ $accountant->email }}</td>
                            <td>
                                @if ($accountant->image)
                                    <img src="{{ asset($accountant->image) }}" alt="" width="100px" height="100px">
                                @else
                                    <img src="{{ asset('assets/backend/img/default.jpg') }}" alt="" width="100px"
                                        height="100px">
                                @endif
                            </td>
                            <td>{{ $accountant->salary }}</td>
                            <td>
                                @if (auth()->user()->hasPermission('app.accountant.create'))
                                    <a href="{{ route('admin.accountant.edit', ['id' => $accountant->id]) }}"
                                        class="dropdown-item"><i class="fas fa-edit text-secondery"></i></a>
                                    <a class="dropdown-item"
                                        href="{{ route('admin.accountant.status', ['id' => $accountant->id]) }}"><i
                                            class="fas fa-arrow-{{ $accountant->status == 1 ? 'circle-up' : 'circle-down' }}"></i></a>


                                    <button class="dropdown-item delete_btn " value="{{ $accountant->id }}"
                                        id="delete"><i class="fas fa-trash text-danger "></i></button>
                                    @endif
                            </div>
                        </div>

                        </td>
                        </tr>
                        @endforeach

    </tbody>
    </table>
    </div>
    </div>
    </div>
@endsection



@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {

            $(document).on('click', '.delete_btn', function(e) {
                e.preventDefault();
                let emp_id = $(this).val();



                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result) {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "GET",
                                url: "trash/" + emp_id,
                                success: function(response) {
                                    if (response.status == 200) {
                                        window.location.reload()
                                    }
                                }
                            })
                        }
                    }
                })


            });



        })
    </script>
@endsection
