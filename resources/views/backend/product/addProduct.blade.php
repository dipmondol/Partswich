@extends('admin.adminMaster')
@section('admin')

<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">




<div class="container-full">



    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Add Product</h4>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form novalidate>
                            <div class="row">
                                <div class="col-12">
                                    <!-- start 1st row -->
                                    <div class="row">
                                        <!-- start col md 4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Brand Select</h5>
                                                <div class="controls">
                                                    <select name="brand_id" class="form-control">
                                                        <option value="" selected="" disabled="">Select Category</option>
                                                        @foreach($brands as $brand)
                                                        <option value="{{$brand->id}}">{{ $brand->brand_name_en}}</option>
                                                        @endforeach

                                                    </select>
                                                    @error('brand_id')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror

                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-4">
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
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>SubCategory Select</h5>
                                                <div class="controls">
                                                    <select name="subcategory_id" class="form-control">
                                                        <option value="" selected="" disabled="">Select Sub Category</option>


                                                    </select>
                                                    @error('subcategory_id')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror

                                                </div>

                                            </div>
                                        </div>
                                        <!-- end col md 4 row -->

                                    </div>
                                    <!-- end 1st row -->

                                    <!-- 2nd row -->
                                    <div class="row">
                                        <!-- start col md 4 -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>SubSubCategory Select</h5>
                                                <div class="controls">
                                                    <select name="subsubcategory_id" class="form-control">
                                                        <option value="" selected="" disabled="">Select Category</option>
                                                        @foreach($brands as $brand)
                                                        <option value="{{$brand->id}}">{{ $brand->brand_name_en}}</option>
                                                        @endforeach

                                                    </select>
                                                    @error('subsubcategory_id')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror

                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Name English<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_name_en" class="form-control">
                                                    @error('product_name_en')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Name Hindi <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_name_hin" class="form-control">
                                                    @error('product_name_hin')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- End 2nd row -->


                                    <!-- Start 3rd row -->
                                    <div class="row">
                                        <!-- start col md 4 -->
                                        <div class="col-md-4">
                                        <div class="form-group">
                                                <h5>Product Code</h5>
                                                <div class="controls">
                                                    <input type="text" name="product_code" class="form-control">
                                                    @error('product_code')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Quantity<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_qty" class="form-control">
                                                    @error('product_qty')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Product Tags English</h5>
                                                <div class="controls">
                                                    <input type="text" name="product_tags_en " class="form-control" value="Lorem,Ipsum,Amet" data-role="tagsinput" placeholder="add tags">
                                                    @error('product_tags_en')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- End 3rd row -->


                                    <div class="form-group">
                                        <h5>Email Field <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>File Input Field <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="file" class="form-control" required>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <h5>Basic Select <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="select" id="select" required class="form-control">
                                                <option value="">Select Your City</option>
                                                <option value="1">India</option>
                                                <option value="2">USA</option>
                                                <option value="3">UK</option>
                                                <option value="4">Canada</option>
                                                <option value="5">Dubai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Textarea <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="textarea" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Checkbox <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="checkbox" id="checkbox_1" required value="single">
                                            <label for="checkbox_1">Check this custom checkbox</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Minimum 2 Checkbox selection<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_7" value="1" data-validation-minchecked-minchecked="2" data-validation-minchecked-message="Choose at least two" name="styled_min_checkbox" required>
                                                <label for="checkbox_7">I am unchecked Checkbox</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_8" value="2">
                                                <label for="checkbox_8">I am unchecked too</label>
                                            </fieldset>
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_9" value="3">
                                                <label for="checkbox_9">You can check me</label>
                                            </fieldset>
                                        </div> <small>Select any 2 options</small>
                                    </div>
                                </div>
                            </div>



                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-rounded btn-primary">Submit</button>
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
    <!-- /.content -->
</div>


<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}


@endsection
