@extends('Authentication.AuthLayouts.main')
@section('content')
    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">

                <div class="col-xl-7 col-md-7">
                    <div class="auth-full-bg pt-lg-5 p-4">
                        <div class="w-100">
                            <div class="bg-overlay"></div>
                            <div class="d-flex h-100 flex-column">

                                <div class="p-4 mt-auto">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-7">
                                            <div class="text-center" style="margin-bottom: 150px;">

                                                <h2 class="mb-1"><strong class="text-warning"
                                                        style="font-size: 40px;">Physiotherapy Clinic</strong>
                                                </h2>.


                                                <div dir="ltr">
                                                    <div class="owl-carousel owl-theme auth-review-carousel"
                                                        id="auth-review-carousel">


                                                        <div class="item">
                                                            <div class="py-3">
                                                                <p class="font-size-12 mb-4 d-none"></p>

                                                                <div
                                                                    class="d-flex justify-content-center align-items-center flex-column">
                                                                    <h4 class="font-size-12 text-white"></h4>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-5 col-md-5 ">
                    <div class="auth-full-page-content p-md-5 p-4 ">
                        <div class="w-100 ">

                            <div class="d-flex flex-column h-100 ">

                                <div class="my-auto ">

                                    <div>
                                        <h5 class="text-primary ">Sign In !</h5>
                                    </div>

                                    <div class="mt-4 ">
                                        <form action="{{ route('login.user') }}" class="needs-validation" method="POST"
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
                                                <div class="col-md-12 mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="email" name="username" class="form-control" id="username"
                                                        placeholder="Enter Your Username" required>
                                                </div>

                                            <div class="col-md-12 mb-3">
                                                <div class="float-end">

                                                </div>
                                                <label class="form-label">Password</label>
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" name="password" class="form-control"
                                                        placeholder="Enter password" aria-label="Password"
                                                        aria-describedby="password-addon" required>
                                                    <button class="btn btn-light" type="button" id="password-addon"><i
                                                            class="mdi mdi-eye-outline"></i></button>
                                                </div>
                                            </div>



                                            <div class="mt-3 d-grid ">

                                                <input class="btn btn-primary waves-effect waves-light" type="submit"
                                                    value="Log In">
                                            </div>
                                            <div class="mt-3 d-grid " style="text-align: center;">
                                                <span style="font-size: 12px;">Don't have an account? <a
                                                        href="{{route('register.page')}}"
                                                        style="color: #556ee6; text-decoration: none;">Register Account</a></span>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="mt-4 mt-md-5 text-center ">
                                    <p class="mb-0 ">©
                                        <script>
                                            document.write(new Date().getFullYear())
                                        </script>
                                    </p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </div>

        </html>
    @endsection
