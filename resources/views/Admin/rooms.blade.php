@extends('Layouts.main')
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboards</a></li>
                                    <li class="breadcrumb-item active">All Rooms</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        @if (session('successMessage'))
                            <div class="alert alert-success">
                                {{ session('successMessage') }}
                            </div>
                        @endif

                        @if (Session::has('error'))
                            <div class="alert alert-danger alert-block">
                                <strong>{{ Session::get('error') }}</strong>
                            </div>
                        @endif
                        <div class="card">
                            <div
                                class="card-header bg-white pt-0 pr-0 p-0 d-flex justify-content-between align-items-center w-100 border-bottom">

                                <div class="btn-toolbar p-3 d-flex justify-content-between align-items-center w-100"
                                    role="toolbar">

                                    <h4 class="card-title text-capitalize mb-0 ">
                                        Register a Room
                                    </h4>

                                    <div class="d-flex">
                                        <a href="#" type="button"
                                            class="btn btn-primary dropdown-toggle option-selector" data-bs-toggle="modal"
                                            data-bs-target=".room-modal">
                                            <i class="mdi  mdi-folder-plus  font-size-16"></i> <span
                                                class="pl-1 d-md-inline">Add a Room</span>
                                        </a>

                                    </div>


                                </div>

                            </div>
                            <div class="card-body">
                                <table class="table align-middle table-nowrap table-hover dt-responsive contacts-table"
                                    id="datatable-buttons">
                                    <thead class="table-light">
                                        <tr>

                                            <th scope="col">
                                                <div class="the-mail-checkbox pr-4">
                                                    <label for="selectAll" class="d-none">Select All</label>
                                                    <input class="form-check-input mt-0 pt-0 form-check-dark"
                                                        type="checkbox" id="selectAll">

                                                </div>
                                            </th>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Building Name</th>
                                            <th scope="col" class="text-right">Date Created</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $count = 1; ?>
                                    <tbody id="rooms-table-body">
                                        @forelse ($rooms as $room)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="the-mail-checkbox pr-4">
                                                            <input class="form-check-input mt-0 pt-0 form-check-dark"
                                                                type="checkbox" id="formCheck1">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-capitalize"> {{ $count++ }}</td>
                                                <td class="text-capitalize">
                                                    <p class="mb-0"><a href="#"
                                                            title="View Details">{{ $room->name }}</a></p>
                                                </td>
                                                <td>
                                                    {{ $room->building_name }}
                                                </td>
                                                <td class="text-capitalize text-right">
                                                    {{ Carbon\Carbon::parse($room->created_at)->format('F j, Y, g:i a') }}
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="text-muted font-size-16" role="button"
                                                            data-bs-toggle="dropdown" aria-haspopup="true">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item"
                                                                href="{{ route('rooms.edit', ['room' => $room->id]) }}">
                                                                <i class="font-size-15 mdi mdi-account-edit me-3"></i>Edit
                                                            </a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('rooms.destroy', ['room' => $room->id]) }}"
                                                                data-bs-toggle="modal" data-bs-target=".credit-modal">
                                                                <i class="font-size-15 mdi mdi-cash-remove me-3 "></i>Delete
                                                                Room
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No rooms found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>

                <!-- end row -->
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <div class="modal fade issue-modal pb-5 credit-modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered mb-5">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-capitalize" id="myLargeModalLabel">Delete Therapist</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="col-12">
                            @isset($room)
                                <form action="{{ route('rooms.destroy', ['room' => $room->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <div class="col-12">
                                        <div class="alert alert-warning" role="alert">
                                            <i class="mdi mdi-alert-outline me-2"></i> Are you sure you want to delete this
                                            room?
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Delete</button>
                                    </div>
                                </form>
                            @else
                                <div class="alert alert-info" role="alert">
                                    Room data not available.
                                </div>
                            @endisset
                        </div>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>


        {{-- add room modal --}}
        <div class="modal fade issue-modal pb-5 room-modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered mb-5">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-capitalize" id="myLargeModalLabel">Add Room</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12">
                            <form action="{{ route('rooms.store') }}" class="needs-validation" method="POST"
                                enctype="application/x-www-form-urlencoded">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1">Name of Room</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="room_name" placeholder="Enter Room Name"
                                        required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1">Building Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="building_name"
                                        placeholder="Enter Building Name" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleInputPassword1">Select Therapist</label>
                                    <select class="form-control" name="therapist_id" required>
                                        @foreach ($therapists as $therapist)
                                            <option value="{{ $therapist->id }}">
                                                {{ $therapist->name }} - <small>{{ $therapist->phone }}</small>
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Add Room</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>


    </div>
@endsection
