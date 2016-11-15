    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
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
                                <a href="{{ URL::action('UserAdminController@profile', Auth::user()->id) }}">
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
                        A+
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
                @if ( Request::is('user'))
                <li class="active">
                @else
                <li>
                @endif
                    <a href="/user"><i class="fa fa-users"></i> <span class="nav-label">Users</span> </a>
                </li>                
            </ul>

        </div>
    </nav>