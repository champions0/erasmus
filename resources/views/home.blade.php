@extends('layouts.app')

@section('content')

    <div class="wrapper">
        <div class="home-banner">
            <img src="/images/img.png" alt="" class="img-fluid w-100 h-100">
            <div class="home-banner-content">
                <div class="container">
                    <h1 class="py-4">{{__("Empowering young people’s entrepreneurship skills")}}</h1>
                    <div class="home-banner-content-border"></div>
                </div>
            </div>
        </div>
        <div class="what-we-do">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-6 col-12 left-column mt-5">
                        <h2 class="home-section-title">{{__("What we do")}}</h2>
                        <p>{{__("The aim of the Promovent Project is to empower young people’s participation in
                            entrepreneurship connecting the latter with the analogous challenge felt in participating
                            European countries. The project provides young people with the knowledge, skills and
                            motivation to plan and execute entrepreneurship activities and encourage entrepreneurial
                            success. In the framework of the project several training events, workshops and youth
                            exchanges are organized.")}}</p>
                        <a href="{{route('about')}}">{{__("See more")}}</a>
                    </div>
                    <div class="col-md-5 col-12 right-column mt-5">
                        <h5 class="text-left">{{__("The project is executed in")}}</h5>
                        <img src="/images/flags.png" alt="" class="my-4 img-fluid w-100">
                        <p class="text-right">{{__("funded by")}} Erasmus+</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="activities">
            <div class="container">
                <h2 class="home-section-title mb-4">{{__("Activities")}}</h2>
                <div class="row">
                    @foreach($activities as $activity)
                    <div class="col-md-4 col-12 item">
                        <div class="position-relative">
                            <a href="{{route('activity.show', $activity->slug)}}">
                                <img src="{{$activity->thumb_image}}" alt="{{$activity->currentMl->name}}" class="img-fluid w-100">
                                <h4>{{$activity->currentMl->name}}</h4>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a href="{{route('activities')}}" class="see-all">{{__("See All")}}</a>
            </div>
        </div>

        <div class="materials-section">
            <div class="container">
                <div class="col-md-6 col-12 p-0 mt-5">
                    <h1 class="page-title">{{__("Materials")}}</h1>
                </div>
                <hr class="page-header-line">
                <div class="row block-list materials px-3">

                    <!-- start loop item -->
                    @foreach($materials as $material)
                        <div class="col-md-4 col-12 mb-4">
                            <div class="item p-4">
                                <h3>{{$material->currentMl->name}}</h3>
                                <p class="desc">{{$material->currentMl->text}}</p>
                                <h5>{{__("Language")}}</h5>

                                <div class="language">
                                    @foreach(\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getSupportedLocales() as $key => $value)
                                        <span class="@if($loop->first) active @endif material_language_item"  @if($loop->index > 2) style="display: none" @endif
                                              data-material_id="{{$material->id}}" data-lang="{{$key}}">{{strtoupper($key)}}</span>
                                        @if($loop->index == 2)
                                            <span class="plus_span" style="padding: 6px">+4</span>
                                        @endif
                                    @endforeach
                                </div>
                                <a href="{{route('materials.show', ['material' => $material->id, 'lng_code' => 'en'])}}">{{__("Download File")}}</a>
                            </div>
                        </div>
                    @endforeach
                    <!-- end loop item -->

                </div>
                <a href="{{route('materials')}}" class="see-all">{{__("See All")}}</a>
            </div>
        </div>

        <div class="partners">
            <div class="container">
                <div class="col-md-6 col-12 p-0 mt-5">
                    <h1 class="page-title">{{__("Our Partners")}}</h1>
                </div>
                <hr class="page-header-line mb-5">
                <div class="row block-list partners-carousel px-3 py-4">

                    <!-- start loop item -->
                    @foreach($partners as $partner)
                        <div class="col-md-4 col-12 py-5 bg-white">
                            <div class="partner-item bg-white p-4 px-5">
                                <div class="quote-symbol">
                                    <svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.25423 0.0181247C8.04669 -0.156181 7.18646 0.989987 7.35194 2.19876L7.46579 3.03035C7.56839 3.77985 8.27836 4.27743 9.01007 4.46945C9.45313 4.58573 9.86894 4.78813 10.2338 5.0651C10.5986 5.34207 10.9053 5.68819 11.1364 6.08369C11.3675 6.4792 11.5184 6.91634 11.5805 7.37017C11.6426 7.824 11.6148 8.28561 11.4985 8.72867C11.4744 8.82028 11.4467 8.91072 11.4154 8.99979H3.53162C1.9438 8.99979 0.656616 10.287 0.656616 11.8748V19.0623C0.656616 20.6501 1.9438 21.9373 3.53162 21.9373H12.1566C13.7444 21.9373 15.0316 20.6501 15.0316 19.0623V11.8748C15.0316 11.8161 15.0299 11.7579 15.0264 11.7001C15.3513 11.1187 15.6022 10.4972 15.772 9.85017C16.0355 8.84592 16.0987 7.79958 15.9579 6.77091C15.817 5.74224 15.475 4.75139 14.9512 3.85491C14.4275 2.95844 13.7323 2.1739 12.9053 1.5461C12.0783 0.918297 11.1358 0.459525 10.1316 0.195975C9.84214 0.120018 9.54922 0.0607063 9.25423 0.0181247Z" fill="#153180"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M27.9417 0.0181247C26.7342 -0.156181 25.874 0.989987 26.0394 2.19876L26.1533 3.03035C26.2559 3.77985 26.9659 4.27743 27.6976 4.46945C28.1406 4.58573 28.5564 4.78813 28.9213 5.0651C29.2861 5.34207 29.5928 5.68819 29.8239 6.08369C30.055 6.4792 30.2059 6.91634 30.268 7.37017C30.3301 7.824 30.3023 8.28561 30.186 8.72867C30.1619 8.82028 30.1342 8.91072 30.1029 8.99979H22.2191C20.6313 8.99979 19.3441 10.287 19.3441 11.8748V19.0623C19.3441 20.6501 20.6313 21.9373 22.2191 21.9373H30.8441C32.4319 21.9373 33.7191 20.6501 33.7191 19.0623V11.8748C33.7191 11.8161 33.7174 11.7579 33.7139 11.7001C34.0388 11.1187 34.2897 10.4972 34.4595 9.85017C34.723 8.84592 34.7862 7.79958 34.6454 6.77091C34.5045 5.74224 34.1625 4.75139 33.6387 3.85491C33.115 2.95844 32.4198 2.1739 31.5928 1.5461C30.7658 0.918297 29.8233 0.459525 28.8191 0.195975C28.5296 0.120018 28.2367 0.0607063 27.9417 0.0181247Z" fill="#153180"/>
                                    </svg>
                                </div>
                                <p class="desc">{{$partner->currentMl->text}}</p>
                                <img src="{{$partner->thumb_image}}" alt="" class="img-fluid mx-auto d-block">
                                <div class="shape-block">
                                    <img src="/images/partner-item-shape.png" alt="" class="img-fluid shape-img w-100">
                                    <div class="shape-block-inner">
                                        <h4>{{$partner->currentMl->name}}</h4>
                                        <a href="{{$partner->website}}" target="_blank">
                                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.00876 0.276367C4.49953 0.276367 0.844604 3.93238 0.844604 8.44095C0.844604 12.9497 4.49953 16.6047 9.00876 16.6047C13.518 16.6047 17.1729 12.9497 17.1729 8.44095C17.1729 3.93238 13.518 0.276367 9.00876 0.276367ZM3.10814 9.52232H4.36041C4.56994 11.1 5.23808 12.5814 6.28193 13.7827C4.64888 12.9458 3.44842 11.3831 3.10814 9.52232ZM4.36041 7.3585H3.10814C3.44864 5.49794 4.6491 3.93521 6.28215 3.09833C5.23828 4.2996 4.57006 5.78092 4.36041 7.3585ZM7.92673 12.3722C7.22109 11.5629 6.74633 10.5786 6.55233 9.52254H7.92673V12.3722ZM7.92673 7.3585H6.55233C6.74643 6.30256 7.22117 5.31834 7.92673 4.5091V7.3585ZM14.9092 7.3585H13.6571C13.4476 5.78103 12.7795 4.2998 11.7358 3.09855C13.3684 3.93565 14.5689 5.49838 14.9092 7.3585ZM10.0908 12.3717V9.52232H11.4652C11.2709 10.5782 10.7962 11.5624 10.0908 12.3717ZM10.0908 7.3585V4.50888C10.7964 5.31814 11.2712 6.30246 11.4652 7.3585H10.0908ZM11.7351 13.7829C12.7792 12.5816 13.4475 11.1001 13.6571 9.52232H14.9094C14.5691 11.3833 13.3684 12.946 11.7351 13.7829Z" fill="white"/>
                                            </svg>
                                        </a>
                                        <a href="{{$partner->facebook}}" target="_blank">
                                            <svg width="8" height="15" viewBox="0 0 8 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.13272 14.6976V7.88723H0.331909V5.43515H2.13272V3.34076C2.13272 1.69497 3.19647 0.183594 5.64758 0.183594C6.63999 0.183594 7.37383 0.278733 7.37383 0.278733L7.31601 2.56856C7.31601 2.56856 6.56761 2.56127 5.75092 2.56127C4.86701 2.56127 4.7254 2.96861 4.7254 3.64469V5.43515H7.38627L7.27049 7.88723H4.7254V14.6976H2.13272Z" fill="white"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- end loop item -->

                </div>
                <a href="{{route('partners')}}" class="see-all mt-5">{{__("See All")}}</a>
            </div>
        </div>
    </div>
@endsection
