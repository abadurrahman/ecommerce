@extends('layouts.app')
@section('content')

@php  
	$setting=DB::table('cartsettings')->first();
	$charge=$setting->shipping_charge;
    $cart=Cart::content();
@endphp

    <link href="{{asset('public/alada/set/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/alada/set/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/alada/set/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/alada/set/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/alada/set/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/alada/set/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/alada/set/css/responsive.css')}}" rel="stylesheet">
    
    <style type="text/css">
	/**
	 * The CSS shown here will not be introduced in the Quickstart guide, but shows
	 * how you can use CSS to style your Element's container.
	 */
	.StripeElement {
	  box-sizing: border-box;

	  height: 40px;
	  width: 100%;

	  padding: 10px 12px;

	  border: 1px solid transparent;
	  border-radius: 4px;
	  background-color: white;

	  box-shadow: 0 1px 3px 0 #e6ebf1;
	  -webkit-transition: box-shadow 150ms ease;
	  transition: box-shadow 150ms ease;
	}

	.StripeElement--focus {
	  box-shadow: 0 1px 3px 0 #cfd7df;
	}

	.StripeElement--invalid {
	  border-color: #fa755a;
	}

	.StripeElement--webkit-autofill {
	  background-color: #fefde5 !important;
	}
</style>

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
							<p>Pay Now</p>
							
							<form action="{{ route('stripe.charge') }}" method="post" id="payment-form">
								@csrf
							  <div class="form-row">
							    <label for="card-element">
							      Credit or debit card
							    </label>
							    <div id="card-element">
							      <!-- A Stripe Element will be inserted here. -->
							    </div>

							    <!-- Used to display form errors. -->
							    <div id="card-errors" role="alert"></div>
                          </div><br>
                        {{--   extra data --}}
                          <input type="hidden" name="shipping" value="{{ $charge }}">
                           <input type="hidden" name="vat" value="0">
                           <input type="hidden" name="total" value="{{ Cart::Subtotal() + $charge }}">
                             {{-- shipping details pass --}}
                         <input type="hidden" name="ship_name" value="{{ $data['name'] }}">
                         <input type="hidden" name="ship_email" value="{{ $data['email'] }}">
                         <input type="hidden" name="ship_phone" value="{{ $data['phone'] }}">
                         <input type="hidden" name="ship_address" value="{{ $data['address'] }}">
                         <input type="hidden" name="ship_city" value="{{ $data['city'] }}">
                         <input type="hidden" name="payment_type" value="{{ $data['payment'] }}">
                          <button class="btn btn-info">Pay Now</button>
							</form>
							<br><br>
							
						</div>
					</div>
					
				</div>
			</div>
			
	</section> <!--/#cart_items-->

    <script src="https://js.stripe.com/v3/"></script>
	<script src="{{asset('public/alada/set/js/jquery.js')}}"></script>
	<script src="{{asset('public/alada/set/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/alada/set/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/alada/set/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/alada/set/js/main.js')}}"></script>

    <script type="text/javascript">
	// Create a Stripe client.
// Create a Stripe client.
var stripe = Stripe('pk_test_qTGWUHaVzQ85OvpHBmiOtgDF00iv3BYLKa');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>
@endsection