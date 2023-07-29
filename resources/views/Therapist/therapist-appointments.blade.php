@extends('Therapist.Layouts.main')
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
                                    <li class="breadcrumb-item">
                                        <a href="index.html">Dashboards</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Appointments</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div
                                class="card-header bg-white pt-0 pr-0 p-0 d-flex justify-content-between align-items-center w-100 border-bottom">
                                <div class="btn-toolbar p-3 d-flex justify-content-between align-items-center w-100"
                                    role="toolbar">
                                    <div class="d-flex align-items-center flex-grow-1">
                                        <h4 class="mb-0 bg-transparent p-0 m-0">
                                            Appointments
                                        </h4>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-title-desc">
                                    These are the appointments that you currently have. You can Update the status of the
                                    appointment once you are completed seeing the client
                                </p>

                                <div class="table-responsive table-responsive-md">
                                    <table class="table align-middle table-edits">
                                        <thead>
                                            <tr class="text-uppercase table-dark">
                                                <th class="vertical-align-middle">#</th>
                                                <th class="vertical-align-middle">Client name</th>
                                                <th class="vertical-align-middle">Time of Appointment</th>
                                                <th class="vertical-align-middle">Assigned By</th>
                                                <th class="text-nowrap vertical-align-middle">
                                                    Status of Apointment
                                                </th>


                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $count = 1;
                                            ?>
                                            @forelse ($appointments as $appointment)
                                                <tr data-id="1">
                                                    <td style="width: 80px">{{ $count++ }}</td>
                                                    <td>{{ $appointment->client->client_name }}</td>
                                                    <td>
                                                        {{ Carbon\Carbon::parse($appointment->start_time)->format('F j, Y, g:i a') }}
                                                    </td>
                                                    <td>{{ $appointment->createdBy->name }}</td>
                                                    <td>
                                                        @if ($appointment->ongoing == 1)
                                                            <span class="btn btn-pill btn-sm btn-info">Ongoing</span>
                                                        @else
                                                            <span class="btn btn-pill btn-sm btn-success">Completed</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-right cell-change">
                                                        <a href="{{ route('update.status', ['appointment' => $appointment->id]) }}"
                                                            class="btn btn-success btn-sm text-uppercase px-3 save-tbl-btn ml-3"
                                                            data-bs-toggle="modal" data-bs-target="#new-invoice-item-modal"
                                                            title="Update Appointment"
                                                            onclick="updateAppointmentId('{{ $appointment->id }}')">
                                                            Update Appointment
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <p>You do not have any Appointments Yet</p>
                                            @endforelse


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
        </div>
        <div class="modal fade" id="new-invoice-item-modal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-dialog modal-md modal-dialog-centered mb-5">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-capitalize" id="myLargeModalLabel">Update the status of the
                                Appointment</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-12">
                                <address>
                                    <strong>Are You Sure you want to Update the Status?</strong><br>
                                </address>
                            </div>
                            <div class="col-12">

                                @if (isset($appointment))
                                    <form action="{{ route('update.status') }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <div class="mb-4">
                                            <label for="agreement-type">Comments</label>
                                            <textarea name="reason" placeholder="Enter Session Comments" cols="30" rows="3" class="form-control"
                                                required></textarea>
                                        </div>
                                        <div class="col-12">
                                            @if ($appointment->ongoing)
                                                <div class="alert alert-success" role="alert">
                                                    <i class="mdi mdi-alert-outline me-2"></i>Thank you for giving the best
                                                    support to the Client
                                                </div>
                                            @else
                                                <div class="alert alert-warning" role="alert">
                                                    <i class="mdi mdi-alert-outline me-2"></i>Are you sure you want to Mark
                                                    the Appointment as Ongoing?
                                                </div>
                                            @endif
                                        </div>
                                        <div class="mb-4">
                                            <input type="text" name="appointment_id" id="appointment_id"
                                                class="form-control d-none" value="{{ $appointment->id }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </form>
                                @else
                                    <p>No appointments available.</p>
                                @endif


                            </div>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- modals end -->


        </div>
    @endsection
    @section('scripts')
        <script>
            function updateAppointmentId(appointmentId) {
                // Get the input field element
                var appointmentInput = document.getElementById('appointment_id');

                // Update the value of the input field with the appointment ID
                appointmentInput.value = appointmentId;
            }
        </script>
    @endsection
