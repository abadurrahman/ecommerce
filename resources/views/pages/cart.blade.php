@extends('layouts.app')
@section('content')



<!-- check out -->
<div class="checkout">
	<div class="container">
		<h3>My Shopping Bag</h3>
		<div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
			<table class="timetable_sub">
				<thead>
					<tr>
						<th>Remove</th>
						<th>Product</th>
						<th>Quantity</th>
						<th>Product Name</th>
						<th>color</th>
						<th>size</th>
						<th>Price</th>
					</tr>
				</thead>
				@foreach($cart as $row)
					<tr class="rem1">
						<td class="invert-closeb">

							<a href="{{ url('remove/cart/'.$row->rowId) }}" class="btn btn-sm btn-danger">X</a>
							
			
						</td>
						<td class="invert-image"><a href="single.html"><img style="width: 120px" src="{{asset($row->options->image)}}" alt=" " class="img-responsive" /></a></td>
                       <td>
					    <form method="post" action="{{ route('update.cartitem') }}">
												@csrf
												<input type="hidden" name="productid" value="{{ $row->rowId }}">	
											<input type="number" name="qty" value="{{ $row->qty }}" style="width: 50px; height: 30px;">
											  <button type="submit" class="btn btn-danger btn-sm" style="width: 50px; height: 30px;">click</button>
										   </form>
                                    </td>
						<td class="invert">{{$row->name}}</td>
						<td class="invert">{{$row->options->color}}</td>
						<td class="invert">{{$row->options->size}}</td>
						<td class="invert">{{$row->price*$row->qty}}</td>
					</tr>
					@endforeach
					
								<!--quantity-->
									<script>
									$('.value-plus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
									});

									$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
									});
									</script>
								<!--quantity-->
			</table>
		</div>
		<br>
		<div class="cart_buttons">
							<button type="button" class="button cart_button_clear">All Cancel</button>
							<a href="{{ url('user/checkout') }}" class="button cart_button_checkout">Checkout</a>
						</div>
		
		<div class="checkout-left">	
				
				<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
					<a href="{{url('/')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
				</div>
				<div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
					<h4>Shopping basket</h4>
					<ul>
						@foreach($cart as $row)
						<li>{{$row->name}}<i>-</i> <span>{{$row->price*$row->qty}}</span></li>
						@endforeach
						<li>Total <i>-</i> <span>${{Cart::Subtotal()}}</span></li>
					</ul>
				</div>
				<div class="clearfix"> </div>

			</div>

	</div>
</div>	
<!-- //check out -->

@endsection