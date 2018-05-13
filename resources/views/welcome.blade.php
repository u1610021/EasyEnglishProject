
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Easy English</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template --> 
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
  </head>

  <body>
    <div class="container"> 
      <div class="row header">
        <div class="col-md-5 logo_text">
          <h1><a href="/">EASY<span class="logo_colour">English</span></a></h1>
          <h2>Learn English & Prepare for IELTS With Us</h2>
        </div>
        <div class="col-md-7 users_area">
          <ul id="menu1">
            @if (Auth::guest())
            <li><a href="{{route('login')}}">LOGIN</a></li>
            <li><a href="{{route('register')}}">REGISTER</a></li>
            @else
              <li>
              <div class="dropdown">
                <a href="#" role="button">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-content">
                  <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                    </form>
                </div>
              </div>
              </li>
              @endif
            </ul>
        </div>
        <div class="col-md-12 menubar">
          <ul id="menu">
          <li class="{{Request::is('/') ? "selected" : ""}}"><a href="/">HOME</a></li>
          <li class="{{Request::is('ielts') ? "selected" : ""}}">
           <div class="dropdown">
            <a href="{{route('ielts.index')}}">IELTS <span class="caret"></span></a>
            <div class="dropdown-content">
              <a href="{{route('speaking')}}">Speaking</a>
              <a href="{{route('listening')}}">Listening</a>
              <a href="{{route('reading')}}">Reading</a>
              <a href="{{route('writing')}}">Writing</a>
            </div>
          </div>
          </li>
          <li class="{{Request::is('grammar') ? "selected" : ""}}"><a href="{{route('grammar')}}">GRAMMAR</a></li>
          <li class="{{Request::is('videos') ? "selected" : ""}}"><a href="{{route('videos')}}">VIDEOS</a></li>
          <li class="{{Request::is('books') ? "selected" : ""}}"><a href="{{route('books')}}">BOOKS</a></li>
        </ul>
        </div>
      </div>

    </div>

    <main role="main" class="container">
          <br><br><br>
      <div class="row">
      <div class="col-md-7 left">

          @yield('content')
      
      </div>
              @include('partials._sidebar')
      </div> 
      <br><br><br>  
    </main><!-- /.container -->

  <!-- Footer -->
  <div class="container">
  <div id="footer">
     <p><a href="index.html">Home</a> | <a href="ielts.html">IELTS</a> | <a href="toefl.html">TOEFL</a> | <a href="grammar.html">GRAMMAR</a> | <a href="videos.html">VIDEOS </a>| <a href="books.html"> BOOKS</p>
      <p>Copyright &copy; EASY English </p>
    </div><!--enf footer-->
  </div>      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>

  </body>
</html>
