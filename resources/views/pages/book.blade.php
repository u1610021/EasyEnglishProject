@extends('welcome')

@section('content')

@foreach($books as $book)
            <div class="row ielts">
               <div class="col-md-6 img1">
                <a href="{{  route('blog.show', $book->id)  }}">
                 <img src="{{asset('img/' .$book->image)}}"></a>
                 <div class="linkforilets">
                 <!--  <a href="#">English Time for You</a>-->
                 </div> 
               </div>
               <div class="col-md-6 description">
                <a href="{{  route('blog.show', $book->id)  }}"><h3>{{$book->title}}</h3></a>
                <div class="info">
                <ul class="date">
                  <li><i class="fa fa-clock-o"></i><p>{{date('F nS, Y - g:iA', strtotime($book->created_at))}}</p></li>
                  <li><i class="fa fa-comments"></i><p>{{count($book->comments)}}</p></li>
                  <li><i class="fa fa-eye"><p>{{$book->visit_count}}</p></i></li>
                </ul>
                <p>{!!  nl2br(substr($book->body, 0, 100))!!}</p>
                <a href="{{  route('blog.show', $book->id)  }}" class="btn btn-primary read_more">Read More</a>
                </div>
                </div>
            </div>
            <br><br>
		@endforeach
					<div class="text-center">
					{!!	$books->links();	!!}
					</div>		

@endsection