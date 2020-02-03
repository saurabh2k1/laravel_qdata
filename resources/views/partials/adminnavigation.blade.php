<ul class="nav nav-pills">
    <li class="nav-item">
    <a class="nav-link {{Request::segment(2)=='users'? 'active': false}}" href="{{ route('users')}}"> <i class="fas fa-users"></i> Users</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{Request::segment(2)=='sites'? 'active': false}}" href="{{ route('sites.index')}}"> <i class="fas fa-building"></i> Sites</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{Request::segment(2)=='studies'? 'active': false}}" href="{{ route('studies.index')}}"> <i class="fas fa-graduation-cap"></i> Studies</a>
    </li>
  </ul>