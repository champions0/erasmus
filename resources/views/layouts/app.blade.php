<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Projects</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font only -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <link rel="stylesheet" href="{{asset("/css/style.css")}}">
</head>

<body>

    <header>
        <img src="/images/header-shape.png" class="header-shape">
        <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('activities')}}">{{__("Activities")}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('materials')}}">{{__("Materials")}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('partners')}}">{{__("Partners")}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about')}}">{{__("About us")}}</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle font-weight-bold" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ strtoupper(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale())}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales() as $localCode => $langItem)
                                @if(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale() != $localCode)
                                    <a class="dropdown-item"  href="{{\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalizedURL($localCode, null, [], true) }}">{{strtoupper($localCode)}}</a>
                                @endif
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link font-weight-bold" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 0C4.48 0 0 4.48 0 10C0 15.52 4.48 20 10 20C15.52 20 20 15.52 20 10C20 4.48 15.52 0 10 0ZM5.07 16.28C5.5 15.38 8.12 14.5 10 14.5C11.88 14.5 14.51 15.38 14.93 16.28C13.57 17.36 11.86 18 10 18C8.14 18 6.43 17.36 5.07 16.28ZM16.36 14.83C14.93 13.09 11.46 12.5 10 12.5C8.54 12.5 5.07 13.09 3.64 14.83C2.62 13.49 2 11.82 2 10C2 5.59 5.59 2 10 2C14.41 2 18 5.59 18 10C18 11.82 17.38 13.49 16.36 14.83ZM10 4C8.06 4 6.5 5.56 6.5 7.5C6.5 9.44 8.06 11 10 11C11.94 11 13.5 9.44 13.5 7.5C13.5 5.56 11.94 4 10 4ZM10 9C9.17 9 8.5 8.33 8.5 7.5C8.5 6.67 9.17 6 10 6C10.83 6 11.5 6.67 11.5 7.5C11.5 8.33 10.83 9 10 9Z" fill="white"/>
                            </svg>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown1" data-toggle="modal" data-target="#loginModal">
                            @auth
                                <a class="dropdown-item"  href="{{route('dashboard.index')}}" >{{__("Dashboard")}}</a>
                            @else
                                <a class="dropdown-item" data-toggle="modal" data-target="#loginModal" href="">{{__("LOG IN")}}</a>
                            @endauth
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    @yield('content')
    @guest()
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header p-4">
                        <h5 class="modal-title font-weight-bold">{{__("Sign In")}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z" fill="black"/>
                                </svg>
                            </span>
                        </button>
                    </div>
                    <div class="modal-body p-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="exampleInputEmail1" class="mb-1">{{__("E-mail")}}</label>
                                <div class="position-relative">
                                    <input name="email" value="{{ old('email') }}" type="email" class="form-control @error('email') error @enderror" aria-describedby="emailHelp" placeholder="{{__("Type here...")}}">
                                    @error('email')
                                        <svg width="22" height="19" viewBox="0 0 22 19" fill="none" xmlns="http://www.w3.org/2000/svg" class="inp-icon">
                                            <path d="M0 19H22L11 0L0 19ZM12 16H10V14H12V16ZM12 12H10V8H12V12Z" fill="#F05359"/>
                                        </svg>
                                    @enderror
                                </div>
                                @error('email')
                                    <span class="error-span">{{__("Wrong Email Address")}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="mb-1">{{__("Password")}}</label>
                                <div class="position-relative">
                                    <input type="password" name="password" class="form-control @error('password') error @enderror" placeholder="{{__("Password...")}}">
                                    <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="inp-icon showPasswordIcon">
                                        <path opacity="0.5" d="M10.0002 3.00008C13.1585 3.00008 15.9752 4.77508 17.3502 7.58342C16.8585 8.60008 16.1668 9.47508 15.3418 10.1834L16.5168 11.3584C17.6752 10.3334 18.5918 9.05008 19.1668 7.58342C17.7252 3.92508 14.1668 1.33341 10.0002 1.33341C8.94183 1.33341 7.92516 1.50008 6.96683 1.80841L8.34183 3.18341C8.8835 3.07508 9.4335 3.00008 10.0002 3.00008ZM9.1085 3.95008L10.8335 5.67508C11.3085 5.88342 11.6918 6.26675 11.9002 6.74175L13.6252 8.46675C13.6918 8.18342 13.7418 7.88342 13.7418 7.57508C13.7502 5.50841 12.0668 3.83342 10.0002 3.83342C9.69183 3.83342 9.40016 3.87508 9.1085 3.95008ZM1.67516 1.22508L3.9085 3.45842C2.55016 4.52508 1.47516 5.94175 0.833496 7.58342C2.27516 11.2417 5.8335 13.8334 10.0002 13.8334C11.2668 13.8334 12.4835 13.5917 13.6002 13.1501L16.4502 16.0001L17.6252 14.8251L2.85016 0.041748L1.67516 1.22508ZM7.92516 7.47508L10.1002 9.65008C10.0668 9.65841 10.0335 9.66675 10.0002 9.66675C8.85016 9.66675 7.91683 8.73342 7.91683 7.58342C7.91683 7.54175 7.92516 7.51675 7.92516 7.47508ZM5.09183 4.64175L6.55016 6.10008C6.3585 6.55842 6.25016 7.05842 6.25016 7.58342C6.25016 9.65008 7.9335 11.3334 10.0002 11.3334C10.5252 11.3334 11.0252 11.2251 11.4752 11.0334L12.2918 11.8501C11.5585 12.0501 10.7918 12.1667 10.0002 12.1667C6.84183 12.1667 4.02516 10.3917 2.65016 7.58342C3.2335 6.39175 4.0835 5.40841 5.09183 4.64175Z" fill="#707070"/>
                                    </svg>
                                </div>
                                @error('password')
                                    <span class="error-span">{{$message}}</span>
                                @enderror
                            </div>
    {{--                        <a href="{{ route('password.request') }}" class="text-right w-100 mb-3 d-block text-decoration-underline">{{__("Forgot--}}
    {{--                            password?")}}</a>--}}
                            <button type="submit" class="btn btn-primary w-100 mt-4">{{__("SIGN IN")}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endguest
    <footer>

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12 footer-inner d-flex">
                    <div class="footer-block sitemap">
                        <h5>{{__("Sitemap")}}</h5>
                        <ul>
                            <li><a href="{{route('activities')}}">{{__("Activities")}}</a></li>
                            <li><a href="{{route('about')}}">{{__("About Us")}}</a></li>
                            <li><a href="{{route('materials')}}">{{__("Materials")}}</a></li>
                            <li><a href="{{route('partners')}}">{{__("Partners")}}</a></li>
                        </ul>
                    </div>
                    <div class="footer-block contact-info">
                        <h5>{{__("Contact information")}}</h5>
                        <ul>
                            <li>
                                <svg width="13" height="10" viewBox="0 0 13 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.1999 0.000976562H1.24438C0.559939 0.000976562 -6.10352e-05 0.550977 -6.10352e-05 1.2232V8.55653C-6.10352e-05 9.22875 0.559939 9.77875 1.24438 9.77875H11.1999C11.8844 9.77875 12.4444 9.22875 12.4444 8.55653V1.2232C12.4444 0.550977 11.8844 0.000976562 11.1999 0.000976562ZM10.9511 2.5982L6.88172 5.09764C6.47727 5.3482 5.96705 5.3482 5.56261 5.09764L1.49327 2.5982C1.33772 2.50042 1.24438 2.33542 1.24438 2.1582C1.24438 1.74875 1.69861 1.50431 2.05327 1.7182L6.22216 4.27875L10.3911 1.7182C10.7457 1.50431 11.1999 1.74875 11.1999 2.1582C11.1999 2.33542 11.1066 2.50042 10.9511 2.5982Z" fill="white" fill-opacity="0.8"/>
                                </svg>
                                <a href="mailto:lorem ipsum">lorem ipsum</a>
                            </li>
                            <li>
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.4233 7.8792L8.78943 7.69266C8.39704 7.64763 8.01108 7.78271 7.73447 8.05932L6.55085 9.24294C4.7304 8.31663 3.23801 6.83067 2.3117 5.00379L3.50175 3.81374C3.77836 3.53713 3.91344 3.15117 3.86842 2.75877L3.68187 1.13773C3.60468 0.488031 3.0579 -0.000854492 2.40176 -0.000854492H1.2889C0.562008 -0.000854492 -0.0426659 0.603819 0.00236304 1.33071C0.343296 6.82424 4.73683 11.2113 10.2239 11.5523C10.9508 11.5973 11.5555 10.9926 11.5555 10.2657V9.15288C11.5619 8.50317 11.073 7.9564 10.4233 7.8792Z" fill="white" fill-opacity="0.8"/>
                                </svg>
                                <a href="tel:+931-729-0252-456">+931-729-0252-456</a>
                            </li>
                            <li>
                                <svg width="9" height="12" viewBox="0 0 9 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.15466 -0.000976562C1.85779 -0.000976562 0.00012207 1.8567 0.00012207 4.15356C0.00012207 6.62848 2.62342 10.0411 3.7036 11.3409C3.941 11.6258 4.37426 11.6258 4.61166 11.3409C5.68591 10.0411 8.3092 6.62848 8.3092 4.15356C8.3092 1.8567 6.45153 -0.000976562 4.15466 -0.000976562ZM4.15466 5.63733C3.33562 5.63733 2.6709 4.9726 2.6709 4.15356C2.6709 3.33453 3.33562 2.6698 4.15466 2.6698C4.9737 2.6698 5.63842 3.33453 5.63842 4.15356C5.63842 4.9726 4.9737 5.63733 4.15466 5.63733Z" fill="white" fill-opacity="0.8"/>
                                </svg>
                                <a href="">3109  Glory Road, Centerville, TN</a></li>
                            <li class="mt-3">
                                <a href="" class="mr-2">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.4328 15.1288H4.67164C2.10448 15.1288 0 13.038 0 10.4543V4.67455C0 2.10579 2.08955 0 4.67164 0H10.4478C13.0149 0 15.1194 2.09085 15.1194 4.67455V10.4543C15.1045 13.023 13.0149 15.1288 10.4328 15.1288ZM4.67164 1.68762C3.02985 1.68762 1.68657 3.03174 1.68657 4.67455V10.4543C1.68657 12.0971 3.02985 13.4412 4.67164 13.4412H10.4478C12.0896 13.4412 13.4328 12.0971 13.4328 10.4543V4.67455C13.4328 3.03174 12.0896 1.68762 10.4478 1.68762H4.67164Z" fill="white"/>
                                        <path d="M7.97017 11.8299C5.83584 11.8299 4.10449 10.0975 4.10449 7.96183C4.10449 5.82617 5.83584 4.09375 7.97017 4.09375C10.1045 4.09375 11.8358 5.82617 11.8358 7.96183C11.8358 10.0975 10.1045 11.8299 7.97017 11.8299ZM7.97017 5.61708C6.67166 5.61708 5.62688 6.66251 5.62688 7.96183C5.62688 9.26114 6.67166 10.3066 7.97017 10.3066C9.26867 10.3066 10.3135 9.26114 10.3135 7.96183C10.3135 6.67745 9.26867 5.61708 7.97017 5.61708Z" fill="white"/>
                                        <path d="M12.6716 3.8876C12.6716 4.24603 12.3731 4.54472 12.0149 4.54472C11.6567 4.54472 11.3582 4.24603 11.3582 3.8876C11.3582 3.52916 11.6567 3.23047 12.0149 3.23047C12.388 3.23047 12.6716 3.52916 12.6716 3.8876Z" fill="white"/>
                                    </svg>
                                </a>
                                <a href="" class="mr-2">
                                    <svg width="8" height="16" viewBox="0 0 8 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.75132 3.12323V0.748619C7.75132 0.748619 5.33493 0.71875 5.17085 0.71875C4.08198 0.71875 2.50088 1.95833 2.50088 3.37712C2.50088 4.9602 2.50088 5.91602 2.50088 5.91602H0.233643V8.60426H2.47105V15.2651H5.11119V8.57439H7.453L7.75132 5.94588H5.15593C5.15593 5.94588 5.15593 4.33294 5.15593 4.01931C5.15593 3.55634 5.499 3.1083 6.02106 3.1083C6.37905 3.1083 7.75132 3.12323 7.75132 3.12323Z" fill="#E9E9EC"/>
                                    </svg>
                                </a>
                                <a href="">
                                    <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.6825 1.24279C14.6825 1.24279 13.7865 0.167496 12.2333 0.2123C10.3814 0.272038 8.67881 1.40707 8.87296 4.3044C8.87296 4.3044 6.09512 5.15567 1.76407 1.03371C1.76407 1.03371 0.375151 3.30377 2.83937 5.43943C2.83937 5.43943 2.15237 5.63358 1.22642 5.11087C1.22642 5.11087 0.733579 7.02251 3.89973 8.4861C3.89973 8.4861 2.82443 8.7848 2.34652 8.4861C2.34652 8.4861 2.63028 10.5172 5.46786 11.0101C5.46786 11.0101 4.00427 12.4587 0.539429 12.4289C0.539429 12.4289 7.73793 16.1177 12.7261 11.3834C16.2955 8.00819 15.7877 3.49793 15.7877 3.49793C15.7877 3.49793 16.8331 3.16936 17.4604 2.03433C17.4604 2.03433 16.2656 2.40769 15.5786 2.34796C15.5786 2.34796 16.8929 1.52655 16.9974 0.555797C17.0124 0.555797 15.8923 1.34733 14.6825 1.24279Z" fill="#E9E9EC"/>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr>
            <p class="text-center copyright-text">© {{date('y')}} {{__("All rights reserved")}}</p>
        </div>

    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="/js/script.js"></script>
    @if($errors->any())
        <script>
            $(document).ready(function() {
                $("#loginModal").modal('show');
            });
        </script>
    @endif
</body>
</html>
