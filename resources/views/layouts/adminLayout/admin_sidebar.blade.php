<div id="sidebar"><a href="{{route('admin.dashboard')}}" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="{{Request::is('admin') ? "active" : ""}}"><a href="{{route('admin.dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="submenu"> <a href="{{route('admin.speaking')}}"><i class="icon icon-th-list"></i> <span>IELTS</span> <span class="label label-important">4</span></a>
      <ul>
        <li><a href="{{route('admin.speaking')}}">Speaking</a></li>
        <li><a href="{{route('admin.listening')}}">Listening</a></li>
        <li><a href="{{route('admin.reading')}}">Reading</a></li>
        <li><a href="{{route('admin.writing')}}">Writing</a></li>
      </ul>
    </li>
    <li class="{{Request::is('admin/grammar') ? "active" : ""}}"> <a href="{{route('admin.grammar')}}"><i class="icon icon-signal"></i> <span>Grammar</span></a> </li>
    <li class="{{Request::is('admin/video') ? "active" : ""}}"> <a href="{{route('admin.video')}}"><i class="icon icon-inbox"></i> <span>Videos</span></a> </li>
    <li class="{{Request::is('admin/book') ? "active" : ""}}"><a href="{{route('admin.book')}}"><i class="icon icon-th"></i> <span>Books</span></a></li>
<li class="submenu"> <a href="{{route('admin.blogcomments')}}"><i class="icon icon-th-list"></i> <span>Comments</span> <span class="label label-important"></span></a>
      <ul>
        <li><a href="{{route('admin.blogcomments')}}">Blog Comments</a></li>
        <li><a href="{{route('admin.ieltscomments')}}">Ielts Comments</a></li>
      </ul>
    </li>
        </ul>
</div>
<!--sidebar-menu-->