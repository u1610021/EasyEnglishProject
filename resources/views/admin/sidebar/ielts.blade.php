@extends('layouts.adminLayout.admin_design')
@section('content')

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
	<div id="breadcrumb"> <a href="{{route('home')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>	<a href="{{route('ielts.create')}}" title="Go to Create Ielts Post" class="tip-bottom"><i class="icon-home"></i> Create Ielts Post</a></div>  
</div>
<!--End-breadcrumbs-->
 
			<table class="table">
				<thead>
					<th>#</th>
					<th>Title</th>
					<th>Body</th>
					<th>Created_at</th>
					<th>Operations</th>
				</thead>
				
				<tbody>
					
					@foreach($ielts as $post)
					<tr>
						<th>{{$post->id}}</th>
						<td>{{$post->title}}</td>
						<td>{{substr($post->body,0, 50)}} {{strlen($post->body) > 50 ? "..." : ""}}</td>
						<td>{{$post->created_at}}</td>
					<td><a href="{{route('ielts.edit', $post->id)}}" class="btn btn-default">Edit</a>
						<form method="POST" action="{{action('IeltsController@destroy', $post->id)}}">
							{{ csrf_field() }}
							{{ method_field('Delete') }}
							<button class="btn btn-default">Delete</button>
						</form>
					</td>
					</tr>
					@endforeach
				</tbody>

			</table>



 
</div>
      
<!--end-main-container-part-->

@endsection