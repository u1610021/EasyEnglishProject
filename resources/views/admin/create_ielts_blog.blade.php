@extends('welcome')

@section('content')


<div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Create Blog</h3>
            </div>            
          </div>
            <div class="panel-body">
              <div class="row registr">
                  <form role="form" enctype="multipart/form-data" method="post"" action="{{action('IeltsController@store')}}">
                  	{{ csrf_field() }}
                  <div class="form-group">
                    <label class="first">Category Name</label>
                    <select class="form-control" name="category_name" id="sel1">
                    	@foreach($categories as $category)
					    <option>{{$category->name}}</option>
					    @endforeach
					 </select>                  
                  </div>
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Title">
                  </div>
                  <div class="form-group">
                    <label>Body</label>
                    <textarea rows="6" cols="60" class="form-control" name="body" placeholder="Write Body"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Image Upload</label><br>
                    <label class="custom-file">
                    <input type="file" name="blog_image" id="file" class="custom-file-input">
                    <span class="custom-file-control"></span>
                  </label>                 
                  </div>
                  <input type="submit" name="create" class="btn btn-primary submitbtn" value="Create Post">                         
                </form>
                  </div>                  
              </div>
            </div>


@endsection