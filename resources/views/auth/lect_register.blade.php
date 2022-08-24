
@extends('layouts.dashlay')

@section('header_nav')
    @include('inc.header_nav')  
@endsection



@section('content')

    <div class="page-heading">
        <h3>Activate Account</h3>
    </div>


    <div class="row">
        <div class="col-12 col-xl-10">
            @include('inc.messages')
            <div class="card">
                {{-- <div class="card-header">
                    <h4>Add Room Type</h4>
                </div> --}}
                <div class="card-body">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Create Password to Activate Accounc</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    
                                    <form action="{{action('DashController@store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf 

                                        <div class="form-body">
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <label>Username</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="text" name="name" value="{{$staff->fname.$staff->id}}" class="form-control" placeholder="Name" id="first-name-icon" autofocus required>
                                                            <div class="form-control-icon"><i class="bi bi-person"></i></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Email</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="email" class="form-control" value="{{$staff->email}}" name="email" placeholder="Email" id="first-name-icon" required>
                                                            <div class="form-control-icon"><i class="bi bi-envelope"></i></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Mobile</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="number" class="form-control" value="{{$staff->contact}}" name="contact" placeholder="Mobile" required>
                                                            <div class="form-control-icon"><i class="bi bi-phone"></i></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Password</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                                                            <div class="form-control-icon"><i class="bi bi-lock"></i></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Confirm Password</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                                            <div class="form-control-icon"><i class="bi bi-lock"></i></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- <div class="col-md-4">
                                                    <label>Choose Passport Photo</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group mb-3">
                                                            <label class="input-group-text" for="inputGroupFile01"><i class="bi bi-upload"></i></label>
                                                            <input name="pass_photo" type="file" class="form-control" id="inputGroupFile01" required>
                                                        </div>
                                                    </div>
                                                </div> --}}

                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" name="store_action" value="lect_register" class="btn btn-primary me-1 mb-1">Submit</button>
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection

 