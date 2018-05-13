@extends('welcome')

@section('content')

@foreach($ielts as $post)
            <div class="row ielts">
               <div class="col-md-6 img1">
                <a href="{{  route('ielts.show', $post->id)  }}">
                 <img src="{{asset('img/' .$post->image)}}"></a>
                 <div class="linkforilets">
                 <!--  <a href="#">English Time for You</a>-->
                 </div> 
               </div>
               <div class="col-md-6 description">
                <a href="{{  route('ielts.show', $post->id)  }}"><h3>{{$post->title}}</h3></a>
                <div class="info">
                <ul class="date">
                  <li><i class="fa fa-clock-o"></i><p>{{date('F nS, Y - g:iA', strtotime($post->created_at))}}</p></li>
                  <li><i class="fa fa-comments"></i><p>{{count($post->comments)}}</p></li>
                  <li><i class="fa fa-eye"><p>{{	$post->visit_count 	}}</p></i></li>
                </ul>
                <p>{!!  nl2br(substr($post->body, 0, 100))!!}</p>
                <a href="{{  route('ielts.show', $post->id)  }}" class="btn btn-primary read_more">Read More</a>
                </div>
                </div>
            </div>
            <br><br>
		@endforeach
					<div class="text-center">
					{!!	$ielts->links();	!!}
					</div>
@endsection