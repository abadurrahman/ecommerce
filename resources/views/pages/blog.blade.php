@extends('layouts.app')
@section('content')


<link rel="shortcut icon" type="image/ico" href="{{asset('public/alada/blog/img/favicon.png')}}" />

 <!--====== FAVICON ICON =======-->
    <link rel="shortcut icon" type="image/ico" href="img/favicon.png" />

    <!--====== STYLESHEETS ======-->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/stellarnav.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!--====== MAIN STYLESHEETS ======-->
    <link href="style.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <script src="js/vendor/modernizr-2.8.3.min.js"></script>

    <!--====== STYLESHEETS ======-->
    <link rel="stylesheet" href="{{asset('public/alada/blog/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('public/alada/blog/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('public/alada/blog/css/stellarnav.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/alada/blog/css/owl.carousel.css')}}">
    <link href="{{asset('public/alada/blog/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/alada/blog/css/font-awesome.min.css')}}" rel="stylesheet">

    <!--====== MAIN STYLESHEETS ======-->
    <link href="{{asset('public/alada/blog/style.css')}}" rel="stylesheet">
    <link href="{{asset('public/alada/blog/css/responsive.css')}}" rel="stylesheet">

    <script src="{{asset('public/alada/blog/js/vendor/modernizr-2.8.3.min.js')}}"></script>


 @php 
   
    $main=DB::table('posts')->where('main',1)->orderBy('id','DESC')->get();
    $latest=DB::table('posts')->where('latest_offer',1)->orderBy('id','DESC')->get();
    
@endphp




    <!--BLOG AREA-->
    <section class="blog-area blog-page section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                    @foreach($main as $row)
                    <div class="single-blog wow fadeIn">
                        <div class="blog-image">
                            <img src="{{asset($row->post_image)}}" alt="">
                        </div>
                        <div class="blog-details">
                            <div class="blog-meta"><a href="#"><i class="fa fa-ship"></i></a></div>
                            <h3>@if(session()->get('lang') == 'bangla')
                                          {{ $row->post_title_bn }}
                                     @else
                                          {{ $row->post_title_en }}
                                     @endif</h3>
                            <div class="post-date"><a href="#"><i class="fa fa-calendar"></i>20 January, 2015</a></div>
                            <p>@if(session()->get('lang') == 'bangla')
                                          {{ $row->details_bn }}
                                     @else
                                          {{ $row->details_en }}
                                     @endif</p>
                            
                            <a href="" class="read-more"> @if(session()->get('lang') == 'bangla')
                                বিস্তারিত পড়ুন 
                            @else
                                Continue Reading
                            @endif</a>
                        </div>
                    </div>
                  @endforeach
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                    <div class="sidebar-area wow fadeIn">
                    	<div class="top_bar_menu">
                                <ul class="standard_dropdown ">
                                    @php 
                                        $language=session()->get('lang');
                                    @endphp
                                    <li>
                                        @if(session()->get('lang') == 'bangla')
                                        <a href="{{ route('language.english') }}">English<i class="fas fa-chevron-down"></i></a>
                                        @else
                                         <a href="{{ route('language.bangla') }}">Bangla<i class="fas fa-chevron-down"></i></a>
                                         @endif
                                        
                                    </li>
                             
                                </ul>
                            </div><br><br>
                        <div class="single-sidebar-widget widget_search">
                            <h4>Search</h4>
                            <form action="#">
                                <input type="text" name="s" id="s" placeholder="Search Here...">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>

                        <div class="single-sidebar-widget widget_categories">
                            <h4>Categories</h4>
                            <ul>
                                <li><a href="#">Road Freight</a></li>
                                <li><a href="#">Air Freight</a></li>
                                <li><a href="#">Sea Freight</a></li>
                                <li><a href="#">Ware House Freight</a></li>
                                <li><a href="#">Rail Freight</a></li>
                            </ul>
                        </div>


                        <div class="single-sidebar-widget widget_recent_entries">
                            <h4>Latest Post</h4>
                            <ul>
                                @foreach($latest as $lat)
                                <li>
                                    <div class="alignleft"><img style="height: 90px; width: 120px;" src="{{asset($lat->post_image)}}" alt=""></div>
                                    <a href="#">2016 Latest News From Logistics Transportation Service.</a>
                                </li>
                                @endforeach
                
                            </ul>
                        </div>
                        <div class="single-sidebar-widget widget_tag_cloud">
                            <h4>Pupular Tags</h4>
                            <div class="tagcloud">
                                <a href="#">Design</a>
                                <a href="#">Transport</a>
                                <a href="#">Cargo</a>
                                <a href="#">Freight</a>
                                <a href="#">Logistic</a>
                                <a href="#">Truck</a>
                                <a href="#">Shipping</a>
                                <a href="#">ware house</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <ul class="pagination">
                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--BLOG AREA END-->



     <!--====== SCRIPTS JS ======-->
    <script src="{{asset('public/alada/blog/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('public/alada/blog/js/vendor/bootstrap.min.js')}}"></script>

    <!--====== PLUGINS JS ======-->
    <script src="{{asset('public/alada/blog/js/vendor/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('public/alada/blog/js/vendor/jquery-migrate-1.2.1.min.js')}}"></script>
    <script src="{{asset('public/alada/blog/js/vendor/jquery.appear.js')}}"></script>
    <script src="{{asset('public/alada/blog/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/alada/blog/js/stellar.js')}}"></script>
    <script src="{{asset('public/alada/blog/js/wow.min.js')}}"></script>
    <script src="{{asset('public/alada/blog/js/stellarnav.min.js')}}"></script>
    <script src="{{asset('public/alada/blog/js/contact-form.js')}}"></script>
    <script src="{{asset('public/alada/blog/js/jquery.sticky.js')}}"></script>

    <!--===== ACTIVE JS=====-->
    <script src="{{asset('public/alada/blog/js/main.js')}}"></script>

@endsection