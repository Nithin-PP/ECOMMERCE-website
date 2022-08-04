	@extends('front.layouts.layout')
	@section('content')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- Back to top -->
	{{-- <div class="btn-back-to-top" id="myBtn" >
	    <span class="symbol-btn-back-to-top">
	        <i class="zmdi zmdi-chevron-up"></i>
	    </span>
	</div> --}}
	<!-- Modal1 -->
	<div class="container" style="margin-top:60px;">
	    <section class="section-slide">
	        <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
	            <button class="how-pos3 hov3 trans-04 js-hide-modal1">
	                {{-- <img src="images/icons/icon-close.png" alt="CLOSE"> --}}
	            </button>

	            <div class="row">
	                <div class="col-md-6 col-lg-7 p-b-30">
	                    <div class="p-l-25 p-r-30 p-lr-0-lg">
	                        <div class="wrap-slick3 flex-sb flex-w">
	                            <div class="wrap-slick3-dots"></div>
	                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

	                            <div class="slick3 gallery-lb">
	                                @foreach($stock as $value)

	                                <div class="item-slick3" data-thumb="data:image/png/jpg;base64, {{$value->stockData->image}}">
	                                    <div class="wrap-pic-w pos-relative">
	                                        <img src="data:image/png/jpg;base64,{{$value->stockData->image}}" alt="">

	                                        <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="data:image/png/jpg;base64, {{$value->stockData->image}}">
	                                            <i class="fa fa-expand"></i>
	                                        </a>
	                                    </div>
	                                </div>
	                                @endforeach

	                            </div>
	                        </div>
	                    </div>
	                </div>

	                <div class="col-md-6 col-lg-5 p-b-30">
	                    <div class="p-r-50 p-t-5 p-lr-0-lg">
	                        @foreach($stock as $value)
	                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
	                            {{$value->stockData->product}}
	                        </h4>



	                        <span class="mtext-106 cl2">
	                            ${{$value->stockData->price}}
	                        </span>

	                        <p class="stext-102 cl3 p-t-23">
	                            {{$value->stockData->description}}
	                            @endforeach
	                            <!--  -->
	                            <form id="myform">
	                                <div class="p-t-33">
	                                    {{-- <div class="flex-w flex-r-m p-b-10">
	                                    <div class="size-203 flex-c-m respon6">
	                                        Size
	                                    </div>

	                                    <div class="size-204 respon6-next">
	                                        <div class="rs1-select2 bor8 bg0">
	                                            <select class="js-select2" name="time">
	                                                <option>Choose an option</option>
	                                                <option>Size S</option>
	                                                <option>Size M</option>
	                                                <option>Size L</option>
	                                                <option>Size XL</option>
	                                            </select>
	                                            <div class="dropDownSelect2"></div>
	                                        </div>
	                                    </div>
	                                </div> --}}
	                                    {{--
	                                <div class="flex-w flex-r-m p-b-10">
	                                    <div class="size-203 flex-c-m respon6">
	                                        Color
	                                    </div>

	                                    <div class="size-204 respon6-next">
	                                        <div class="rs1-select2 bor8 bg0">
	                                            <select class="js-select2" name="time">
	                                                <option>Choose an option</option>
	                                                <option>Red</option>
	                                                <option>Blue</option>
	                                                <option>White</option>
	                                                <option>Grey</option>
	                                            </select>
	                                            <div class="dropDownSelect2"></div>
	                                        </div>
	                                    </div>
	                                </div> --}}

	                                    @foreach($stock as $value)
	                                    <span class="text-success" id="cartMsg"></span>
	                                    <span class="text-danger" id="stockMsg"></span>
	                                    <div class="flex-w flex-r-m p-b-10">
	                                        <div class="size-204 flex-w flex-m respon6-next">
	                                            @if($value->available_stock == 0)
	                                            <h1>out of stock</h1>
	                                            @else

	                                            <div class="wrap-num-product flex-w m-r-20 m-tb-10">
	                                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
	                                                    <i class="fs-16 zmdi zmdi-minus"></i>
	                                                </div>
	                                                <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
	                                                <input type="hidden" name="productid" id="productid" value="{{$value->stockData->id}}">
	                                                <input class="mtext-104 cl3 txt-center num-product" type="number" id="product" name="product" value="0">

	                                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
	                                                    <i class="fs-16 zmdi zmdi-plus"></i>
	                                                </div>
	                                            </div>

	                                            <button type="button" id="savedata" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 ">
	                                                add to cart</button>
	                                            @endif
	                                        </div>
	                                    </div>
	                                    @endforeach
	                                </div>
	                            </form>
	                            <!--  -->
	                            <div class="flex-w flex-m p-l-100 p-t-40 respon7">
	                                <div class="flex-m bor9 p-r-10 m-r-11">
	                                    <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
	                                        <i class="zmdi zmdi-favorite"></i>
	                                    </a>
	                                </div>

	                                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
	                                    <i class="fa fa-facebook"></i>
	                                </a>

	                                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
	                                    <i class="fa fa-twitter"></i>
	                                </a>

	                                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
	                                    <i class="fa fa-google-plus"></i>
	                                </a>
	                            </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
	</div>
	<script>
	    $(document).ready(function() {
	        $('#savedata').on('click', function() {
	            var product = $('#product').val();
	            var productid = $('#productid').val();
	            $.ajax({

	                url: "/addData"
	                , type: "POST"
	                , data: {
	                    _token: $("#csrf").val()
	                    , product: product
	                    , productid: productid
	                }
	                , cache: false
	                , success: function(dataResult) {
	                    console.log(dataResult);
						 $msg='no cart available';
						 $message='cart added successfully';
	                    if(dataResult == $message) {
	                        $('#cartMsg').html('cart added successfully');
							$('#product').val(0);
							
	                    }else{
							console.log(dataResult);
						}
						if(dataResult == $msg){
							
							window.location.href = "{{route('purchaser-login')}}"
						}
	                },

	            });

	        });
	    });

	</script>
	@endsection
