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
                                    <li class="breadcrumb-item active">All Therapists</li>
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
                                        Therapist Register
                                    </h4>

                                    <div class="d-flex">
                                        <a href="{{ route('therapists.add') }}" type="button"
                                            class="btn btn-primary dropdown-toggle option-selector">
                                            <i class="mdi  mdi-folder-plus  font-size-16"></i> <span
                                                class="pl-1 d-md-inline">Add a Therapist</span>
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
                                            <th scope="col">Therapist</th>
                                            <th scope="col">Contacts</th>
                                            <th scope="col">Town</th>
                                            <th scope="col">Created By</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Status</th>
                                            <th scope="col" class="text-right">Date Created</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $count = 1; ?>
                                    <tbody>
                                        @if (count($therapists) > 0)
                                            @foreach ($therapists as $therapist)
                                                <tr>

                                                    <td>
                                                        <div class="d-flex  align-items-center">
                                                            <div class="the-mail-checkbox pr-4">
                                                                <input class="form-check-input mt-0 pt-0 form-check-dark"
                                                                    type="checkbox" id="formCheck1">
                                                            </div>

                                                        </div>
                                                    </td>
                                                    <td class="text-capitalize">{{ $count++ }}</td>
                                                    <td class="text-capitalize">
                                                        <p class="mb-0"><a href="#"
                                                                title="View Details">{{ $therapist->name }}</a></p>

                                                    </td>
                                                    <td>
                                                        <p class="text-muted mb-0">
                                                            <a href="tell:0785905494">{{ $therapist->phone }}</a>
                                                        </p>
                                                        <p class="mb-0">
                                                            <a
                                                                href="mailto:Antique253@gmail.com">{{ $therapist->email }}</a>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        {{ $therapist->town }}
                                                    </td>
                                                    <td class="text-capitalize">
                                                        {{ $therapist->createdByUser->name }}
                                                    </td>

                                                    <td class="text-capitalize">
                                                        {{ $therapist->gender }}
                                                    </td>
                                                    <td>
                                                        @if ($therapist->availability==1)
                                                            <span class="badge bg-success">Available</span>
                                                        @else
                                                            <span class="badge bg-danger">Unavailable</span>
                                                            
                                                        @endif
                                                    </td>

                                                    <td class="text-black text-uppercase text-right">
                                                        {{ Carbon\Carbon::parse($therapist->created_at)->format('F j, Y, g:i a') }}
                                                    </td>

                                                    <td>
                                                        <div class="dropdown">
                                                            <a class="text-muted font-size-16" role="button"
                                                                data-bs-toggle="dropdown" aria-haspopup="true">
                                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                            </a>

                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('therapists.edit', ['therapist' => $therapist->id]) }}"><i
                                                                        class="font-size-15 mdi mdi-account-edit me-3"></i>Edit</a>



                                                                <a class="dropdown-item"
                                                                    href="{{ route('therapists.destroy', ['therapist' => $therapist->id]) }}"
                                                                    data-bs-toggle="modal" data-bs-target=".credit-modal"><i
                                                                        class="font-size-15  mdi mdi-cash-remove me-3 "></i>Delete
                                                                    Therapist</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <p>No data available.</p>
                                        @endif
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
                            <address>
                                <strong>Are You Sure you want to Delete Therapist?</strong><br>
                            </address>
                        </div>
                        <div class="col-12">
                            @if (count($therapists) > 0)
                                <form action="{{ route('therapists.destroy', ['therapist' => $therapist->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="mb-4">
                                        <label for="agreement-type">Reason for deleting the Therapist</label>
                                        <textarea name="reason" placeholder="Enter reason" cols="30" rows="3" class="form-control"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <div class="alert alert-warning" role="alert">
                                            <i class="mdi mdi-alert-outline me-2"></i> A message will be sent to the
                                            Therapist on the following Action
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Delete</button>
                                    </div>
                                </form>
                            @else
                                <p>No therapists available to delete.</p>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>


    </div>
@endsection
