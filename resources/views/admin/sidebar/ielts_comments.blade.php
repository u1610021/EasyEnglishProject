@extends('layouts.adminLayout.admin_design')
@section('content')

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{route('home')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->
 
			<table class="table">
				<thead>
					<th>#</th>
					<th>Blog Id</th>
					<th>User</th>
					<th>Body</th>
					<th>Created_at</th>
					<th>Operations</th>
				</thead>
				
				<tbody>
					
					@foreach($comments as $comment)
					<tr>
						<td>{{$comment->id}}</td>
						<td>{{$comment->blog_id}}</td>
						<td>{{$comment->name}}</td>
						<td>{{$comment->body}}</td>
						<td>{{$comment->created_at}}</td>
					<td>
							<form method="POST" action="{{action('IeltsCommentController@destroy', $comment->id)}}">
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