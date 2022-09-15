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
                    <h4 class="card-title">Add Product</h4>
                   
                    <form class="forms-sample" method="post" action="{{url('/add_product')}}" enctype="multipart/form-data">
                      @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Product Name</label>
                        <input type="text" class="form-control"  name="productname" id="exampleInputName1" placeholder="Product Name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Product Category</label>
                        <select class="form-control" name="prodcut_category">
                            <option>Select Product Category</option>
                            @foreach($data as $data)
                            <option value="{{$data->id}}">{{$data->Product_category_name}}</option>
                            @endforeach
                            @endif
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control"  name="description" id="description"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="actual_prize">Actual Prize</label>
                        <input type="text"  class="form-control" name="actual_prize" id="actual_prize" placeholder="Actual Prize">
                      </div>
                      <div class="form-group">
                        <label for="seller_prize">Seller Prize</label>
                        <input type="text" class="form-control" name="seller_prize" id="seller_prize" placeholder="seller Prize">
                      </div>
                      <div class="form-group">
                        <label for="seller_prize">Discount </label>
                        <input type="text" name="discount" class="form-control" id="discount" placeholder="discount Prize">
                      </div>
                      <div class="form-group">
                        <label for="stock">Stock </label>
                        <input type="text" name="stock" id="stock" class="form-control" placeholder="stock">
                      </div>
                      <div class="form-group">
                      <div class="custom-file">
  <input type="file" class="custom-file-input" name ="productimg" id="customFileLang" >
  <label class="custom-file-label" for="customFileLang">Select image</label>
</div>
</div>
                            
                      <button type="submit" class="btn btn-primary mr-2">Add Product</button>
                      <button type="reset" class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
          
            </div>
            
          </div>
        
@endsection
@include('admin.footer')

