@extends('admin.adminMaster')
@section('admin')

<div class="container-full">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Brand</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="POST" action="{{ route('brand.update',$brand->id)}}" enctype="multipart/form-data">
                                @csrf



                                <input type="hidden" name="id" value="{{$brand->id}}">
                                <input type="hidden" name="old_image" value="{{$brand->brand_image}}">

                                <div class="form-group">
                                    <h5>Brand Name English</h5>
                                    <div class="controls">
                                        <input type="text" id="brand_name_en" name="brand_name_en" class="form-control" value="{{$brand->brand_name_en}}">
                                        @error('brand_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Brand Name Hindi</h5>
                                    <div class="controls">
                                        <input type="text" id="brand_name_hin" name="brand_name_hin" class="form-control" value="{{$brand->brand_name_hin}}">
                                        @error('brand_name_hin')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Brand Image</h5>
                                    <input type="file" name="brand_image" class="form-control" value="{{$brand->brand_image}}">
                                    @error('brand_image')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror

                                </div>


                                <button type="submit" class="btn btn-rounded btn-primary">Update</button>






                            </form>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- /.box -->
            </div>



        </div>
    </section>
</div>

@endsection
