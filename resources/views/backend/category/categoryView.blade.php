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
                        <h3 class="box-title">Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category Icon</th>
                                        <th>Category En</th>
                                        <th>Category Hin</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($category as $item)
                                    <tr>
                                        <td> <span><i class="{{$item->category_icon}}"></i></span> </td>
                                        <td>{{$item->category_name_en}}</td>
                                        <td>{{$item->category_name_hin}}</td>

                                        <td>
                                            <a href="{{route('category.edit',$item->id)}}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                            <a href="{{route('category.delete',$item->id)}}" class="btn btn-danger" id="" title="Delete Data"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <th>Category Icon</th>
                                        <th>Category En</th>
                                        <th>Category Hin</th>
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
                        <h3 class="box-title">Add Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
                                @csrf




                                <div class="form-group">
                                    <h5>Category Name English</h5>
                                    <div class="controls">
                                        <input type="text" id="category_name_en" name="category_name_en" class="form-control">
                                        @error('category_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Category Name Hindi</h5>
                                    <div class="controls">
                                        <input type="text" id="category_name_hin" name="category_name_hin" class="form-control">
                                        @error('category_name_hin')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Category Icon</h5>
                                    <input type="text" name="category_icon" class="form-control">
                                    @error('category_icon')
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
