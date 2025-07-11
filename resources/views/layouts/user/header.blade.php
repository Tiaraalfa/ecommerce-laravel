<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Alfa'Shop &mdash; Alfa </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="{{ asset('fe/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{ asset('fe/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fe/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('fe/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ asset('fe/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('fe/css/owl.theme.default.min.css')}}">


    <link rel="stylesheet" href="{{ asset('fe/css/aos.css')}}">

    <link rel="stylesheet" href="{{ asset('fe/css/style.css')}}">
    
  </head>
  <body>
  
  <div class="site-wrap">
    

    <div class="site-navbar bg-white py-2">

      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
          </form>  
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="index.html" class="js-logo-clone">AlfaShop</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li class="has-children active">
                  <a href="{{ route('dashboard.user') }}">Home</a>
                  <ul class="dropdown">
                    <li><a href="#">Menu One</a></li>
                    <li><a href="#">Menu Two</a></li>
                    <li><a href="#">Menu Three</a></li>
                    <li class="has-children">
                      <a href="#">Sub Menu</a>
                      <ul class="dropdown">
                        <li><a href="#">Menu One</a></li>
                        <li><a href="#">Menu Two</a></li>
                        <li><a href="#">Menu Three</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                
              <li><a href="{{ route('shop') }}"> Shop</a></li>
                <li><a href="#">Catalogue</a></li>
                <li><a href="#">New Arrivals</a></li>
                <li><a href="contact.html">Contact</a></li>
              </ul>
            </nav>
          </div>
          @if (Route::has('login'))
                                <div class="auth-buttons">
                                    @auth
                                        <span class="btn btn-success">{{ Auth::user()->name }}</span>
                            
                                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Logout</button>
                                        </form>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="btn btn-outline-secondary">Register</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
          <div class="icons">
            <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
            <a href="#" class="icons-btn d-inline-block"><span class="icon-heart-o"></span></a>
            <a href="{{ route('user.keranjang') }}" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
              <span class="number">{{ $jumlahKeranjang }}</span>
            </a>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
          </div>
        </div>
      </div>
    </div>
