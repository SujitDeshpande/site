        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                </div>

                <ul class="nav navbar-top-links navbar-right">
                @if (Auth::user()->group_id == 1)
                    <?php $count=0 ?>
                    @foreach($users as $user)
                        @if ( $user->status > 1)
                            <?php $count++; ?> 
                        @endif
                    @endforeach                
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            @if (count == 0)
                            <i class="fa fa-bell"></i>  <span class="label label-warning"></span>
                            else
                            <i class="fa fa-bell"></i>  <span class="label label-warning">{{$count}}</span>
                            @endif
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="user">
                                    <div>
                                        <i class="fa fa-users fa-fw"></i> You have {{$count}} new users
                                    </div>
                                </a>
                            </li>
                        </ul>

                    </li>
                @endif
                    <li>
                        <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                        </a>
                    </li>
                </ul>

            </nav>
        </div>