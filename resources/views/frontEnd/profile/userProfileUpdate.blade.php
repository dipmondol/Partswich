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
                                <h4>Welcome Fucker <span>{{Auth::user()->name}}</span> </h4>
                                <hr class="mt-0 mb-4">

                                <form action="{{route('user.profile.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputEmail1">Name <span></span></label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputEmail1">Email Address <span></span></label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputEmail1">Phone Number <span></span></label>
                                        <input type="number" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="info-title" for="exampleInputEmail1">Profile Image <span></span></label>
                                        <input type="file" class="form-control" id="profile_photo_path" name="profile_photo_path">
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger">Update</button>
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
