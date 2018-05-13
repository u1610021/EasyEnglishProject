      <div class="col-md-5 right">
            <div class="newsbar">
              <div class="top">
                <h2>Top Blogs</h2>
              </div>


              @foreach($topblogs as $topblog)
              <div class="news">
                  <div class="imagefornews">
                    <img src="{{asset('img/' .$topblog->image)}}">
                  </div>
                  <div class="linkfornews">
                    <a href="{{route('blog.show', $topblog->id)}}">{{$topblog->title}}</a>
                  <div class="info fortopnews">
                  <ul class="date lastnews">
                  <li><i class="fa fa-clock-o"></i><p>{{date('F nS, Y - g:iA', strtotime($topblog->created_at))}}</p></li>
                  <li><i class="fa fa-comments"></i><p>{{count($topblog->comments)}}</p></li>
                  <li><i class="fa fa-eye"><p>{{$topblog->visit_count}}</p></i></li>
                </ul>
                  </div>
                  </div>
              </div>
              @endforeach
              
            </div><!--end newsbar-->
            <br><br>

            <div class="advertising">
              <div class="advimg">
                <img src="{{asset('img/register.jpg')}}">
              </div>
              <div class="advcontent">
                <h4>
                  Online registration page for IELTS
                </h4>
              </div>
              <div class="advbutton">
                <a href="https://www.britishcouncil.uz/en/exam/ielts/registration" target="_blank" class="btn btn-primary">Go to Online Registration Page</a>
              </div>
            </div>
            <br><br>
            <div class="advertising">
              <div class="advimg">
                <img src="{{asset('img/ieltsdate.jpg')}}">
              </div>
              <div class="advcontent">
                <h4>
                  IELTS Exam Dates Page
                </h4>
              </div>
              <div class="advbutton dates">
                <a href="https://www.britishcouncil.uz/en/exam/ielts/registration" target="_blank" class="btn btn-primary">Go to IELTS Dates Page</a>
              </div>
            </div>

        </div>