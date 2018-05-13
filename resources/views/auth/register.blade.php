
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
      <div class="col-md-12 col-md-offset-2">
                <div class="panel-body">
                    <br><br><br>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="float: right; margin-right: 30px; margin-bottom: 20px;">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
      </div> 
 
<br><br><br><br><br>
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

