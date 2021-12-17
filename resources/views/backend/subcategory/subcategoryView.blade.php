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
                        <h3 class="box-title">SubCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category Id</th>
                                        <th>SubCategory En</th>
                                        <th>SubCategory Hin</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subCategory as $item)
                                    <tr>
                                        <td> {{$item['category']['category_name_en']}} </td>
                                        <td>{{$item->subcategory_name_en}}</td>
                                        <td>{{$item->subcategory_name_hin}}</td>

                                        <td width="30%">
                                            <a href="{{route('subcategory.edit',$item->id)}}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                            <a href="{{route('subcategory.delete',$item->id)}}" class="btn btn-danger" id="" title="Delete Data"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>

                                        <th>Category Id</th>
                                        <th>SubCategory En</th>
                                        <th>SubCategory Hin</th>
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
                        <h3 class="box-title">Add SubCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="POST" action="{{route('subcategory.store')}}" >
                                @csrf




                                <div class="form-group">
                                    <h5>SubCategory Name English</h5>
                                    <div class="controls">
                                        <input type="text" id="subcategory_name_en" name="subcategory_name_en" class="form-control">
                                        @error('subcategory_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>SubCategory Name Hindi</h5>
                                    <div class="controls">
                                        <input type="text" id="subcategory_name_hin" name="subcategory_name_hin" class="form-control">
                                        @error('subcategory_name_hin')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Category</h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{ $category->category_name_en}}</option>
                                            @endforeach

                                        </select>
                                        @error('category_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>

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
