@extends('admin.adminMaster')
@section('admin')



<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="container-full">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">





            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sub>SubCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>SubCategory Name</th>
                                        <th>Sub>SubCategory Name</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sub_sub_category as $item)
                                    <tr>
                                        <td> {{$item['category']['category_name_en']}} </td>
                                        <td>{{$item['subcategory']['subcategory_name_en']}}</td>
                                        <td>{{$item->subsubcategory_name_en}}</td>

                                        <td width="30%">
                                            <a href="{{route('subsubcategory.edit',$item->id)}}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                            <a href="{{route('subsubcategory.delete',$item->id)}}" class="btn btn-danger" id="" title="Delete Data"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>

                                        <th>Category</th>
                                        <th>SubCategory Name</th>
                                        <th>Sub>SubCategory Name</th>
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
                        <h3 class="box-title">Add Sub>SubCategory</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="POST" action="{{route('subsubcategory.store')}}">
                                @csrf

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
                                <div class="form-group">
                                    <h5>SubCategory</h5>
                                    <div class="controls">
                                        <select name="subcategory_id" class="form-control">
                                            <option value="" selected="" disabled="">Select SubCategory</option>

                                        </select>
                                        @error('subcategory_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>

                                </div>


                                <div class="form-group">
                                    <h5>SubSubCategory Name English</h5>
                                    <div class="controls">
                                        <input type="text" id="subsubcategory_name_en" name="subsubcategory_name_en" class="form-control">
                                        @error('subsubcategory_name_en')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>SubSubCategory Name Hindi</h5>
                                    <div class="controls">
                                        <input type="text" id="subsubcategory_name_hin" name="subsubcategory_name_hin" class="form-control">
                                        @error('subsubcategory_name_hin')
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


<script type="text/javascript">

    $(document).ready(function(){
        $('select[name="category_id"]').on('change',function(){
                var category_id = $(this).val();
                if(category_id){
                    $.ajax({

                        url: "{{url('/category/subcategory/ajax')}}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                 $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' +value.subcategory_name_en+'</option>');
                            });
                        },
                    });
                }else{
                    alert('danger');
                }
        });
    });
</script>



@endsection
