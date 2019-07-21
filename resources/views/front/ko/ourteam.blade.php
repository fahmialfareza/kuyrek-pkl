<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no, minimal-ui" />
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="css/idangerous.swiper.css" rel="stylesheet" type="text/css" />
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700%7CDancing+Script%7CMontserrat:400,700%7CMerriweather:400,300italic%7CLato:400,700,900' rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<!--[if IE 9]>
        <link href="css/ie9.css" rel="stylesheet" type="text/css" />
    <![endif]-->
	<link rel="shortcut icon" href="img/kitaolahraga-fav.png" />
	<title>{{trans('app.OurTeam')}} | KuyRek</title>
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
					<a>{{trans('app.OurTeam')}}</a>
				</div>

				<div class="row">
					@include('layout.front.sidebar')
					<div class="col-md-9">

						<div class="information-blocks">
							<div class="sidebar-navigation">
								<div class="information-blocks" style="padding:25px;">
									<h3 class="block-title main-heading">{{trans('app.OurTeam')}}</h3>
									<div class="row">
										<div class="col-sm-4 portfolio-entry">
											<div class="image">
												<img alt="" src="img/our/1.jpg">
												<div class="hover-layer"></div>
												<div class="title-info">
													<div class="subtitle"><a href="#">Fahmi Alfareza</a></div>
													<div class="subtitle"><a href="#">Chief Executive Officer</a></div>
													<div class="actions">
														<a class="action-button open-image" href="https://facebook.com/fahmialfareza"><i class="fa fa-facebook"></i></a>
														<a class="action-button" href="https://instagram.com/fahmi_alfareza"><i class="fa fa-instagram"></i></a>
													</div>
												</div>
											</div>
										</div>


										<div class="col-sm-4 portfolio-entry">
											<div class="image">
												<img alt="" src="img/our/2.jpg">
												<div class="hover-layer"></div>
												<div class="title-info">
													<div class="subtitle"><a href="#">Aang Muammar Zein</a></div>
													<div class="subtitle"><a href="#">Chief Technology Officer</a></div>
													<div class="actions">
														<a class="action-button open-image" href="https://www.facebook.com/aang.muammarzein.5"><i class="fa fa-facebook"></i></a>
														<a class="action-button" href="https://www.instagram.com/aang_mz/"><i class="fa fa-instagram"></i></a>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-4 portfolio-entry">
											<div class="image">
												<img alt="" src="img/our/3.jpg">
												<div class="hover-layer"></div>
												<div class="title-info">
													<div class="subtitle"><a href="#">Rizhaf Setyo Hartono</a></div>
													<div class="subtitle"><a href="#">Chief Executive Marketing</a></div>
													<div class="actions">
														<a class="action-button open-image" href="https://www.facebook.com/RizhafSetyoHartono"><i class="fa fa-facebook"></i></a>
														<a class="action-button" href="https://www.instagram.com/rizhafsetyo/"><i class="fa fa-instagram"></i></a>
													</div>
												</div>
											</div>
										</div>
									</div>


								</div>
							</div>
						</div>


						<div style="height: 15px;"></div>





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

	<script src="js/jquery-2.1.3.min.js"></script>
	<script src="js/idangerous.swiper.min.js"></script>
	<script src="js/global.js"></script>

	<!-- custom scrollbar -->
	<script src="js/jquery.mousewheel.js"></script>
	<script src="js/jquery.jscrollpane.min.js"></script>
</body>

</html>
