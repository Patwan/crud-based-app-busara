<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <!-- Logo -->
                <div class="logo">
                  <h1><a href="#">Admin Dashboard</a></h1>
                </div>
            </div>

            <div class="col-md-3 pull-right">
                     <!-- The if statement checks if users are logged in to display the menu -->
                @if(Auth::check())
                <div class="navbar navbar-inverse" role="banner">
                    <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Hello {{Auth::user()->name}} <b
                                            class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li> {{date('M j, Y') }}</li>

                      <!-- Since logout has a POST method in the routelist, we use a POST method and a hidden form -->
                      <li>
                         <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                      </li>
                  </ul>
                </li>

                <!-- If they are not logged in, display a button -->
                @else

                <a href='{{ route('login') }}' class='btn btn-default'>  LogIn </a>

                @endif
                </nav>
            </div>
        </div>
    </div>
</div>







                                

