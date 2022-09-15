@extends('admin.home')
@section('admin-content')
@if($data)
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
            @if(session()->has('success'))
              <div  class="alert alert-sucess">
                {{session()->get('success')}}
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
              </div>
            @endif
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Add Category</h4>
                   
                    <form class="forms-sample" method="post" action="{{url('/add_product_category')}}" enctype="multipart/form-data">
                      @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Product Category</label>
                        <input type="text" class="form-control"  name="product_categoryname" id="exampleInputName1" placeholder="Product Category">
                      </div>
                      <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" name="categoryid">
                            <option>Select Category</option>
                           
                          @foreach($data['category'] as $cdata)
                         <option value="{{$cdata->id}}">{{$cdata->category_name}}</option>
                          @endforeach
                         

                        </select>
                      </div>
                      <div class="form-group">
                      <div class="custom-file">
  <input type="file" class="custom-file-input" name ="pcatimg" id="customFileLang" >
  <label class="custom-file-label" for="customFileLang">Select image</label>
</div>
</div>
         
                   <!-- <div class="form-group">
                        <label>Product Category Image</label>
                        <input type="file" name="catimg" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                                          -->
                      <button type="submit" class="btn btn-primary mr-2">Add Product Category</button>
                      <button type="reset" class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
          
            </div>
            <div class="row">
            <div class="col-lg-9 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Product Category List</h4>
                   
                    </p>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Product Category Image</th>
                            <th>Product Category Name</th>
                            <th>Category</th>
                            <th>Action</th>
                          
                          </tr>
                        </thead>
                        <tbody>
                        
                         @foreach($data['pcategory'] as $pdata)
                          <tr>
                            <td><img src="productcategory/{{$pdata->product_category_image}}" width="300" height="300"/></td>
                            <td>{{$pdata->Product_category_name}}</td>
                            <td>{{$pdata->cid}}</td>
                            <td><a href=""><button type="button" class="btn btn-warning">Edit</button></a>
                        <a href=""><button type="button" class="btn btn-danger">Delete</button></a>
                        </td>
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