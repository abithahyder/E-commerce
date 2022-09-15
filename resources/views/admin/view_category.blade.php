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
                   
                    <form class="forms-sample" method="post" action="{{url('/add_category')}}" enctype="multipart/form-data">
                      @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Category</label>
                        <input type="text" class="form-control"  name="categoryname" id="exampleInputName1" placeholder="Category">
                      </div>
                      <div class="form-group">
                      <div class="custom-file">
  <input type="file" class="custom-file-input" name ="catimg" id="customFileLang" >
  <label class="custom-file-label" for="customFileLang">Select image</label>
</div>
</div>
                   <!-- <div class="form-group">
                        <label>Category Image</label>
                        <input type="file" name="catimg" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div> -->
                                         
                      <button type="submit" class="btn btn-primary mr-2">Add Category</button>
                      <button type="reset" class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
          
            </div>
            <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Category List</h4>
                   
                    </p>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Category Image</th>
                            <th>Category Name</th>
                            <th>Action</th>
                          
                          </tr>
                        </thead>
                        <tbody>
                          @if($data)
                          @foreach($data as $data)
                          <tr>
                            <td><img src="category/{{$data->category_image}}" width="300" height="240" class="thumbnail"/></td>
                            <td>{{$data->category_name}}</td>
                          <td><a href=""><button type="button" class="btn btn-warning">Edit</button></a><br>
                         <a href="{{url('delete_category',$data->id)}}"> <button type="button" class="btn btn-danger">Delete</button></a> </td>
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