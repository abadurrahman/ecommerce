@extends('layouts.app')
@section('content')
<!-- banner -->
<div class="page-head">
	<div class="container">
		<h3>Single</h3>
	</div>
</div>
<!-- //banner -->

<!-- single -->
<div class="single">
	<div class="container">
		<div class="col-md-6 single-right-left animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
			<div class="grid images_3_of_2">
				<div class="flexslider">
					<!-- FlexSlider -->
						<script>
						// Can also be used with $(document).ready()
							$(window).load(function() {
								$('.flexslider').flexslider({
								animation: "slide",
								controlNav: "thumbnails"
								});
							});
						</script>
					<!-- //FlexSlider-->
					<ul class="slides">
						<li  data-thumb="{{asset($product->image_one)}}">
							<div class="thumb-image"> <img src="{{asset($product->image_one)}}" data-imagezoom="true" class="img-responsive"> </div>
						</li>
						<li data-thumb="{{asset($product->image_two)}}">
							<div class="thumb-image"> <img src="{{asset($product->image_two)}}" data-imagezoom="true" class="img-responsive"> </div>
						</li>	
						<li data-thumb="{{asset($product->image_three)}}">
							<div class="thumb-image"> <img src="{{asset($product->image_three)}}" data-imagezoom="true" class="img-responsive"> </div>
						</li>
						<li data-thumb="{{asset($product->image_four)}}">
							<div class="thumb-image"> <img src="{{asset($product->image_four)}}" data-imagezoom="true" class="img-responsive"> </div>
						</li>	
					</ul>
					<div class="clearfix"></div>
				</div>	
			</div>
		</div>
		<div class="col-md-6 single-right-left simpleCart_shelfItem animated wow slideInRight animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">
			<div class="product_category">{{ $product->category_name }} / {{ $product->subcategory_name }}</div>
			<br>
					<h3>{{$product->product_name}}</h3>
					<p><span class="item_price">$550</span> <del>- $900</del></p>
					<div class="rating1">
						<span class="starRating">

							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							
						</span>
					</div>
					<div class="description">
						<h5>Check delivery, payment options and charges at your location</h5>
						<input type="text" value="Enter pincode" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter pincode';}" required="">
						<input type="submit" value="Check">
					</div>
					
				 <form action="{{ url('cart/product/add/'.$product->id) }}" method="post">
				 	@csrf
					<div class="row">
						<div class="color-quality col-md-4">
						<div class="color-quality-right">
							<h5>Quality :</h5>
							<input class="form-control" type="number" pattern="[0-9]*" value="1" name="qty">
						</div>
					</div>
					@if($product->product_color == NULL)
					@else
					<div class="color-quality col-md-4">
						<div class="color-quality-right">
							<h5>Color :</h5>
							<select id="country1" onchange="change_country(this.value)" class="frm-field required sect" name="color">

								@foreach($product_color as $color)
								 <option value="{{ $color }}">{{ $color }}</option>
								@endforeach
																
							</select>
						</div>
					</div>
					@endif
					@if($product->product_size == NULL)
					@else
					<div class="color-quality col-md-4">
						<div class="color-quality-right">
							<h5>Size :</h5>
							<select id="country1" onchange="change_country(this.value)" class="frm-field required sect" name="size">
								@foreach($product_size as $size)
								 <option value="{{ $size }}">{{ $size }}</option>
								@endforeach							
							</select>
						</div>
					</div>
					@endif
					</div>
					<div class="occasional">
						<h5>Types :</h5>
						<div class="colr ert">
							<label class="radio"><input type="radio" name="radio" checked=""><i></i>Casual Shoes</label>
						</div>
						<div class="colr">
							<label class="radio"><input type="radio" name="radio"><i></i>Sports Shoes</label>
						</div>
						<div class="colr">
							<label class="radio"><input type="radio" name="radio"><i></i>Formal Shoes</label>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="occasion-cart">
					<a href="" class="item_add hvr-outline-out button2">Add to cart</a>
					</div>
					<br>
								
					<div class="sharethis-inline-share-buttons"></div>
    		       </div>
    		      </form>

				<div class="clearfix"> </div>

				<div class="bootstrap-tab animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
							<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Reviews or Comments</a></li>
							<li role="presentation" class="dropdown">
								<a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown" aria-controls="myTabDrop1-contents">video/link <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
									<li><a href="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">cleanse</a></li>
									
								</ul>
							</li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
								<h5>Product Brief Description</h5>
								<p>{{$product->product_details}}</p>
							</div>
							<div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile" aria-labelledby="profile-tab">
								<div class="fb-comments" data-href="{{Request::url()}}" data-numposts="8" data-width=""></div>
							</div>
							<div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="dropdown1" aria-labelledby="dropdown1-tab">
								<p>{{$product->video_link}}</p>
							</div>
							
						</div>
					</div>
				</div>
	</div>
</div>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0"></script>
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5eddc1d7c99ea3001204074d&product=inline-share-buttons&cms=sop' async='async'></script>
@endsection