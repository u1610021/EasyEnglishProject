@extends('welcome')

@section('content')


<div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Edit Blog</h3>
            </div>            
          </div>
            <div class="panel-body">
              <div class="row registr">
                  <form role="form" enctype="multipart/form-data" method="POST" action="{{route('blog.update', [$blog->id])}}">
                  	{{ csrf_field() }}
                    {{ method_field('PATCH') }}

                  <div class="form-group">
                    <label class="first">Category Name</label>
                    <select class="form-control" name="category_name" id="sel1">
                    	@foreach($categories as $categ)
                      @if($categ->name == $category->name)
					             <option selected>{{$categ->name}}</option>
                      @else
                       <option>{{$categ->name}}</option>                      
              @endif
					    @endforeach
					 </select>                  
                  </div>
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{$blog->title}}">
                  </div>
                  <div class="form-group">
                    <label>Body</label>
                    <textarea rows="6" cols="60" class="form-control" name="body" placeholder="Write Body">{{$blog->body}}</textarea>
                  </div>
                  <div class="form-group">
                    <label>Image Upload</label><br>
                    <label class="custom-file">
                    <input type="file" name="blog_image" id="file" class="custom-file-input">
                    <span class="custom-file-control"></span>
                  </label>                 
                  </div>
                  <div class="form-group">
                    <label>Book Upload</label><br>
                    <label class="custom-file">
                    <input type="file" name="book" id="file" class="custom-file-input">
                    <span class="custom-file-control"></span>
                  </label>                 
                  </div>
                  <div class="form-group">
                    <label>Youtube Video Link </label>
                    <input type="text" name="video" class="form-control" value="{{$blog->video}}" placeholder="Enter Full Youtube Video Link">
                  </div>

                  <input type="submit" name="create" class="btn btn-primary submitbtn" value="Edit Post">                         
                </form>
                  </div>                  
              </div>
            </div>
@endsection