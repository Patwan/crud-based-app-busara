@extends('layouts.form')

@section('title','Register Form')

@section('content')


    <!-- main -->
    <div class="main agileits-w3layouts">
        <h1> Welcome </h1>
        <div class="main-agileinfo"> 
            <div class="agileui-forms">
                <div class="container-form">
                    <div class="form-item log-in"><!-- login form-->
                        <div class="w3table agileinfo"> 
                            <div class="w3table-cell register"> 
                                <div class="w3table-tophead">
                                    <h2>Sign in</h2>
                                </div>
                                    <form role="form" method="POST" action="{{ route('post.login') }}" data-parsley-validate ='' autocomplete="off">
                                        {{ csrf_field() }}
 
                                    <div class="fields-grid">
                                        <div class="styled-input agile-styled-input-top">
                                            <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                                                <label>Email </label>
                                        </div>
                                        <div class="styled-input">
                                            <input type="Password" name="password" minlength = "6" required="">
                                            <label>Password</label>
                                        </div>
                                         <a href="#">
                                            Forgot Your Password?
                                            </a>                                        
                                        <input type="submit" value="Log In"> 
                                    </div>
                                    <!-- Added -->
                                       <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    <!-- End -->

                                </form>  
                            </div>
                        </div>
                    </div>
                    <div class="form-item sign-up"><!-- sign-up form-->
                        <div class="w3table w3-agileits">
                            <div class="w3table-cell register">   
                                    <h3> Register</h3>
                                <form class="form-horizontal" role="form" method="POST" action="{{ route('post.register') }}" data-parsley-validate ='' autocomplete="off">
                                    {{ csrf_field() }}
                                    <div class="fields-grid">
                                        <div class="styled-input agile-styled-input-top">
                                            
                                           <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" minlength = "6" required autofocus>
                                            <label>Full Name</label>
                                        </div>
                                        <div class="styled-input">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                            <label>Email</label>
                                        </div>
                                        <div class="styled-input">
                                             <input id="password" type="password" class="form-control" name="password" minlength = "6" required>
                                            <label>Password </label>
                                        </div>
                                        <div class="styled-input">
                                             <input id="password-confirm" type="password" class="form-control" name="password_confirmation" minlength = "6" required>

                                            <label> Confirm Password</label>
                                        </div>
                                        <div class="clear"> </div>
                                    </div>
                                    <input type="submit" value="Sign up">
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-info">
                    <div class="info-w3lsitem">
                        <div class="w3table">
                            <div class="w3table-cell">
                                <p> Have an account? </p>
                                <div class="btn"> Sign in </div>
                            </div>
                        </div>
                    </div>
                    <div class="info-w3lsitem">
                        <div class="w3table">
                            <div class="w3table-cell">
                                <p> Dont have an account?</p>
                                <div class="btn">Sign up</div>
                            </div>
                        </div>
                    </div>
                    <div class="clear"> </div>
                </div> 
                
                
            </div> 
        </div>  
    </div>   
    <!-- //main -->
@endsection
   