
@extends('admin.home')
@section('admin-content')

<div class="main-panel">
          <div class="content-wrapper">
          
            <div class="page-header">
              <h3 class="page-title"> Form elements </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
              </nav>
            </div>
            
<div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Category List</h4>
                   
                    </p>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Product Name</th>
                            <th>Category Name</th>
                            <th>Quantity</th>
                            <th>Actual Prize</th>
                            <th>Seller Prize</th>
                            <th>Disount</th>
                           <th>Image</th>
                            <th>Action</th>
                          
                          </tr>
                        </thead>
                        <tbody>
                         
                          @if($data)
                          @foreach($data as $data)
                          <tr>
                          
                            <td>{{$data->title}}</td>
                            <td>{{$data->product_category}}</td>
                            <td>{{$data->quantity}}</td>
                            <td>{{$data->actual_prize}}</td>
                            <td>{{$data->seller_prize}}</td>
                            <td>{{$data->discount}}</td>
                            <td><img src="product/{{$data->product_image}}" width="300" height="300"/></td>
                          <td><a href=""><button type="button" class="btn btn-warning">Edit</button></a><br>
                         <a href="{{url('delete_product',$data->id)}}"> <button type="button" class="btn btn-danger">Delete</button></a> </td>
                          </tr>
                         @endforeach
                          @endif
                        
                        
                        
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
            
          </div>
        
@endsection
@include('admin.footer')










