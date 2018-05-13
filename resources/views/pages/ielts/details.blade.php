@extends('welcome')

@section('content')

	<div class="col-md-12">
                              <div class="heading">
                              <h3>{{$ielts->title}}</h3>
                              </div>
                              <div class="col-md-12 newsimg">
                                <img src="{{asset('img/' . $ielts->image)}}">
                              </div>
                  <div class="col-md-12 text">
                              <br>
                                 <p class="text-justify">
                                    {!! nl2br($ielts->body) !!}
                                </p>
                      @if(Auth::user())        
                    <div class="col-md-12 comment">
                  <h4 class="text-center">Leave a Comment:</h4>
                  <form role="form" action="{{ route('ielts.comments.store', $ielts->id) }}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                      <textarea class="form-control" name="comment" rows="5" required></textarea>
                    </div>
                    <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                    <button type="submit" class="btn btn-danger button">Submit</button>
                  </form>
                  <br><br>
                </div>
                <hr>
                @endif
              <!-- COMMENT SECTION-->
          <div class="col-md-12 comments">
              <h3 class="comment-content"><span class="glyphicon"></span> <span class="badge"><h3>{{count($comments)}}</h3></span> Comments:</h3>
      @if (is_array($ielts->comments) || is_object($ielts->comments))
       @foreach($comments as $comment)
          <div class="col-md-12 comment">
          <div class="col-md-3 img-comment">
            <img src="{{asset('img/Avatar.jpg')}}">
          </div>
          <div class="col-md-9 userinfocomment">
            <h4>{{$comment->name}}</h4>
            <p class="comment-data">{{date('F nS, Y - g:iA', strtotime($comment->created_at))}}</p>
           </div>
          <div class="col-md-12 comment-text">
            <p>{{$comment->body}}</p>
          </div>
            </div>
            <hr>
        @endforeach
        @endif
            
    </div>
  </div>
</div>

@endsection