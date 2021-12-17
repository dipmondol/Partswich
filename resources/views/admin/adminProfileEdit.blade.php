@extends('admin.adminMaster')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">

    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Admin Profile Edit</h4>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="post" action="{{route('admin.profile.store')}}" enctype="multipart/form-data">
                            @csrf

                           <div class="row">

                                <div class="col-12">
                                    <div class="widget-user-image">
                                        <img class="rounded-circle" src="{{(!empty($editData->profile_photo_path))?url('upload/adminImages/' .$editData->profile_photo_path):url('upload/no_image.jpg')}}" alt="Admin Avatar" id="showImage" style="height: 100px; width:100px;">
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>User Name</h5>
                                                <div class="controls">
                                                    <input type="text" name="name" class="form-control" value="{{$editData->name}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Email</h5>
                                                <div class="controls">
                                                    <input type="email" name="email" class="form-control" value="{{$editData->email}}">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Profile Image </h5>
                                        <div class="controls">
                                            <input type="file" name="profile_photo_path" class="form-control" id="image">
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <button type="submit" class="btn btn-rounded btn-primary">Update</button>
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

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
