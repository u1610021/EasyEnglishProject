@extends('welcome')

@section('content')

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
              </ol>
              <div class="carousel-inner">
                {{$counter = 0}}

                @foreach($carousels as $carousel)
                @if($counter == 0)
                <div class="carousel-item active">
                  <img class="d-block w-100" src="{{asset('img/' .$carousel->image)}}" alt="First slide">
                    <a href="{{route('blog.show',$carousel->id)}}" class="carousel-title">
                      <p>{{$carousel->title}}</p>
                    </a>
                </div>
                @else
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{asset('img/' .$carousel->image)}}" alt="First slide">
                    <a href="#" class="carousel-title">
                      <p>{{$counter}} Slide</p>
                    </a>
                </div>
                @endif
                {{ $counter= $counter + 1}}
                @endforeach
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>        <!-- end js -->
                <br><br><br>
            <div class="row ielts">
               <div class="col-md-6 img1">
                <a href="{{  url()->current()  }}/ielts/{{   $ielts->id   }}">
                 <img src="{{asset('img/' .$ielts->image)}}"></a>
                 <a href="{{  url()->current()  }}/ielts/{{   $ielts->id   }}" class="top-left">IELTS</a>
                 <div class="linkforilets">
                 <!--  <a href="#">English Time for You</a>-->
                 </div> 
               </div>
               <div class="col-md-6 description">
                <a href="{{  url()->current()  }}/ielts/{{   $ielts->id   }}"><h3>{{$ielts->title}}</h3></a>
                <div class="info">
                <ul class="date">
                  <li><i class="fa fa-clock-o"></i><p>{{date('F nS, Y - g:iA', strtotime($grammar->created_at))}}</p></li>
                  <li><i class="fa fa-comments"></i><p>{{count($ielts->comments)}}</p></li>
                  <li><i class="fa fa-eye"><p>{{$ielts->visit_count}}</p></i></li>
                </ul>
                <p>{!!  nl2br(substr($ielts->body, 0, 100))!!}</p>
                <a href="{{  url()->current()  }}/ielts/{{   $ielts->id   }}" class="btn btn-primary read_more">Read More</a>
                </div>
                </div>
            </div>
            <br>

            <br><br>

            <hr>
            <div class="row ielts">
               <div class="col-md-6 img1">
                <a href="{{  url()->current()  }}/blog/{{   $grammar->id   }}">
                 <img src="{{asset('img/' .$grammar->image)}}"></a>
                 <a href="#" class="top-left">GRAMMAR</a>
                 <div class="linkforilets">
                 <!--  <a href="#">English Time for You</a>-->
                 </div> 
               </div>
               <div class="col-md-6 description">
                <a href="{{  url()->current()  }}/blog/{{   $grammar->id   }}"><h3>{{$grammar->title}}</h3></a>
                <div class="info">
                <ul class="date">
                  <li><i class="fa fa-clock-o"></i><p>{{date('F nS, Y - g:iA', strtotime($grammar->created_at))}}</p></li>
                  <li><i class="fa fa-comments"></i><p>{{count($grammar->comments)}}</p></li>
                  <li><i class="fa fa-eye"><p>{{$grammar ->visit_count}}</p></i></li>
                </ul>
                <p>{!! nl2br(substr($grammar->body, 0, 100)). '...' !!}</p>
                <a href="{{  url()->current()  }}/blog/{{   $grammar->id   }}" class="btn btn-primary read_more">Read More</a>
                </div>
                </div>          
            </div>
            <br>
            <hr>

            <div class="row ielts">
               <div class="col-md-6 img1">
                <a href="{{  url()->current()  }}/blog/{{   $books->id   }}">
                 <img src="{{asset('img/' .$books->image)}}"></a>
                 <a href="#" class="top-left">BOOKS</a>
                 <div class="linkforilets">
                 <!--  <a href="#">English Time for You</a>-->
                 </div> 
               </div>
               <div class="col-md-6 description">
                <a href="{{  url()->current()  }}/blog/{{   $books->id   }}"><h3>{{$books->title}}</h3></a>
                <div class="info">
                <ul class="date">
                  <li><i class="fa fa-clock-o"></i><p>{{date('F nS, Y - g:iA', strtotime($books->created_at))}}</p></li>
                  <li><i class="fa fa-comments"></i><p>{{count($books->comments)}}</p></li>
                  <li><i class="fa fa-eye"><p>{{$books->visit_count}}</p></i></li>
                </ul>
                <p>{!! nl2br(substr($books->body, 0, 100)). '...' !!}</p>
                <a href="{{url()->current()  }}/blog/{{   $books->id   }}" class="btn btn-primary read_more">Read More</a>
                </div>
                </div>
            </div><br>
            <hr>
            <div class="row ielts">
               <div class="col-md-6 img1">
                <a href="{{  url()->current()  }}/blog/{{   $videos->id   }}">
                 <img src="{{asset('img/' .$videos->image)}}"></a>
                 <a href="#" class="top-left">VIDEOS</a>
                 <div class="linkforilets">
                 <!--  <a href="#">English Time for You</a>-->
                 </div> 
               </div>
               <div class="col-md-6 description">
                <a href="#"><h3>{{$videos->title}}</h3></a>
                <div class="info">
                <ul class="date">
                  <li><i class="fa fa-clock-o"></i><p>{{date('F nS, Y - g:iA', strtotime($videos->created_at))}}</p></li>
                  <li><i class="fa fa-comments"></i><p>{{count($videos->comments)}}</p></li>
                  <li><i class="fa fa-eye"><p>{{$videos->visit_count}}</p></i></li>
                </ul>
                <p> {!!nl2br(substr($videos->body, 0, 100)). '...' !!}</p>
                <a href="{{  url()->current()  }}/blog/{{   $videos->id   }} " class="btn btn-primary read_more">Read More</a>
                </div>
                </div>
            </div><br>
            <hr>

@endsection