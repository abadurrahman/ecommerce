@extends('layouts.app')
@section('content')




<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/onetech/styles/bootstrap4/bootstrap.min.css') }}">
<link href="{{ asset('public/frontend/onetech/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/onetech/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/onetech/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/onetech/plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/onetech/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/onetech/styles/shop_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/onetech/styles/shop_responsive.css') }}">

<script src="https://js.stripe.com/v3/"></script>


<div class="super_container">


	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Categories</div>
							<ul class="sidebar_categories">
								<li><a href="#">Computers & Laptops</a></li>
								<li><a href="#">Cameras & Photos</a></li>
								<li><a href="#">Hardware</a></li>
								<li><a href="#">Smartphones & Tablets</a></li>
								<li><a href="#">TV & Audio</a></li>
								<li><a href="#">Gadgets</a></li>
								<li><a href="#">Car Electronics</a></li>
								<li><a href="#">Video Games & Consoles</a></li>
								<li><a href="#">Accessories</a></li>
							</ul>
						</div>
						
						
						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">Brands</div>
							<ul class="brands_list">
								@foreach($brands as $row)
								<li class="brand"><a href="#">{{ $row->brand_name}}</a></li>
								@endforeach
							</ul>
						</div>
					</div>

				</div>

				<div class="col-lg-9">


					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count"><span>186</span> products found</div>
							<div class="shop_sorting">
								<span>Sort by:</span>
								<ul>
									<li>
										<span class="sorting_text">highest rated<i class="fas fa-chevron-down"></i></span>
										<ul>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
											<li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>

						<div class="product_grid row">
							<div class="product_grid_border"></div>

							@foreach($products as $pro)
							<div class="product_item is_new ">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset($pro->image_one) }}" style="height: 100px; width: 100px;"></div>
								<div class="product_content">

									@if($pro->discount_price == NULL)
									    <br><span class="text-danger"><b> ${{ $pro->selling_price }} </b></span>
									@else
									 <div class="product_price discount">${{ $pro->discount_price }}<span>${{ $pro->selling_price }}</span></div>
									@endif
									{{-- <div class="product_price">$225</div> --}}


									<div class="product_name"><div><a href="{{ url('product/details/'.$pro->id.'/'.$pro->product_name) }}" tabindex="0">{{ $pro->product_name }}</a></div></div>
								</div>
						

								<ul class="product_marks">
									 @if($pro->discount_price == NULL)
									         <li class="product_mark product_new" style="background: blue;">New</li>
									         @else
									        @php
									        $amount=$pro->selling_price - $pro->discount_price;
									        $discount=$amount/$pro->selling_price * 100;
									        @endphp 
									         <li class="product_mark product_new" style="background: red;">
									       
									       {{ intval($discount) }}%
									        </li>
									@endif

								</ul>
							</div>
							@endforeach



						</div>

						Shop Page Navigation

						<div class="shop_page_nav d-flex flex-row">
							<div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>
							 {{   $products->links() }}
							<div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
</div>

	

<script src="{{ asset('public/frontend/onetech/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('public/frontend/onetech/styles/bootstrap4/popper.jss') }}"></script>
<script src="{{ asset('public/frontend/onetech/styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/frontend/onetech/plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('public/frontend/onetech/plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('public/frontend/onetech/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('public/frontend/onetech/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('public/frontend/onetech/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('public/frontend/onetech/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('public/frontend/onetech/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('public/frontend/onetech/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('public/frontend/onetech/plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
<script src="{{ asset('public/frontend/onetech/plugins/parallax-js-master/parallax.min.js') }}"></script>
<script src="{{ asset('public/frontend/onetech/js/shop_custom.js') }}"></script>


@endsection
