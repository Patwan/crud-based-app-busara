@extends('Frontlayout.main')

@section('title', 'Cart')

@section('content')
    <div class="header" id="home1">
        <div class="container">
            <div class="w3l_login">
                <a href="{{ route('login') }}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
            </div>
            <div class="w3l_logo">
                <h1><a href="index.html">Electronic Store<span>Your stores. Your place.</span></a></h1>
            </div>
            <div class="search">
                <input class="search_box" type="checkbox" id="search_box">
                <label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
                <div class="search_form">
                    <form action="#" method="post">
                        <input type="text" name="Search" placeholder="Search...">
                        <input type="submit" value="Send">
                    </form>
                </div>
            </div>


            <a href="{{route('cart.index')}}">
                    <button class="w3view-cart" type="submit" name="submit" value=""><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> <span class="badge badge-success"> {{ Cart::count() }}</span></span></button>
            </a> 

        </div>
    </div>
    <!-- navigation -->
    <div class="navigation">
        <div class="container">
            <nav class="navbar navbar-default">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header nav_2">
                    <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                    <ul class="nav navbar-nav">
                        <li><a href="index.html">Home</a></li>  
                        <!-- Mega Menu -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <ul class="multi-column-dropdown">
                                            <h6>Mobiles</h6>
                                            <li><a href="{{ route('front.product') }}">Mobile Phones</a></li>
                                            <li><a href="{{ route('front.product') }}">Mp3 Players <span>New</span></a></li> 
                                            <li><a href="{{ route('front.product') }}">Popular Models</a></li>
                                            <li><a href="{{ route('front.product') }}">All Tablets<span>New</span></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <ul class="multi-column-dropdown">
                                            <h6>Accessories</h6>
                                            <li><a href="products1.html">Laptop</a></li>
                                            <li><a href="products1.html">Desktop</a></li>
                                            <li><a href="products1.html">Wearables <span>New</span></a></li>
                                            <li><a href="products1.html"><i>Summer Store</i></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-2">
                                        <ul class="multi-column-dropdown">
                                            <h6>Home</h6>
                                            <li><a href="products2.html">Tv</a></li>
                                            <li><a href="products2.html">Camera</a></li>
                                            <li><a href="products2.html">AC</a></li>
                                            <li><a href="products2.html">Grinders</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="w3ls_products_pos">
                                            <h4>30%<i>Off/-</i></h4>
                                            <img src="images/1.jpg" alt=" " class="img-responsive" />
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </ul>
                        </li>
                        <li><a href="{{ route('front.about') }}">About Us</a></li>  
                        <li><a href="{{ route('front.contact') }}">Mail Us</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- //navigation -->

@yield('cont')

<script src="{{asset('dist/js/vendor/jquery.js')}}"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    Stripe.setPublishableKey('pk_test_GryUHqXe48kgNc75J2BovmeN');
</script>
<script src="{{asset('dist/js/app.js')}}"></script>

@endsection


