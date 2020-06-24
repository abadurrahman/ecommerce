@extends('layouts.app')
@section('content')

@php 
    $product_one=DB::table('electronics')->where('product_one',1)->orderBy('id','DESC')->first();
    $product_two=DB::table('electronics')->where('product_two',1)->orderBy('id','DESC')->first();
    $product_three=DB::table('electronics')->where('product_three',1)->orderBy('id','DESC')->first();
    $product_four=DB::table('electronics')->where('product_four',1)->orderBy('id','DESC')->first();
    $latest_product=DB::table('electronics')->where('latest_product',1)->where('status',1)->orderBy('id','DESC')->get();

 
    
@endphp

<div class="page-head">
	<div class="container">
		<h3>Electronics</h3>
	</div>
</div>
<!-- //banner -->
<!-- Electronics -->
<div class="electronics">
	<div class="container">
		<div class="col-md-8 electro-left text-center">
			<div class="electro-img-left mask">
				<div class="content-grid-effect slow-zoom vertical">
					<div class="img-box"><img style="width:600px; height: 250px; " src="{{asset($product_one->image_one)}}" alt="image" class="img-responsive zoom-img"></div>
						<div class="info-box">
							<div class="info-content electro-text simpleCart_shelfItem">
								<h4>Branded Watches</h4>
								<span class="separator"></span>
								<div class="info-product-price">
										 @if($product_one->discount_price == NULL)
                                        <span class="item_price">${{$product_one->selling_price}}</span>
                                    @else
                                     <div class="info-product-price">
                                        <span class="item_price">${{$product_one->discount_price}}</span>
                                        <del>${{$product_one->selling_price}}</del>
                                    </div>
                                    @endif
									</div>
								<span class="separator"></span>
								<a href="#" id="{{ $product_one->id }}" class="product_cart_button item_add single-item hvr-outline-out button2 addcart" data-toggle="modal" data-target="#cartmodal"  onclick="productview(this.id)">Add to cart</a>
							</div>
						</div>
				</div>
			</div>
			<div class="electro-img-btm-left mask">
				<div class="content-grid-effect slow-zoom vertical">
					<div class="img-box"><img style="width:300px; height: 250px; " src="{{asset($product_two->image_one)}}" alt="image" class="img-responsive zoom-img"></div>
						<div class="info-box">
							<div class="info-content electro-text simpleCart_shelfItem">
								<h4>Mobiles</h4>
								<span class="separator"></span>
								<div class="info-product-price">
										 @if($product_two->discount_price == NULL)
                                        <span class="item_price">${{$product_two->selling_price}}</span>
                                    @else
                                     <div class="info-product-price">
                                        <span class="item_price">${{$product_two->discount_price}}</span>
                                        <del>${{$product_two->selling_price}}</del>
                                    </div>
                                    @endif
									</div>
								<span class="separator"></span>
								<a href="#" id="{{ $product_two->id }}" class="product_cart_button item_add single-item hvr-outline-out button2 addcart" data-toggle="modal" data-target="#cartmodal"  onclick="productview(this.id)">Add to cart</a>
							</div>
						</div>
				</div>
			</div>
			<div class="electro-img-btm-right mask">
				<div class="content-grid-effect slow-zoom vertical">
					<div class="img-box"><img style="width:300px; height: 250px; " src="{{asset($product_three->image_one)}}" alt="image" class="img-responsive zoom-img"></div>
						<div class="info-box">
							<div class="info-content electro-text simpleCart_shelfItem">
								<h4>Branded Watches</h4>
								<span class="separator"></span>
								<div class="info-product-price">
										 @if($product_three->discount_price == NULL)
                                        <span class="item_price">${{$product_three->selling_price}}</span>
                                    @else
                                     <div class="info-product-price">
                                        <span class="item_price">${{$product_three->discount_price}}</span>
                                        <del>${{$product_three->selling_price}}</del>
                                    </div>
                                    @endif
									</div>
								<span class="separator"></span>
								<a href="#" id="{{ $product_three->id }}" class="product_cart_button item_add single-item hvr-outline-out button2 addcart" data-toggle="modal" data-target="#cartmodal"  onclick="productview(this.id)">Add to cart</a>
							</div>
						</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="col-md-4 electro-right text-center">
			<div class="electro-img-rt mask">
				<div class="content-grid-effect slow-zoom vertical">
					<div class="img-box"><img style="width:300px; height: 520px; " src="{{asset($product_four->image_one)}}" alt="image" class="img-responsive zoom-img"></div>
						<div class="info-box">
							<div class="info-content electro-text simpleCart_shelfItem">
								<h4>Mobiles</h4>
								<span class="separator"></span>
								<div class="info-product-price">
									@if($product_three->discount_price == NULL)
                                        <span class="item_price">${{$product_three->selling_price}}</span>
                                    @else
                                     <div class="info-product-price">
                                        <span class="item_price">${{$product_three->discount_price}}</span>
                                        <del>${{$product_three->selling_price}}</del>
                                    </div>
                                    @endif
									</div>
								<span class="separator"></span>
								<a href="#" id="{{ $product_four->id }}" class="product_cart_button item_add single-item hvr-outline-out button2 addcart" data-toggle="modal" data-target="#cartmodal"  onclick="productview(this.id)">Add to cart</a>
							</div>
						</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
			<div class="ele-bottom-grid">
				<h3><span>Latest </span>Collections</h3>
				<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>

				 @foreach($latest_product as $row)
					<div class="col-md-3 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="{{asset($row->image_one)}}" alt="" class="pro-image-front">
									<img src="{{asset($row->image_one)}}" alt="" class="pro-image-back">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}" class="link-product-add-cart">Quick View</a>

											</div>
										</div>
										
                                     @if($row->discount_price == NULL)
                                     <span class="product-new-top">New</span>
                                       
                                    @else
                                    
                                     @php
                                      $amount=$row->selling_price - $row->discount_price;
                                      $discount=$amount/$row->selling_price * 100;
                                     @endphp 
                                                 
                                      <span style="background: #441235; none repeat scroll 0 0; color: #fff; display: inline-block; right: 0; padding: 0 10px 1px; position: absolute; text-transform: lowercase; top: 0; z-index: 10;"> 
                                      {{ intval($discount) }}%</span>
                                    @endif
										
								</div>
								<div class="item-info-product ">
									<h4><a href="single.html">{{$row->product_name}}</a></h4>
									<div class="info-product-price">
										 @if($row->discount_price == NULL)
                                        <span class="item_price">${{$row->selling_price}}</span>
                                    @else
                                     <div class="info-product-price">
                                        <span class="item_price">${{$row->discount_price}}</span>
                                        <del>${{$row->selling_price}}</del>
                                    </div>
                                    @endif
									</div>
									<a href="#" id="{{ $row->id }}" class="product_cart_button item_add single-item hvr-outline-out button2 addcart" data-toggle="modal" data-target="#cartmodal"  onclick="productview(this.id)">Add to cart</a>									
								</div>
							</div>
						</div>
					 @endforeach

						<div class="clearfix"></div>
			</div>
	</div>
