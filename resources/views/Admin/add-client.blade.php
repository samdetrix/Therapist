@extends('Layouts.main')
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Add a Client</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboards</a></li>
                                    <li class="breadcrumb-item active">Add a Client</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <!-- eTransactions table -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('clients.store')}}" class="needs-validation" method="POST"
                                    enctype="application/x-www-form-urlencoded">
                                    @csrf
                                    @if (Session::has('success'))
                                        <div class="alert alert-success alert-block">
                                            <strong>{{ Session::get('success') }}</strong>
                                        </div>
                                    @endif

                                    @if (Session::has('error'))
                                        <div class="alert alert-danger alert-block">
                                            <strong>{{ Session::get('error') }}</strong>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="card shadow-sm border h-100">
                                                    <div class="card-header">
                                                        Client Details
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="mb-4">
                                                                    <label for="basicpill-firstname-input">Client's Name
                                                                        <strong class="text-danger">*</strong></label>
                                                                    <input type="text" class="form-control"
                                                                        id="" placeholder="Enter the name"
                                                                        name="name" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="mb-4 form-group">
                                                                    <label for="basicpill-firstname-input">Gender <strong
                                                                            class="text-danger">*</strong></label>
                                                                    <select class="form-control" id="gender"
                                                                        name="gender" required>
                                                                        <option value="male">Male</option>
                                                                        <option value="female">Female</option>
                                                                        <option value="other">Other</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="mb-4">
                                                                    <label for="basicpill-firstname-input">Email <strong
                                                                            class="text-danger">*</strong></label>
                                                                    <input type="email" class="form-control"
                                                                        id="" placeholder="email@email.com"
                                                                        name="email" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="mb-4">
                                                                    <label for="basicpill-firstname-input">Phone Number
                                                                        <strong class="text-danger">*</strong></label>
                                                                    <input type="text" class="form-control"
                                                                        id="" placeholder="Phone number"
                                                                        name="phone_number" required>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="mb-4">
                                                                    <label for="basicpill-firstname-input">Postal Address
                                                                        <strong class="text-danger">*</strong></label>
                                                                    <input type="text" class="form-control"
                                                                        id=""
                                                                        placeholder="Enter the personal address"
                                                                        name="address" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="mb-4">
                                                                    <label for="basicpill-firstname-input">ID Number <strong
                                                                            class="text-danger">*</strong></label>
                                                                    <input type="text" class="form-control"
                                                                        id="" name="id_number"
                                                                        placeholder="Enter your ID Number" required>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="card shadow-sm border h-100">
                                                    <div class="card-header">
                                                        Next of Kin
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="mb-4">
                                                            <label class="text-capitalize"
                                                                for="basicpill-firstname-input">Name<strong
                                                                    class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id=""
                                                                placeholder="Enter next of kin's name"
                                                                name="next_of_kin_name" required>
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="text-capitalize"
                                                                for="basicpill-firstname-input">Phone Number<strong
                                                                    class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control mb-110px"
                                                                id=""
                                                                placeholder="Enter next of kin's phone number"
                                                                name="next_of_kin_number" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12  text-end" style="margin-top:20px;">
                                            <input
                                                class="btn btn-primary waves-effect waves-light mdi mdi-check-all font-size-12 align-middle me-2"
                                                type="submit" value="Register Client">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>

                <!-- end row -->
            </div>
        </div>


    </div>
    </div>
@endsection
