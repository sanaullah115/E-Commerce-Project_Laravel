@extends('admin.layouts.app')


@section('content')
      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Products</h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                  </span>
                </div>
              </div>
            </div>
          </div>

          <div class="clearfix"></div>

          <div class="row">



            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Product<small>List</small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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

                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Products image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($productall as $item)
                      <tr>
                        <th scope="row">
                          <div class="d-flex align-items-center">
                              <img src="{{asset('/Upload/Product/'.$item->image)}}"
                                  class="img-fluid rounded-circle" style="width: 80px; height: 80px;" alt="">

                          </div>
                      </th>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->price }}</td>
                        <td>
                          <a href="#" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                          <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                </div>
              </div>
            </div>

      

           
          </div>
        </div>
      </div>
      <!-- /page content -->
@endsection