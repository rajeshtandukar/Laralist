 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('country') }}">Countries</a>
                    </li>
                   
                </ul>               
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="{!!route('frontend.post')!!}"><span class="label label-danger">Post Your Ad <i class="glyphicon glyphicon-pencil"></i> </span></a></li>
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('user/myitems') }}"><i class="fa fa-btn fa-sign-out"></i>My Items</a></li>
                                <li><a href="{{ url('profile') }}"><i class="fa fa-btn fa-sign-out"></i>Edit Profile</a></li>
                                @if( Auth::user()->role =='admin')    
                                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-btn fa-sign-out"></i>Admin Dashboard</a></li>
                                @endif
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>

                    
            </div>

            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>