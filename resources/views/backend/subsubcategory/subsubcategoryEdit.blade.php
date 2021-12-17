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
                        <h3 class="box-title">Add Sub>SubCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="POST" action="{{route('subsubcategory.update')}}">
                                @csrf
                                    <input type="hidden" name="id" value="{{$subsubcategories->id}}">
                                <div class="form-group">
                                    <h5>Category</h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-control">
                                            <option value="" selected="" disabled="">Select Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{$category->id == $subsubcategories->category_id ? 'selected':''}}>{{ $category->category_name_en}}</option>
                                            @endforeach

                                        </select>
                                        @error('category_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>

                                </div>
                                <div class="form-group">
                                    <h5>SubCategory</h5>
                                    <div class="controls">
                                        <select name="subcategory_id" class="form-control">
                                            <option value="" selected="" disabled="">Select SubCategory</option>

                                            @foreach($subcategories as $subcategory)
                                            <option value="{{$subcategory->id}}" {{$subcategory->id == $subsubcategories->subcategory_id ? 'selected':''}}>{{ $subcategory->subcategory_name_en}}</option>
                                            @endforeach

                                        </select>
                                        @error('subcategory_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>

                                </div>


                                <div class="form-group">
                                    <h5>SubSubCategory Name English</h5>
                                    <div class="controls">
                                        <input type="text" id="subsubcategory_name_en" name="subsubcategory_name_en" class="form-control" value="{{$subsubcategories->subsubcategory_name_en}}">
                                        @error('subsubcategory_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>SubSubCategory Name Hindi</h5>
                                    <div class="controls">
                                        <input type="text" id="subsubcategory_name_hin" name="subsubcategory_name_hin" class="form-control" value="{{$subsubcategories->subsubcategory_name_hin}}">
                                        @error('subsubcategory_name_hin')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>
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
