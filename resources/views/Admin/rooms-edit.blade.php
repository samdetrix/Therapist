@extends('Layouts.main')
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Edit Therapist Details</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboards</a></li>
                                    <li class="breadcrumb-item active">Edit a Therapist</li>
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
                                <form action="{{ route('rooms.update', ['room' => $room]) }}" class="needs-validation"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
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
                                        <div class="col-7">
                                            <div class="row">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="mb-4">
                                                            <label for="basicpill-firstname-input">Room Name <strong
                                                                    class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id=""
                                                                placeholder="Enter the name" name="room_name"
                                                                value="{{ $room->name }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-4">
                                                            <label for="basicpill-firstname-input">Building Name <strong
                                                                    class="text-danger">*</strong></label>
                                                            <input type="text" class="form-control" id=""
                                                                placeholder="Enter the name" name="building_name"
                                                                value="{{ $room->building_name }}" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="mb-4">
                                                        <label for="basicpill-firstname-input">Select Therapist <strong
                                                                class="text-danger">*</strong></label>
                                                        <select name="therapist_id" id="therapist_id" class="form-control">
                                                            @foreach ($therapists as $therapist)
                                                                <option value="{{ $therapist->id }}">{{ $therapist->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="card"
                                                style="background-color: #f0f8ff; border-radius: 10px; border: 1px solid #007bff; height: 180px;">
                                                <div class="card-body">
                                                    <h5 class="card-title">Update Fields</h5>
                                                    <p class="card-text">Please update the fields accordingly.</p>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12 mt-0 ">

                                            <input
                                                class="btn btn-primary waves-effect waves-light  mdi mdi-check-all font-size-12 align-middle me-2"
                                                type="submit" value="Edit Room Details">
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
