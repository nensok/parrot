<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Paarot') }}</title>
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="images/2.png" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/landing/bootstrap.min.css">
    <link rel="stylesheet" href="css/landing/animate.css">
    <link rel="stylesheet" href="css/landing/LineIcons.css">
    <link rel="stylesheet" href="css/landing/owl.carousel.css">
    <link rel="stylesheet" href="css/landing/owl.theme.css">
    <link rel="stylesheet" href="css/landing/magnific-popup.css">
    <link rel="stylesheet" href="css/landing/nivo-lightbox.css">
    <link rel="stylesheet" href="css/landing/main.css">    
    <link rel="stylesheet" href="css/landing/responsive.css">

  </head>
  
  <body>

    <!-- Header Section Start -->
    <header id="home" class="hero-area">    
      <div class="overlay">
        <span></span>
        <span></span>
      </div>
      <nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar">
        <div class="container">
          <a href="/" class="navbar-brand">Paarot</a>     
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto w-100 justify-content-end">
              
            </ul>
          </div>
        </div>
      </nav>
     
      <div class="container"> 
           
        <div class="row">
          <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="contents">
                @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                  <p class="alert alert-danger alert-dismissible fade show" role="alert">{{ $error }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </p>
                @endforeach
              @endif  
              <h2 class="head-title">Share The Happenings Around!!!</h2>
              <div class="header-button">
                <a href="#" class="btn btn-border" data-toggle="modal" data-target="#started">Get Started</a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-12 col-xs-12 p-0">
            <div class="intro-img">
              <img src="svg/mobile-testing.svg" alt="">
            </div>            
          </div>
        </div> 
      </div>             
    </header>
    <!-- Header Section End --> 
    
    <!-- Footer Section Start -->
    <footer>    
          <div class="footer-content site-info text-center">
                <ul class="menu">
                    <li><a href="#" data-toggle="modal" data-target="#terms">- Privacy policy</a></li>
                </ul>
                <p><a href="#" >&COPY; 2020 Paarot</a></p>
          </div>              
        </div>
    </footer>
   
       

<!-- Getting Started Modal -->
<div class="modal fade" id="started" tabindex="-1" role="dialog" aria-labelledby="StartedModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
          
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Log In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Sign Up</a>
                </li> 
            </ul>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                
                                        <div class="form-group row">                
                                            <div class="col-md-12">
                                                <input id="email" placeholder="Email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                           
                                            <div class="col-md-12">
                                                <input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <div class="col-md-8">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                
                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                
                                        <div class="form-group row mb-0">
                                            <div class="col-md-12 ">
                                                <button type="submit" class="btn btn-success btn-block">
                                                    {{ __('Sign In') }}
                                                </button>
                
                                                @if (Route::has('password.request'))
                                                    <a style="color:rgb(0, 26, 255)" class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif
                                            </div>
                                     </div>
                                     <hr>
                                    <div class="form-group row mb-0">
                                      <div class="col-md-12">
                                          <a href="{{ url('/auth/redirect/google') }}" class="btn btn-danger btn-sm"> Login with Google <i class="fas fa-plus"></i></a>
                                      </div>
                                    </div>
                                </form>
                          </div>
                          
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="card-body">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <input id="name" placeholder="Full Name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
      
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <input id="email" placeholder="E-mail" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required>
                                            </div>
                                        </div>
                
                                        <div class="form-group row mb-0">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-success btn-block">
                                                    {{ __('Sign Up') }} link
                                                </button>
                                              </div>
                                            </div>
                                            <br>
                                            <a href="{{ url('/auth/redirect/google') }}" class="btn btn-danger btn-sm"> Register with Google <i class="fas fa-plus"></i></a>
                                </form>
                            </div>
                    </div>
             </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
 </div>

    <!-- Modal -->
    <div class="modal fade" id="terms" tabindex="-1" role="dialog" aria-labelledby="termsTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="termsTitle">Terms & Conditions</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            @include('layouts.terms')
          </div>
          <div class="modal-footer">
            <a style="color:blue" class="btn btn-link" data-dismiss="modal">Accept</a>
          </div>
        </div>
      </div>
    </div>

 <!-- jQuery first, then Tether, then Bootstrap JS. -->
 <script src="js/landing/jquery-min.js"></script>
 <script src="js/landing/popper.min.js"></script>
 <script src="js/landing/bootstrap.min.js"></script>     
 <script src="js/landing/jquery.nav.js"></script>    
 <script src="js/landing/scrolling-nav.js"></script>    
 <script src="js/landing/jquery.easing.min.js"></script>     
 <script src="js/landing/nivo-lightbox.js"></script>     
 <script src="js/landing/jquery.magnific-popup.min.js"></script>      
 <script src="js/landing/main.js"></script>
      
</body>
</html>
