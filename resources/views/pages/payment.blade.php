@extends('layouts.app')
@section('content')

@php  
	$setting=DB::table('cartsettings')->first();
	$charge=$setting->shipping_charge;

@endphp

    <link href="{{asset('public/alada/set/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/alada/set/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/alada/set/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/alada/set/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/alada/set/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/alada/set/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/alada/set/css/responsive.css')}}" rel="stylesheet">

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{url('/')}}">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Step1</h2>
			</div>
			<div class="checkout-options">
				<h3>New User</h3>
				<p>Checkout options</p>
				
			</div><!--/checkout-options-->
			<hr>

			
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Color</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td class="total">Remove</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($cart as $row)
						<tr>
							<td class="invert-image"><a href="single.html"><img style="width: 80px" src="{{asset($row->options->image)}}" alt=" " class="img-responsive" /></a></td>
							<td class="cart_description">
								<h4>{{$row->options->color}}</h4>
								
							</td>
							<td class="cart_price">
								<p>{{$row->price}}</p>
							</td>
							<td>
					    <form method="post" action="{{ route('update.cartitem') }}">
												@csrf
												<input type="hidden" name="productid" value="{{ $row->rowId }}">	
											<input type="number" name="qty" value="{{ $row->qty }}" style="width: 50px; height: 30px;">
											  <button type="submit" class="btn btn-danger btn-sm" style="width: 50px; height: 30px;">click</button>
										   </form>
                                    </td>
							<td class="cart_total">
								<p class="cart_total_price">{{$row->price*$row->qty}}</p>
							</td>
							<td class="invert-closeb">

							<a href="{{ url('remove/cart/'.$row->rowId) }}" class="btn btn-sm btn-danger">X</a>
							
			
						</td>
						</tr>
						@endforeach
						<tr>
							<td colspan="4">&nbsp;</td>


							<td colspan="2">
								<table class="table table-condensed total-result">
									<div class="order_total_content col-md-12" style="padding: 14px;">
					      	
					      	@if(Session::has('coupon'))
					      	@else
							     <h5>Apply Coupon</h5>
							     <form action="{{ route('apply.coupon') }}" method="post">
							     	@csrf
							     	 <div class="form-group col-lg-4">
	                                      <input type="text" class="form-control" name="coupon" required=""  aria-describedby="emailHelp" placeholder="Coupon Code">
	                                   </div>
	                                   <button type="submit" class="btn btn-danger ml-2">submit</button>
							     </form>
							    @endif
						   </div>
						   <div class="col-lg-4">
						   	 @if(Session::has('coupon'))
									<tr>
										<td>Cart Sub Total</td>
										<td> $ {{ Session::get('coupon')['balance'] }}</td>
									</tr>
									<li class="list-group-item">Coupon : ({{   Session::get('coupon')['name'] }}) <a href="{{ route('coupon.remove') }}" class="btn btn-danger btn-sm">x</a> <span style="float: right;"> $  {{ Session::get('coupon')['discount'] }} </span> </li>
									@else

									<tr>
										<td>Cart Sub Total</td>
										<td> $ {{ Cart::Subtotal() }}</td>
									</tr>
									@endif

									<tr>
										<td>Exo Tax</td>
										<td>$2</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>$ {{ $charge }}</td>										
									</tr>
									 @if(Session::has('coupon'))
									<tr>
										<td>Total</td>
										<td><span>$ {{ Session::get('coupon')['balance'] + $charge }}</span></td>
									</tr>
									  @else
									  <tr>
										<td>Total</td>
										<td><span>$ {{ Cart::Subtotal() + $charge }}</span></td>
									</tr>
									 @endif
						   </div>
								</table>
							</td>
						</tr>
						

					</tbody>
				</table>
				
			</div>

           <div class="shopper-informations">
				<div class="row">
					<div class="col-md-12">
						<div class="shopper-info">
							<p>Shipping Information</p>
							<form action="{{route('payment.process')}}" method="post">
								<input type="text" placeholder="Full Name" name="fullname">
								<input type="text" placeholder="Address" name="address">
								<input type="text" placeholder="City" name="city">
								<input type="text" placeholder="Phone" name="phone">
								<input type="text" placeholder="Email" name="email">
								<input type="password" placeholder="Password" name="password">
								<input type="password" placeholder="Confirm password" name="confirmpassword">
								<h3 class="contact_form_title text-center">Payment By</h3>
                           <div class="form-group">
                                <ul class="logos_list " >
                                            <li><input type="radio" name="payment" value="stripe">stripe</li>
                                            <li><input type="radio" name="payment" value="paypal">paypal</li>
                                             <li><input type="radio" name="payment" value="ideal">moli</li>
                                 </ul>
                            </div><br>
                            <div class="contact_form_button">
                                <button type="submit" class="btn btn-info">Pay Now</button>
                            </div>
							</form>
							<br><br>
							
						</div>
					</div>
					
				</div>
			</div>
			
	</section> <!--/#cart_items-->


	<script src="{{asset('public/alada/set/js/jquery.js')}}"></script>
	<script src="{{asset('public/alada/set/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/alada/set/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/alada/set/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/alada/set/js/main.js')}}"></script>
@endsection