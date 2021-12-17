@extends('frontend.mainMaster')
@section('content')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

<section class="vh-100" style="background-color: #f4f5f7;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-6 mb-4 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem;">
                    <div class="row g-0">
                        <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;"><br>
                            <img src="{{(!empty($user->profile_photo_path))?url('upload/userImages/' .$user->profile_photo_path):url('upload/no_image.jpg')}}" alt="..." class="img-fluid my-5" style="width: 100%; height: 100%; border-radius:50%;" />
                            <h5>Marie Horwitz</h5>
                            <p>Web Designer</p>
                            <i class="far fa-edit mb-5"></i>
                            <hr>
                            <ul class="list-group list-group-flush">
                                <a href="{{route('dashboard')}}">Home</a><br>
                                <a href="{{route('user.profile.update')}}">Profile Update</a><br>
                                <a href="{{route('change.password')}}">Change Password</a><br>
                                <a href="{{route('user.logout')}}">Logout</a><br>
                                <hr>
                            </ul>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body p-4">
                                <h4>Change Password </h4>
                                <hr class="mt-0 mb-4">

                                <form method="POST" action="{{route('user.password.update')}}" >
                                    @csrf

                                    <div class="row">

                                        <div class="col-12">


                                            <div class="form-group">
                                                <h5>Current Password</h5>
                                                <div class="controls">
                                                    <input type="password" id="current_password" name="currentPassword" class="form-control">
                                                    @error('currentPassword')
                                                    <span class="text-danger">
                                                        {{$message}}
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>New Password</h5>
                                                <div class="controls">
                                                    <input type="password" id="password" name="password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Confirm New Password</h5>
                                                <div class="controls">
                                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                                </div>
                                            </div>

                                            <div class="text-xs-right">
                                                <button type="submit" class="btn btn-rounded btn-primary">Change Password</button>
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
</section>

<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}



@endsection
