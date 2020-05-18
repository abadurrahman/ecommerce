
@php  
  $category=DB::table('categories')->get();
@endphp

<!-- banner -->
<div class="ban-top">
    <div class="container">
        <div class="top_nav_left">
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav menu__list">
                    <li class="active menu__item menu__item--current"><a class="menu__link" href="index.html">Home <span class="sr-only">(current)</span></a></li>
                    @foreach( $category as $cat)
                    <li class="dropdown menu__item">
                        <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $cat->category_name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu multi-column columns-3">
                                <div class="row">
                                    <div class="col-sm-6 multi-gd-img1 multi-gd-text ">
                                        <a href="mens.html"><img src="{{asset('public/frontend/images/woo1.jpg')}}" alt=" "/></a>
                                    </div>
                                    <div class="col-sm-3 multi-gd-img">
                                        <ul class="multi-column-dropdown">
                                            @php  
                                                $subcategory=DB::table('subcategories')->where('category_id',$cat->id)->get();
                                            @endphp

                                            @foreach($subcategory as $row)
                                            <li><a href="mens.html">{{  $row->subcategory_name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                </div>
                            </ul>
                    </li>
                    @endforeach  
                    
                    <li class=" menu__item"><a class="menu__link" href="electronics.html">Electronics</a></li>
                    <li class=" menu__item"><a class="menu__link" href="codes.html">Short Codes</a></li>
                    <li class=" menu__item"><a class="menu__link" href="contact.html">contact</a></li>
                  </ul>
                </div>
              </div>
            </nav>  
        </div>
        <div class="top_nav_right">
            <div class="cart box_1">
                        <a href="checkout.html">
                            <h3> <div class="total">
                                <i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
                                <span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> {{ Cart::count() }})</div>
                                
                            </h3>
                        </a>
                        <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a>
                    </p>  
               </div>  
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- //banner-top -->
   
@php 
    $main_one=DB::table('sliders')->where('main_slider_one',1)->orderBy('id','DESC')->first();
    $main_two=DB::table('sliders')->where('main_slider_two',1)->orderBy('id','DESC')->first();
@endphp

<!-- banner -->
<div class="banner-grid">
    <div id="visual">
            <div class="slide-visual">
                <!-- Slide Image Area (1000 x 424) -->
                <ul class="slide-group">
                    <li><img style="height: 600px; width: 1000px;"  class="img-responsive" src="{{asset($main_one->image_one)}}" alt="Dummy Image" /></li>
                    <li><img style="height: 600px; width: 1000px;" class="img-responsive" src="{{asset($main_one->image_two)}}" alt="Dummy Image" /></li>
                    <li><img style="height: 600px; width: 1000px;" class="img-responsive" src="{{asset($main_one->image_three)}}" alt="Dummy Image" /></li>
                </ul>

                <!-- Slide Description Image Area (316 x 328) -->
                <div class="script-wrap">
                    <ul class="script-group">
                        <li><div class="inner-script"><img style="height: 285px; width: 276px;" class="img-responsive" src="{{asset($main_two->image_one)}}" alt="Dummy Image" /></div></li>
                        <li><div class="inner-script"><img style="height: 285px; width: 276px;" class="img-responsive" src="{{asset('public/frontend/images/baa2.jpg')}}" alt="Dummy Image" /></div></li>
                        <li><div class="inner-script"><img style="height: 285px; width: 276px;" class="img-responsive" src="{{asset('public/frontend/images/baa3.jpg')}}" alt="Dummy Image" /></div></li>
                    </ul>
                    <div class="slide-controller">
                        <a href="#" class="btn-prev"><img src="{{asset('public/frontend/images/btn_prev.png')}}" alt="Prev Slide" /></a>
                        <a href="#" class="btn-play"><img src="{{asset('public/frontend/images/btn_play.png')}}" alt="Start Slide" /></a>
                        <a href="#" class="btn-pause"><img src="{{asset('public/frontend/images/btn_pause.png')}}" alt="Pause Slide" /></a>
                        <a href="#" class="btn-next"><img src="{{asset('public/frontend/images/btn_next.png')}}" alt="Next Slide" /></a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    <script type="text/javascript" src="{{asset('public/frontend/js/pignose.layerslider.js')}}"></script>
    <script type="text/javascript">
    //<![CDATA[
        $(window).load(function() {
            $('#visual').pignoseLayerSlider({
                play    : '.btn-play',
                pause   : '.btn-pause',
                next    : '.btn-next',
                prev    : '.btn-prev'
            });
        });
    //]]>
    </script>

</div>
<!-- //banner -->