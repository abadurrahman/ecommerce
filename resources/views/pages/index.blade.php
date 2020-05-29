@extends('layouts.app')
@section('content')
@include('layouts.menubar')
    <!-- Characteristics -->
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
 
    <!-- content -->
<!-- content -->
@php 
    $new_one=DB::table('products')->where('newarrivals_one',1)->orderBy('id','DESC')->first();
    $new_two=DB::table('products')->where('newarrivals_two',1)->orderBy('id','DESC')->first();
    $new_three=DB::table('products')->where('newarrivals_three',1)->orderBy('id','DESC')->first();
    $new_four=DB::table('products')->where('newarrivals_four',1)->orderBy('id','DESC')->first();
    $new_five=DB::table('products')->where('newarrivals_five',1)->orderBy('id','DESC')->first();
    $latest=DB::table('products')->where('latest_design',1)->where('status',1)->orderBy('id','DESC')->get();
    $special=DB::table('products')->where('special_offer',1)->where('status',1)->orderBy('id','DESC')->get();
    $collection=DB::table('products')->where('collection',1)->where('status',1)->orderBy('id','DESC')->get();
    
@endphp

<div class="new_arrivals">
    <div class="container">
        <h3><span>new </span>arrivals</h3>
        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
        <div class="new_grids">
            <div class="col-md-4 new-gd-left">
                <img src="{{asset($new_one->image_one)}}" alt=" " />
                <div class="wed-brand simpleCart_shelfItem">
                    <h4>Wedding Collections</h4>
                    <h5>Flat 50% Discount</h5>
                 @if($new_one->discount_price == NULL)
                     <i>${{$new_one->selling_price}}</i>
                
                 @else
                 <p><i>${{$new_one->discount_price}}</i> <span class="item_price">${{$new_one->selling_price}}</span></p>
                 @endif
                    
                </div>
            </div>
            <div class="col-md-4 new-gd-middle">
                <div class="new-levis">
                    <div class="mid-img">
                        <img src="{{asset('public/frontend/images/levis1.png')}}" alt=" " />
                    </div>
                    <div class="mid-text">
                        <h4>up to 40% <span>off</span></h4>
                        <a class="hvr-outline-out button2" href="product.html">Shop now </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="new-levis">
                    <div class="mid-text">           
                                               
                        <h4>up to 50% <span>off</span></h4>
                        <a class="hvr-outline-out button2" href="product.html">Shop now </a>
                    </div>
                    <div class="mid-img">
                        <img src="{{asset('public/frontend/images/dig.jpg')}}" alt=" " />
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4 new-gd-left">
                <img src="{{asset($new_two->image_one)}}" alt=" " />
                <div class="wed-brandtwo simpleCart_shelfItem">
                    <h4>Spring / Summer</h4>
                    <p>Shop Men</p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- //content -->

<!-- content-bottom -->

<div class="content-bottom">
    <div class="col-md-7 content-lgrid">
        <div class="col-sm-6 content-img-left text-center">
            <div class="content-grid-effect slow-zoom vertical">
                <div class="img-box"><img src="{{asset('public/frontend/images/p1.jpg')}}" alt="image" class="img-responsive zoom-img"></div>
                    <div class="info-box">
                        <div class="info-content simpleCart_shelfItem">
                                    <h4>Mobiles</h4>
                                    <span class="separator"></span>
                                    <p><span class="item_price">${{$new_three->selling_price}}</span></p>
                                    <span class="separator"></span>
                                    <a class="item_add hvr-outline-out button2" href="#">add to cart </a>
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-sm-6 content-img-right">
            <h3>Special Offers and 50%<span>Discount On</span> Mobiles</h3>
        </div>
        
        <div class="col-sm-6 content-img-right">
            <h3>Buy 1 get 1  free on <span> Branded</span> Watches</h3>
        </div>
        <div class="col-sm-6 content-img-left text-center">
            <div class="content-grid-effect slow-zoom vertical">
                <div class="img-box"><img style="height: 240px; width:528px;" src="{{asset($new_four->image_one)}}" alt="image" class="img-responsive zoom-img"></div>
                    <div class="info-box">
                        <div class="info-content simpleCart_shelfItem">
                            <h4>Watches</h4>
                            <span class="separator"></span>
                            <p><span class="item_price">${{$new_four->selling_price}}</span></p>
                            <span class="separator"></span>
                            <a class="item_add hvr-outline-out button2" href="#">add to cart </a>
                        </div>
                    </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="col-md-5 content-rgrid text-center">
        <div class="content-grid-effect slow-zoom vertical">
                <div class="img-box"><img style="height: 485px; width:528px;" src="{{asset($new_five->image_one)}}" alt="image" class="img-responsive zoom-img"></div>
                    <div class="info-box">
                        <div class="info-content simpleCart_shelfItem">
                                    <h4>Shoes</h4>
                                    <span class="separator"></span>
                                    <p><span class="item_price">${{$new_five->selling_price}}</span></p>
                                    <span class="separator"></span>
                                    <a class="item_add hvr-outline-out button2" href="#">add to cart </a>
                        </div>
                    </div>
            </div>
    </div>
    <div class="clearfix"></div>