</div>
<!-- //Electronics -->


<!--product cart add modal-->

<!-- Modal -->
<div class="modal fade " id="cartmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Product Short Description</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
          <div class="col-md-4">
              <div class="card" style="width: 16rem;">
              <img src="" class="card-img-top" id="pimage" style="height: 240px;">
              <div class="card-body">
               
              </div>
            </div>
          </div>
          <div class="col-md-4 ml-auto">
              <ul class="list-group">
                <li class="list-group-item"> <h5 class="card-title" id="pname"></h5></span></li>
             <li class="list-group-item">Product code: <span id="pcode"> </span></li>
              <li class="list-group-item">Category:  <span id="pcat"> </span></li>
              <li class="list-group-item">SubCategory:  <span id="psubcat"> </span></li>
              <li class="list-group-item">Brand: <span id="pbrand"> </span></li>
              <li class="list-group-item">Stock: <span class="badge " style="background: green; color:white;">Available</span></li>
            </ul>
          </div>
          <div class="col-md-4 ">
               <form action="{{ route('insert.into.cart') }}" method="post">
                @csrf
                <input type="hidden" name="product_id" id="product_id">
                <div class="form-group" id="colordiv">
                  <label for="">Color</label>
                  <select name="color" class="form-control">
                  </select>
                </div>
                 <div class="form-group" id="sizediv" >
                  <label for="exampleInputEmail1">Size</label>
                  <select name="size" class="form-control" id="size">
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Quantity</label>
                  <input type="number" class="form-control" value="1" name="qty">
                </div>
                <button type="submit" class="btn btn-primary">Add To Cart</button>
              </form>
           </div>
         </div>
      </div>  
    </div>
  </div>
</div>

<!--modal end-->

<script type="text/javascript">
    function productview(id){
          $.ajax({
                     url: "{{  url('/cart/electronic/view/') }}/"+id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                       $('#pname').text(data.product.product_name);
                       $('#pimage').attr('src',data.product.image_one);
                       $('#pcat').text(data.product.category_name);
                       $('#psubcat').text(data.product.subcategory_name);
                       $('#pbrand').text(data.product.brand_name);
                       $('#pcode').text(data.product.product_code);
                       $('#product_id').val(data.product.id);

                        var d =$('select[name="size"]').empty();
                         $.each(data.size, function(key, value){
                             $('select[name="size"]').append('<option value="'+ value +'">' + value + '</option>');
                              if (data.size == "") {
                                     $('#sizediv').hide();   
                              }else{
                                    $('#sizediv').show();
                              } 
                         });

                        var d =$('select[name="color"]').empty();
                         $.each(data.color, function(key, value){
                             $('select[name="color"]').append('<option value="'+ value +'">' + value + '</option>');
                               if (data.color == "") {
                                     $('#colordiv').hide();
                              } else{
                                   $('#colordiv').show();
                              }
                         });
             }
      })
    }
</script>



<!-- <script type="text/javascript">
      $(document).ready(function() {
            $('.addcart').on('click', function(){  
              var id = $(this).data('id');
              if(id) {
                 $.ajax({
                     url: "{{  url('/add/to/cart/') }}/"+id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                       const Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',
                          showConfirmButton: false,
                          timer: 3000
                        })

                       if($.isEmptyObject(data.error)){
                            Toast.fire({
                              type: 'success',
                              title: data.success
                            })
                       }else{
                             Toast.fire({
                                type: 'error',
                                title: data.error
                            })
                       }

                     },
                    
                 });
             } else {
                 alert('danger');
             }
              e.preventDefault();
         });
     });

</script> -->

@endsection