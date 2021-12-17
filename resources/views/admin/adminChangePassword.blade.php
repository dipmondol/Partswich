@extends('admin.adminMaster')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">

    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Admin Password Change</h4>

            </div>
            <!-- <div class="widget-user-image">
                        <img class="rounded-circle" src="{{(!empty($adminImage->profile_photo_path))?url('upload/adminImages/' .$adminImage->profile_photo_path):url('upload/no_image.jpg')}}" alt="Admin Avatar" id="showImage" style="height: 100px; width:100px;">
                    </div> -->
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">

                    <div class="col">
                        <form method="POST" action="{{route('update.change.password')}}" enctype="multipart/form-data">
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
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
</div>

@endsection
