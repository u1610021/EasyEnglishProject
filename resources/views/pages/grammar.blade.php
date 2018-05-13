@extends('welcome')

@section('content')

            @foreach($grammars as $grammar)
            <div class="row ielts">
               <div class="col-md-6 img1">
                <a href="{{  route('blog.show', $grammar->id)  }}">
                 <img src="{{asset('img/' .$grammar->image)}}"></a>
                 <div class="linkforilets">
                 <!--  <a href="#">English Time for You</a>-->
                 </div> 
               </div>
               <div class="col-md-6 description">
                <a href="{{  route('blog.show', $grammar->id)  }}"><h3>{{$grammar->title}}</h3></a>
                <div class="info">
                <ul class="date">
                  <li><i class="fa fa-clock-o"></i><p>{{date('F nS, Y - g:iA', strtotime($grammar->created_at))}}</p></li>
                  <li><i class="fa fa-comments"></i><p>{{count($grammar->comments)}}</p></li>
                  <li><i class="fa fa-eye"><p>{{$grammar->visit_count}}</p></i></li>
                </ul>
                <p>{!!  nl2br(substr($grammar->body, 0, 100))!!}</p>
                <a href="{{  route('blog.show', $grammar->id)  }}" class="btn btn-primary read_more">Read More</a>
                </div>
                </div>
            </div>
            <br><br>
		@endforeach
					<div class="text-center">
					{!!	$grammars->links();	!!}
					</div>

@endsection