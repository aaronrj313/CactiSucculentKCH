<?php use App\Models\Product;
	$products=Product::all();?>
<!--font-family-->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
	<head>
        <!-- title of site -->

       
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="/css/font-awesome.min.css">

        <!--linear icon css-->
		<link rel="stylesheet" href="/css/linearicons.css">

		<!--animate.css-->
        <link rel="stylesheet" href="/css/animate.css">

        <!--owl.carousel.css-->
        <link rel="stylesheet" href="/css/owl.carousel.min.css">
		<link rel="stylesheet" href="/css/owl.theme.default.min.css">
		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="/css/bootsnav.css" >	
        
        <!--style.css-->
        <link rel="stylesheet" href="/css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="/css/responsive.css">

		<!--responsive.css-->
        <link rel="stylesheet" href="/css/viewProductsAdmin.css">
	
    </head>
	
<!-- top-area Start -->
<div class="top-area">
					<!-- Start Navigation -->
				    <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

				        <!-- Start Top Search -->
						<div class="top-search">
				            <div class="container">
				                <div class="input-group">
				                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
				                    <input onchange = "search()" id ="searchBar2" type="text" class="form-control" placeholder="Search Products">
				                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
				                </div>
				            </div>
				        </div>
				        <!-- <div class="top-search">
				            <div class="container">
				                <div class="input-group">
				                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
				                    <input onchange = "search()" id ="searchBar" type="text" class="form-control" placeholder="Search">
				                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
									<br><br>
				                </div>
				            </div>
				        </div> -->

						<script type="text/javascript">
							function search()
							{
								var link= "/search/"+document.getElementById("searchBar2").value;
								document.addEventListener("keyup", function(event) {
									if (event.keyCode === 13) {
										location.replace(link);
									}
								});
							}
						</script>
				        <!-- End Top Search -->

				        <div class="container">            
				            <!-- Start Atribute Navigation -->
							<div class="attr-nav">
				                <ul>
				                	<li class="search">
				                		<a href="#"><span class="lnr lnr-magnifier"></span></a>
				                	</li><!--/.search-->
									<li class="user dropdown show">
				                		<a href="/userProfile"><span id="navbarDropdown" class="lnr lnr-user" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre></span></a>

										<div class="dropdown-menu" aria-labelledby="navbarDropdown">
											<a class="dropdown-item" href="{{ route('logout') }}"
											onclick="event.preventDefault();
															document.getElementById('logout-form').submit();">
												{{ __('Logout') }}
											</a>

											<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
												@csrf
											</form>
										</div>

				                	</li><!--/.search-->
									<li class="dropdown">
				                        <a href="/cart" class="dropdown-toggle" data-toggle="dropdown" >
				                            <span class="lnr lnr-cart"></span>
											@if(count((array) session('cart')) != 0)
												<span class="badge badge-bg-1" aria-hidden="true">{{ count((array) session('cart')) }}</span>
											@endif
				                        </a>
										
										@if(session('cart'))
										<ul class="dropdown-menu cart-list s-cate">
				                                <div class="cart-close">
				                                	<span class="lnr lnr-cross"></span>
				                                </div><!--/.cart-close-->

											<?php $total = 0 ?>
											@foreach((array) session('cart') as $id => $details)
													<?php $total += $details['Product_Price'] * $details['Product_Quantity'] ?>
											@endforeach
										
											@if(session('cart'))
                            					@foreach(session('cart') as $id=>$details)
													<li class="single-cart-list">
														<a href="#" class="photo"><img src="{{URL::asset('storage/images/products/'.$details['Product_Image'])}}" class="cart-thumb" alt="image" /></a>
														<div class="cart-list-txt">
															<h6><a href="#">{{$details['Product_Name']}}</a></h6>
															<p>{{$details['Product_Quantity']}} x - <span class="price">RM {{$details['Product_Price']}}</span></p>
														</div><!--/.cart-list-txt-->
														<div class="cart-close">
															<a href="{{ url('/cart/delete/'.$id) }}" class="lnr lnr-cross" role="button"></a>
														</div><!--/.cart-close-->
													</li><!--/.single-cart-list -->
												@endforeach
											
				                            	
				                            <li class="total">
				                                <span>Total: RM {{ $total }}</span>
												<button class="btn-cart pull-right"><a href='cart'>view cart</a></button>
				                            </li>
											@endif
				                        </ul>
										@endif
				                    </li><!--/.dropdown-->
				                </ul>
				            </div><!--/.attr-nav-->
				            <!-- End Atribute Navigation -->

				            <!-- Start Header Navigation -->
				            <div class="navbar-header">
				                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
				                    <i class="fa fa-bars"></i>
				                </button>
				                <a class="navbar-brand" href="/homepage" style="color:#32CD32;">Cacti Succulent KCH</a>

				            </div><!--/.navbar-header-->
				            <!-- End Header Navigation -->

				            <!-- Collect the nav links, forms, and other content for toggling -->
				            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
								<ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
									<li><a href = "/homepage">Home</a></li>
									<li><a href = "/product">Products</a></li>
									<li><a href = "/order">Orders</a></li>
									<li><a href = "/aboutUs">About Us</a></li>
									<li><a href = "/contactUs">Contact Us</a></li>
								</ul><!--/.nav -->
				            </div><!-- /.navbar-collapse -->
				        </div><!--/.container-->
				    </nav><!--/nav-->
				    <!-- End Navigation -->
				</div><!--/.header-area-->
			    <div class="clearfix"></div>

			</div><!-- /.top-area-->

		