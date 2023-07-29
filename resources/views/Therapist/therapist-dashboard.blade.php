@extends('Therapist.Layouts.main')
@section('content')
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="subscribeModal" tabindex="-1" aria-labelledby="subscribeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <h4>Incoming Appointment</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>You have <strong class="text-danger">32</strong> appointments that need your immediate
                                attention.</p>
                            <div class="mt-4">
                                <div class="card border shadow-none mb-2">
                                    <a href="action-landlord-payments.html" class="text-body">
                                        <div class="p-2">
                                            <div class="d-flex">
                                                <div class="avatar-xs align-self-center me-2">
                                                    <div
                                                        class="avatar-title rounded bg-transparent text-success font-size-20">
                                                        <i class="mdi mdi-account-cash"></i>
                                                    </div>
                                                </div>

                                                <div class="overflow-hidden me-auto">
                                                    <h5 class="font-size-13 text-truncate mb-1">Landlord Remunerations
                                                    </h5>
                                                    <p class="text-muted text-truncate mb-0">KES 236,659</p>
                                                </div>

                                                <div class="ms-2">
                                                    <p class="text-muted">22 Landlords</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="card border shadow-none mb-2">
                                    <a href="action-payments.html" class="text-body">
                                        <div class="p-2">
                                            <div class="d-flex">
                                                <div class="avatar-xs align-self-center me-2">
                                                    <div
                                                        class="avatar-title rounded bg-transparent text-danger font-size-20">
                                                        <i class="mdi mdi-cash-remove"></i>
                                                    </div>
                                                </div>

                                                <div class="overflow-hidden me-auto">
                                                    <h5 class="font-size-13 text-truncate mb-1">Flagged Payments</h5>
                                                    <p class="text-muted text-truncate mb-0">KES 23,500</p>
                                                </div>

                                                <div class="ms-2">
                                                    <p class="text-muted">22 Transactions</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="card border shadow-none mb-2">
                                    <a href="action-agreements.html" class="text-body">
                                        <div class="p-2">
                                            <div class="d-flex">
                                                <div class="avatar-xs align-self-center me-2">
                                                    <div
                                                        class="avatar-title rounded bg-transparent text-info font-size-20">
                                                        <i class="mdi mdi-file-document-edit"></i>
                                                    </div>
                                                </div>

                                                <div class="overflow-hidden me-auto">
                                                    <h5 class="font-size-13 text-truncate mb-1">Tenancy Agreements</h5>
                                                    <p class="text-muted text-truncate mb-0">22 Units</p>
                                                </div>


                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="card border shadow-none mb-2">
                                    <a href="action-notice.html" class="text-body">
                                        <div class="p-2">
                                            <div class="d-flex">
                                                <div class="avatar-xs align-self-center me-2">
                                                    <div
                                                        class="avatar-title rounded bg-transparent text-warning font-size-20">
                                                        <i class="mdi mdi-alert  "></i>
                                                    </div>
                                                </div>

                                                <div class="overflow-hidden me-auto">
                                                    <h5 class="font-size-13 text-truncate mb-1">Tenant Notices</h5>
                                                    <p class="text-muted text-truncate mb-0">21 Tenants</p>
                                                </div>

                                                <div class="ms-2">
                                                    <p class="text-muted">2 Premises</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
        </div>
        <!-- end main content-->
@endsection