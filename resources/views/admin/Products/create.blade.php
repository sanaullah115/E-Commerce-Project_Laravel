@extends('admin.layouts.app')


@section('content')
<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Product <small>Create</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"
                            method="POST" action="{{route('product.store')}} " enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="title" name="title" required="required"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">price<span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="last-name" name="price" required="required"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">discount <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="last-name" name="discount" required="required"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">description
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <textarea name="description" rows="10" cols="30" required="required"
                                        class="form-control col-md-7 col-xs-12">
                                        </textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name"> image<span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="file" id="last-name" name="image" required="required"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>







                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Category</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($category as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Sub_Category</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="sub_category_id" class=" form-control"
                                        multiple="multiple">
                                        <option value="">Select Sub_Category</option>
                                        @foreach ($Sub_Category as $sub_cat)
                                        <option value="{{$sub_cat->id}}"   class="sub_category_option" data-category_id="{{$sub_cat->category_id}}" style="display: none;">
                                            {{$sub_cat->name}}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-primary" type="button">Cancel</button>
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>
@endsection

@push('scripts')
<script>
    $('select[name=category_id]').change(function(){
      var category_id=$(this).val();
      $('.sub_category_option').hide();
      $('.sub_category_option[data-category_id=' + category_id + ']').show();
    });
</script>
@endpush



