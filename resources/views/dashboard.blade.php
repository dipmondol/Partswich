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
                            <i class="far fa-edit mb-5"></i><hr>
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
                                <h4>Welcome <span>{{Auth::user()->name}}</span> </h4>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                <div class="col-6 mb-3">
                                        <h6>Full Name</h6>
                                        <p class="text-muted">{{$user->name}}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Email</h6>
                                        <p class="text-muted">{{$user->email}}</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Phone</h6>
                                        <p class="text-muted">{{$user->phone}}</p>
                                    </div>
                                </div>
                                <h6>Projects</h6>
                                <hr class="mt-0 mb-4">
                                <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Recent</h6>
                                        <p class="text-muted">Lorem ipsum</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Most Viewed</h6>
                                        <p class="text-muted">Dolor sit amet</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-start">
                                    <a href="#!"><i class="fab fa-facebook-f fa-lg me-3"></i></a>
                                    <a href="#!"><i class="fab fa-twitter fa-lg me-3"></i></a>
                                    <a href="#!"><i class="fab fa-instagram fa-lg"></i></a>
                                </div>
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
