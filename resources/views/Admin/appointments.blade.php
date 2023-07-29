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
                                    <li class="breadcrumb-item active">All Appointments</li>
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
                                        View All Appointments
                                    </h4>

                                    <div class="d-flex">
                                        <a href="{{ route('clients.index') }}" type="button"
                                            class="btn btn-primary dropdown-toggle option-selector">
                                            <i class="mdi  mdi-folder-plus  font-size-16"></i> <span
                                                class="pl-1 d-md-inline">Book an Appointment for a Client</span>
                                        </a>

                                    </div>


                                </div>

                            </div>
                            <div class="card-body">
                                <div style="overflow-x: auto;">
                                    <table class="table align-middle table-nowrap table-hover dt-responsive contacts-table"
                                        id="datatable-buttons">
                                        <thead class="table-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Client </th>
                                            <th scope="col">Contact</th>
                                            <th scope="col">Therapist</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">Booked By</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <?php $count = 1; ?>
                                    <tbody id="rooms-table-body">
                                        @forelse ($appointments as $appointment)
                                            <tr>
                                                <td class="text-capitalize">{{ $count++ }}</td>
                                                <td class="text-capitalize">
                                                    <p class="mb-0"><a href="#"
                                                            title="View Details">{{ $appointment->client->client_name }}</a>
                                                    </p>
                                                </td>
                                                <td>

                                                    <p class="mb-0">
                                                        <a
                                                            href="mailto:{{ $appointment->client->email }}">{{ $appointment->client->email }}</a>
                                                    </p>
                                                    <p class="text-muted mb-0">
                                                        <a
                                                            href="tell:{{ $appointment->client->phone_number }}">{{ $appointment->client->phone_number }}</a>
                                                    </p>
                                                </td>
                                                <td class="text-capitalize">
                                                    @if ($appointment->therapist)
                                                        <p class="mb-0"><a href="#"
                                                                title="View Details">{{ $appointment->therapist->name }}</a>
                                                        </p>
                                                        <p class="text-muted mb-0">
                                                            <a
                                                                href="tell:{{ $appointment->therapist->phone }}">{{ $appointment->therapist->phone }}</a>
                                                        </p>
                                                       
                                                    @else
                                                        <p>No Therapist Assigned</p>
                                                    @endif
                                                </td>
                                               
                                                <td class="text-capitalize">
                                                    <p class="mb-0">
                                                        {{ Carbon\Carbon::parse($appointment->start_time)->format('F j, Y') }}
                                                        at
                                                        {{ Carbon\Carbon::parse($appointment->start_time)->format('g:i a') }}
                                                    </p>


                                                </td>
                                                <td class="text-capitalize text-right">
                                                    @if ($appointment->therapist && $appointment->therapist->createdBy)
                                                        <p class="mb-0">{{ $appointment->therapist->createdBy->name }}
                                                        </p>
                                                    @else
                                                        <p>Unknown</p>
                                                    @endif
                                                </td>
 <td>
                                                    @if ($appointment->ongoing == 1)
                                                        <span class="btn btn-pill btn-sm btn-info">Ongoing</span>
                                                    @else
                                                        <span class="btn btn-pill btn-sm btn-success">Completed</span>
                                                    @endif
                                                </td>
                                               
                                                <td>
                                                    <a href="{{ route('appointments.destroy', ['appointment' => $appointment->id]) }}"
                                                        data-bs-toggle="modal" data-bs-target=".credit-modal"
                                                        class="btn btn-danger btn-sm">Cancel Appointment
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No Appointments Yet.</td>
                                            </tr>
                                        @endforelse
                                        <hr class="shadow-sm" style="border-color: #e9ecef;">
                                    </tbody>
                                    </table>
                                </div>
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
                        <h5 class="modal-title text-capitalize" id="myLargeModalLabel">Cancel Appointment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="col-12">
                            @if (isset($appointment))
                                <form action="{{ route('appointments.destroy', ['appointment' => $appointment->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <div class="col-12">
                                        <div class="alert alert-warning" role="alert">
                                            <i class="mdi mdi-alert-outline me-2"></i> Are you sure you want to cancel this
                                            Appointment
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="basicpill-firstname-input">Reason for cancelling<strong
                                                    class="text-danger">*</strong></label>
                                            <textarea class="form-control" id="basicpill-firstname-input" rows="5" name="skills" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Delete</button>
                                    </div>
                                </form>
                            @else
                                <div class="alert alert-info" role="alert">
                                    Appointment data not available.
                                </div>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- create appointment modal --}}
        <div class="modal fade issue-modal pb-5 appointment-modal" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered mb-5">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-capitalize" id="myLargeModalLabel">Make An Pointment for </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="col-12">

                            <form action="#" method="POST">
                                @csrf
                                @method('DELETE')

                                <div class="col-12">
                                    <div class="alert alert-warning" role="alert">
                                        <i class="mdi mdi-alert-outline me-2"></i> Are you sure you want to delete this
                                        Client?
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicpill-firstname-input">Reason<strong
                                                class="text-danger">*</strong></label>
                                        <textarea class="form-control" id="basicpill-firstname-input" rows="5" name="skills" required></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </div>
                            </form>
                            <div class="alert alert-info" role="alert">
                                Client data not available.
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
