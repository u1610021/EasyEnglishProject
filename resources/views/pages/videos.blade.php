@extends('welcome')

@section('content')

@foreach($videos as $video)
            <div class="row ielts">
               <div class="col-md-6 img1">
                <a href="{{  route('blog.show', $video->id)  }}">
                 <img src="{{asset('img/' .$video->image)}}"></a>
                 <div class="linkforilets">
                 <!--  <a href="#">English Time for You</a>-->
                 </div> 
               </div>
               <div class="col-md-6 description">
                <a href="{{  route('blog.show', $video->id)  }}"><h3>{{$video->title}}</h3></a>
                <div class="info">
                <ul class="date">
                  <li><i class="fa fa-clock-o"></i><p>{{date('F nS, Y - g:iA', strtotime($video->created_at))}}</p></li>
                  <li><i class="fa fa-comments"></i><p>{{count($video->comments)}}</p></li>
                  <li><i class="fa fa-eye"><p>{{$video->visit_count}}</p></i></li>
                </ul>
                <p>{!!  nl2br(substr($video->body, 0, 100))!!}</p>
                <a href="{{  route('blog.show', $video->id)  }}" class="btn btn-primary read_more">Read More</a>
                </div>
                </div>
            </div>
            <br><br>
		@endforeach
          <div class="text-center">
          {!! $videos->links(); !!}
          </div>

@endsection