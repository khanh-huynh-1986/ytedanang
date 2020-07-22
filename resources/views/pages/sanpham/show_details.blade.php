@extends('layout')
@section('content')



<div class="features_items"><!--features_items-->
       
                        <h2 class="title text-center">Chi tiết sản phẩm</h2><br>
@foreach($product_details as $key => $value)

<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<style>
									.zoom {
										padding: 0px;
										background-color: transform;
										transition: transform .6s; /* Animation */
										margin: 0 auto;
									}
									.zoom:hover {
										transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
									}
								</style>

								<div class="zoom"></div>
								<img src="{{URL::to('/public/uploads/product/'.$value->product_image)}}" class="zoom" alt="" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">

										<center><div class="item active">
										  <a href=""><img src="{{URL::to('/public/uploads/product/'.$value->product_image)}}" width="50" height="50" alt="1"></a>
										  <a href=""><img src="{{URL::to('/public/uploads/product/'.$value->product_image)}}" width="50" height="50" alt="2"></a>
										  <a href=""><img src="{{URL::to('/public/uploads/product/'.$value->product_image)}}" width="50" height="50" alt="3"></a>
										</div></center>
										
										
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="{{url('public/wp-images/new.jpg')}}" class="newarrival" alt="new" />
								<h2>{{$value->product_name}}</h2>
								<p>Mã ID: {{$value->product_id}}</p>
								<img src="{{url('public/wp-images/rating.png')}}" alt="rating" />
								
								<form action="{{URL::to('/save-cart')}}" method="POST">
									@csrf
									<input type="hidden" value="{{$value->product_id}}" class="cart_product_id_{{$value->product_id}}">
                                            <input type="hidden" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">
                                            <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">
                                            <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
                                          
								<span>
									<span>{{number_format($value->product_price,0,',','.').'VNĐ'}}</span>
								
									<label>Số lượng:</label>
									<input name="qty" type="number" min="1" class="cart_product_qty_{{$value->product_id}}"  value="1" />
									<input name="productid_hidden" type="hidden"  value="{{$value->product_id}}" />
								</span>
								<input type="button" value="Thêm giỏ hàng" class="btn btn-primary btn-sm add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart">
								</form>

								<p><b>Tình trạng:</b> {{$value->product_quantity}} sp</p>
								<p><b>Điều kiện:</b> Mới 100%</p>
								<p><b>Thương hiệu:</b> {{$value->brand_name}}</p>
								<p><b>Danh mục:</b> {{$value->category_name}}</p>
								 <div class="fb-share-button" data-href="http://localhost/tutorial_youtube/shopbanhanglaravel" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{$url_canonical}}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
								 <div class="fb-like" data-href="{{$url_canonical}}" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="false"></div>
							</div><!--/product-information-->
						</div>
</div><!--/product-details-->

					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
							
								<li ><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
								<p>{!!$value->product_desc!!}</p>
								
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
								<p>{!!$value->product_content!!}</p>
								
						
							</div>
							
							<div class="tab-pane fade" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>
										

                	<?php
					$name = Session::get('customer_name');
					if($name){
						echo $name;
						
					}
					?>

									</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>
<?php date_default_timezone_set('Asia/Ho_Chi_Minh');

echo date(' H:i:s');
 ?>
										</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i><?php date_default_timezone_set('Asia/Ho_Chi_Minh');


echo date(' d/m/Y ');
 ?>

										</a></li>
										</ul>
									<p></p>
									<p><b>Write Your Review</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Your Name"/>
											<input type="email" placeholder="Email Address"/>
										</span>
										<textarea name="" ></textarea>
										<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
	@endforeach
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản phẩm tương tự</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
							@foreach($relate as $key => $lienquan)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											 <div class="single-products">
		                                        <div class="productinfo text-center">
		                                            <img src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" alt="" />
		                                            <h2>{{number_format($lienquan->product_price).' '.'VNĐ'}}</h2>
		                                            <p>{{$lienquan->product_name}}</p>
		                                            
		                                        </div>
		                                      
                                			</div>
										</div>
									</div>
							@endforeach		

								
								</div>
									
							</div>
									
						</div>
					</div><!--/recommended_items-->
				</div>
					  <ul class="pagination pagination-sm m-t-none m-b-none">
                       {!!$relate->links()!!}
                      </ul>

@endsection