</div>
<!-- //content-bottom -->
<!-- product-nav -->



<div class="product-easy">
    <div class="container">
        
        <script src="{{asset('public/frontend/js/easyResponsiveTabs.js')}}" type="text/javascript"></script>
        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#horizontalTab').easyResponsiveTabs({
                                    type: 'default', //Types: default, vertical, accordion           
                                    width: 'auto', //auto or any width like 600px
                                    fit: true   // 100% fit in a container
                                });
                            });
                            
        </script>
        <div class="sap_tabs">
            <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                <ul class="resp-tabs-list">
                    <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Latest Designs</span></li> 
                    <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Special Offers</span></li> 
                    <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>Collections</span></li> 
                </ul>                    
                <div class="resp-tabs-container">
                   <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">

                   @foreach($latest as $row)

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
                                    

                                    <!-- <a href="#" class="item_add single-item hvr-outline-out button2 addcart" data-id="{{ $row->id }}">Add to cart</a> -->

                                    <div class="product_extras">
                                                   <a href="#" id="{{ $row->id }}" class="product_cart_button item_add single-item hvr-outline-out button2 addcart" data-toggle="modal" data-target="#cartmodal"  onclick="productview(this.id)">Add to cart</a>
                                                 
                                    </div>



                                </div>
                            </div>
                        </div>
                       
                        @endforeach
                        <div class="clearfix"></div>
                    </div>

                    

                    <!--  @foreach($latest as $row)
                       <div class="col-md-3 product-men">
                           <div class="men-pro-item simpleCart_shelfItem">
                               <div class="men-thumb-item">
                                   <img src="{{asset($row->image_one)}}" alt="" class="pro-image-front">
                                   <img src="{{asset($row->image_one)}}" alt="" class="pro-image-back">
                                       <div class="men-cart-pro">
                                           <div class="inner-men-cart-pro">
                                               <a href="single.html" class="link-product-add-cart">Quick View</a>
                                           </div>
                                       </div>
                                       <span class="product-new-top">New</span>
                                       
                               </div>
                               <div class="item-info-product ">
                                   <h4><a href="single.html">{{$row->product_name}}</a></h4>
                                   <div class="info-product-price">
                                       <span class="item_price">{{$row->selling_price}}</span>
                                       <del>{{$row->discount_price}}</del>
                                   </div>
                                   <a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>                                    
                               </div>
                           </div>
                       </div>
                    
                       @endforeach
                       
                       <div class="clearfix"></div>                        
                                        </div> -->
                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
                     @foreach($special as $row)
                        <div class="col-md-3 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="{{asset($row->image_one)}}" alt="" class="pro-image-front">
                                    <img src="{{asset($row->image_one)}}" alt="" class="pro-image-back">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="single.html" class="link-product-add-cart">Quick View</a>
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
                                        <span class="item_price">{{$row->selling_price}}</span>
                                    @else
                                     <div class="info-product-price">
                                        <span class="item_price">{{$row->discount_price}}</span>
                                        <del>${{$row->selling_price}}</del>
                                    </div>
                                    @endif
                                    
                                    </div>
                                    <a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>                                    
                                </div>
                            </div>
                        </div>
                       @endforeach
                       
                        <div class="clearfix"></div>                        
                    </div>
                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
                     @foreach($collection as $col)
                        <div class="col-md-3 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="{{asset($col->image_one)}}" alt="" class="pro-image-front">
                                    <img src="{{asset($col->image_one)}}" alt="" class="pro-image-back">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="single.html" class="link-product-add-cart">Quick View</a>
                                            </div>
                                        </div>
                                        @if($col->discount_price == NULL)
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
                                    <h4><a href="single.html">{{$col->product_name}}</a></h4>
                                    <div class="info-product-price">

                                     @if($col->discount_price == NULL)
                                        <span class="item_price">{{$col->selling_price}}</span>
                                    @else
                                     <div class="info-product-price">
                                        <span class="item_price">{{$col->discount_price}}</span>
                                        <del>${{$col->selling_price}}</del>
                                    </div>
                                    @endif
                                    
                                    </div>
                                    <a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>                                    
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                        <div class="clearfix"></div>        
                    </div>  
                </div>  
            </div>
        </div>
    </div>
</div>
<!-- //product-nav -->


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
                     url: "{{  url('/cart/product/view/') }}/"+id,
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
