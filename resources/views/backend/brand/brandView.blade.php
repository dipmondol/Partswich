@extends('admin.adminMaster')
@section('admin')



<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

<div class="container-full">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">





            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Brand List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Brand Name En</th>
                                        <th>Brand Name Hin</th>
                                        <th>Image</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($brands as $brand)
                                    <tr>
                                        <td>{{$brand->brand_name_en}}</td>
                                        <td>{{$brand->brand_name_hin}}</td>
                                        <td><img src="{{asset($brand ->brand_image)}}" alt="" style="width: 70px; height:40px;"></td>
                                        <td>
                                            <a href="{{ route('brand.edit',$brand->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('brand.delete',$brand->id)}}" class="btn btn-danger" id="" title="Delete Data"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Brand Name En</th>
                                        <th>Brand Name Hin</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- /.box -->
            </div>
            <!-- /.col -->

            <!-- Add Brand -->

            <div class="col-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Brand</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="POST" action="{{route('brand.store')}}" enctype="multipart/form-data">
                                @csrf




                                <div class="form-group">
                                    <h5>Brand Name English</h5>
                                    <div class="controls">
                                        <input type="text" id="brand_name_en" name="brand_name_en" class="form-control">
                                        @error('brand_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Brand Name Hindi</h5>
                                    <div class="controls">
                                        <input type="text" id="brand_name_hin" name="brand_name_hin" class="form-control">
                                        @error('brand_name_hin')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Brand Image</h5>
                                    <input type="file" name="brand_image" class="form-control">
                                    @error('brand_image')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror

                                </div>


                                    <button type="submit" class="btn btn-rounded btn-primary">Submit</button>






                            </form>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- /.box -->
            </div>
            <!-- End Add Brand -->


        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>

<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}


@endsection
