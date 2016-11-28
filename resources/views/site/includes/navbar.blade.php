    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                    <a href="{{ URL::action('UserAdminController@show') }}">
                                
                            <img alt="image" class="img-circle" src="/uploads/avatars/{{Auth::user()->avatar}}" width="40%" height="40%" /></a>
                            </span>

                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->name }}</strong>
                             </span> 
                             
                             <span class="text-muted text-xs block">
                             @foreach($users as $user)
                             @if ( $user->id == Auth::user()->id)
                             {{ $user->groupname}}
                             @endif
                             @endforeach
                             <b class="caret"></b></span> 
                             
                             </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li>
                                <a href="{{ URL::action('UserAdminController@show') }}">
                                    Profile
                                </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                </li>
                            </ul>
                    </div>
                    <div class="logo-element">
                    <a href="{{ URL::action('UserAdminController@show') }}">
                        <img alt="image" class="img-circle" src="/uploads/avatars/{{Auth::user()->avatar}}" width="60%" height="60%" /></a>
                    </div>
                </li>
                @if ( Request::is('home'))
                <li class="active">
                @else
                <li>
                @endif
                    <a href="/home"><i class="fa fa-home"></i> <span class="nav-label">Home</span></a>
                </li>
                @if ( Request::is('calendar'))
                <li class="active">
                @else
                <li>
                @endif
                    <a href="/calendar"><i class="fa fa-calendar"></i> <span class="nav-label">Calendar</span> </a>
                </li>
                @if ( Request::is('incidents'))
                <li class="active">
                @else
                <li>
                @endif
                    <a href="/incidents"><i class="fa fa-stack-exchange"></i> <span class="nav-label">Incidents</span> </a>
                </li>
                @if ( Request::is('forums'))
                <li class="active">
                @else
                <li>
                @endif
                    <a href="/forums"><i class="fa fa-comments"></i> <span class="nav-label">Discussions</span> </a>
                </li>
                @if (Auth::user()->group_id == 1)
                    @if ( Request::is('user') OR Request::is('role'))
                    <li class="active">
                    @else
                    <li>
                    @endif
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Manage</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            @if ( Request::is('user'))
                            <li class="active">
                            @else
                            <li>
                            @endif
                                <a href="/user"><i class="fa fa-users"></i> <span class="nav-label">Users</span> </a>
                            </li>   
                            @if ( Request::is('role'))
                            <li class="active">
                            @else
                            <li>
                            @endif
                                <a href="/role"><i class="fa fa-graduation-cap"></i> <span class="nav-label">Roles</span> </a>
                            </li> 
                        </ul>
                </li>
                @endif             
            </ul>

        </div>
    </nav>