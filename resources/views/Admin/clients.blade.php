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
                                    <li class="breadcrumb-item active">All Clients</li>
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
                                        Register a Client
                                    </h4>

                                    <div class="d-flex">
                                        <a href="{{ route('clients.create') }}" type="button"
                                            class="btn btn-primary dropdown-toggle option-selector">
                                            <i class="mdi  mdi-folder-plus  font-size-16"></i> <span
                                                class="pl-1 d-md-inline">Add a Client</span>
                                        </a>

                                    </div>


                                </div>

                            </div>
                            <div class="card-body">
                                <table class="table align-middle table-nowrap table-hover dt-responsive contacts-table"
                                    id="datatable-buttons">
                                    <thead class="table-light">
                                        <tr>


                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Contact</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Next of Kin Name</th>
                                            <th scope="col">Next of Kin Phone</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Date Created</th>
                                            <th scope="col" class="text-right">Appointment Action</th>
                                            <th>View Actions</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $count = 1; ?>
                                    <tbody id="rooms-table-body">
                                        @forelse ($clients as $client)
                                            <tr>

                                                <td class="text-capitalize"> {{ $count++ }}</td>
                                                <td class="text-capitalize">
                                                    <p class="mb-0"><a href="#"
                                                            title="View Details">{{ $client->client_name }}</a></p>
                                                </td>
                                                <td>
                                                    <p class="text-muted mb-0">
                                                        <a href="tell:0785905494">{{ $client->phone_number }}</a>
                                                    </p>
                                                    <p class="mb-0">
                                                        <a href="mailto:Antique253@gmail.com">{{ $client->email }}</a>
                                                    </p>
                                                </td>
                                                <td class="text-capitalize">
                                                    <p class="mb-0"><a href="#"
                                                            title="View Details">{{ $client->gender }}</a></p>
                                                </td>
                                                <td class="text-capitalize">
                                                    <p class="mb-0"><a href="#"
                                                            title="View Details">{{ $client->next_of_kin_name }}</a></p>
                                                </td>
                                                <td class="text-capitalize">
                                                    <p class="mb-0"><a href="#"
                                                            title="View Details">{{ $client->next_of_kin_number }}</a></p>
                                                </td>
                                                <td class="text-capitalize">
                                                    <p class="mb-0"><a href="#"
                                                            title="View Details">{{ $client->address }}</a></p>
                                                </td>

                                                <td class="text-capitalize text-right">
                                                    {{ Carbon\Carbon::parse($client->created_at)->format('F j, Y') }}
                                                </td>
                                                <td class="text-capitalize">
                                                    <div class="d-flex flex-column">
                                                        <a href="{{ route('appointments.store', ['client' => $client->id]) }}"
                                                            class="btn btn-success mb-3 btn-sm appointment-button mt-3"
                                                            data-bs-toggle="modal" data-bs-target=".appointment-modal"
                                                            data-client-id="{{ $client->id }}">Book Appointment</a>



                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="text-muted font-size-16" role="button"
                                                            data-bs-toggle="dropdown" aria-haspopup="true">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item"
                                                                href="{{ route('clients.edit', ['client' => $client->id]) }}">
                                                                <i class="font-size-15 mdi mdi-account-edit me-3"></i>Edit
                                                            </a>
                                                            <a class="dropdown-item"
                                                                href="{{ route('clients.destroy', ['client' => $client->id]) }}"
                                                                data-bs-toggle="modal" data-bs-target=".credit-modal">
                                                                <i class="font-size-15 mdi mdi-cash-remove me-3 "></i>Delete
                                                                Room
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <hr class="shadow-sm" style="border-color: #e9ecef;">

                                        @empty

                                            <tr>
                                                <td colspan="6" class="text-center">No Client Data found.</td>
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
                        <h5 class="modal-title text-capitalize" id="myLargeModalLabel">Delete Client</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="col-12">

                            @if (isset($client))
                                <form action="{{ route('clients.destroy', ['client' => $client->id]) }}" method="POST">
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
                            @else
                                <div class="alert alert-info" role="alert">
                                    Client data not available.
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

                            <form action="{{ route('appointments.store') }}" method="POST">
                                @csrf

                                <div class="col-12">
                                    <div class="alert alert-success" role="alert">
                                        <i class="mdi mdi-alert-outline me-2"></i> Book an Appointment for the Client
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="therapist_id">Therapist<strong class="text-danger">*</strong></label>
                                        <select class="form-control" id="therapist_id" name="therapist_id" required>
                                            @foreach ($therapists as $therapist)
                                                <option value="{{ $therapist->id }}">{{ $therapist->name }}:
                                                    {{ $therapist->phone }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="appointment_time">Appointment Time<strong
                                                class="text-danger">*</strong></label>
                                        <input type="datetime-local" class="form-control" id="appointment_time"
                                            name="appointment_time" required min="{{ date('Y-m-d\TH:i') }}">
                                    </div>

                                </div>

                                <div class="col-12">
                                    <input class="d-none" name="client_id" id="hidden-client-id">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Book Appointment</button>
                                </div>
                            </form>


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const appointmentButton = document.querySelector('.appointment-button');
            const hiddenClientId = document.getElementById('hidden-client-id');

            const appointmentModal = new bootstrap.Modal(document.querySelector('.appointment-modal'));
            appointmentModal._element.addEventListener('show.bs.modal', function() {
                const clientId = appointmentButton.dataset.clientId;
                hiddenClientId.value = clientId;
            });
        });
    </script>
@endsection
