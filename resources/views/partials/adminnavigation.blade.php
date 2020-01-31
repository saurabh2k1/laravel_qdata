<ul class="nav nav-pills">
    <li class="nav-item">
    <a class="nav-link {{Request::segment(2)=='users'? 'active': false}}" href="{{ route('users')}}">Users</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{Request::segment(2)=='sites'? 'active': false}}" href="{{ route('sites.index')}}">Sites</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{Request::segment(2)=='studies'? 'active': false}}" href="{{ route('studies.index')}}">Studies</a>
    </li>
  </ul>