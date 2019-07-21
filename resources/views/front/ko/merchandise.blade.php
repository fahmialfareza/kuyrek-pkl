<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no, minimal-ui" />
	<link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="/css/idangerous.swiper.css" rel="stylesheet" type="text/css" />
	<link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700%7CDancing+Script%7CMontserrat:400,700%7CMerriweather:400,300italic%7CLato:400,700,900' rel='stylesheet' type='text/css' />
	<link href="/css/style.css" rel="stylesheet" type="text/css" />
	<!--[if IE 9]>
        <link href="/css/ie9.css" rel="stylesheet" type="text/css" />
    <![endif]-->
	<link rel="shortcut icon" href="/img/kitaolahraga-fav.png" />
	<title>Merchandise | KuyRek</title>
</head>

<body class="style-3">

	<!-- LOADER -->
	<div id="loader-wrapper">
		<div class="bubbles">
			<div class="title">{{trans('app.loading')}}</div>
			<span></span>
			<span id="bubble2"></span>
			<span id="bubble3"></span>
		</div>
	</div>

	<div id="content-block">

		<div class="content-center fixed-header-margin">
			<!-- HEADER -->
			@include('layout.header')


			<div class="content-push">

				<div class="breadcrumb-box">
					<a href="/">{{trans('app.Home')}}</a>
					<a>KuyRek</a>
					<a>Merchandise</a>
				</div>

				<div class="row">
					@include('layout.front.sidebar')

					<div class="col-md-9 information-entry">

						<div class="row shop-grid grid-view">

							<!-- <div class="col-md-3 col-sm-4 shop-grid-item">
								<div class="product-slide-entry shift-image">
									<div class="product-image">
										<img src="/img/product-minimal-1.jpg" alt="" />
										<img src="/img/product-minimal-11.jpg" alt="" />
										<div class="bottom-line left-attached">
											<a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
											<a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
											<a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
											<a class="bottom-line-a square"><i class="fa fa-expand"></i></a>
										</div>
									</div>
									<a class="tag" href="#">Men clothing</a>
									<a class="title" href="#">Blue Pullover Batwing Sleeve Zigzag</a>
									<div class="rating-box">
										<div class="star"><i class="fa fa-star"></i></div>
										<div class="star"><i class="fa fa-star"></i></div>
										<div class="star"><i class="fa fa-star"></i></div>
										<div class="star"><i class="fa fa-star"></i></div>
										<div class="star"><i class="fa fa-star"></i></div>
										<div class="reviews-number">25 reviews</div>
									</div>
									<div class="article-container style-1">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									</div>
									<div class="price">
										<div class="prev">$199,99</div>
										<div class="current">$119,99</div>
									</div>
									<div class="list-buttons">
										<a class="button style-10">Add to cart</a>
										<a class="button style-11"><i class="fa fa-heart"></i> Add to Wishlist</a>
									</div>
								</div>
								<div class="clear"></div>
							</div> -->

						</div>
					</div>
				</div>


				<!-- FOOTER -->
				@include('layout.footer')

			</div>

		</div>
		<div class="clear"></div>

	</div>

	@include('layout.search')
	@include('layout.cart')

	<script src="/js/jquery-2.1.3.min.js"></script>
	<script src="/js/idangerous.swiper.min.js"></script>
	<script src="/js/global.js"></script>

	<!-- custom scrollbar -->
	<script src="/js/jquery.mousewheel.js"></script>
	<script src="/js/jquery.jscrollpane.min.js"></script>
</body>

</html>
