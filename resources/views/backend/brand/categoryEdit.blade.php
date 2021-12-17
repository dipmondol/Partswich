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
                        <h3 class="box-title">Edit Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="POST" action="{{ route('category.update',$category->id)}}" enctype="multipart/form-data">
                                @csrf



                                <input type="hidden" name="id" value="{{$category->id}}">
                                <input type="hidden" name="category_icon" value="{{$category->category_icon}}">

                                <div class="form-group">
                                    <h5>Category Name English</h5>
                                    <div class="controls">
                                        <input type="text" id="category_name_en" name="category_name_en" class="form-control" value="{{$category->category_name_en}}">
                                        @error('category_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Category Name Hindi</h5>
                                    <div class="controls">
                                        <input type="text" id="category_name_hin" name="category_name_hin" class="form-control" value="{{$category->category_name_hin}}">
                                        @error('category_name_hin')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Category Icon</h5>
                                    <input type="text" name="brand_image" class="form-control" value="{{$category->category_icon}}">
                                    @error('category_icon')
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
