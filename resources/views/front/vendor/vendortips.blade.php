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
	<title>{{trans('app.VendorTips')}} | KuyRek</title>
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
					<a>Vendor</a>
					<a>{{trans('app.VendorTips')}}</a>
				</div>

				<div class="row">
					@include('layout.front.sidebarvendor')
					<div class="col-md-9">

						<div class="information-blocks">
							<div class="sidebar-navigation">
								<div class="information-blocks" style="padding:10px;">
									<h3 class="block-title main-heading">{{trans('app.VendorTips')}}</h3>
									<div class="row">

										<!-- <div class="col-sm-4 portfolio-entry">
											<div class="image">
												<img alt="" src="img/sertifikat/1.jpg">
												<div class="hover-layer"></div>
												<div class="title-info">
													<div class="subtitle"><a href="#">"Silver Medal" Kaohsiung International Invention and Design Expo 2017</a></div>
													<div class="actions">
														<a class="action-button open-image o1" href="img/sertifikat/1.jpg"><i class="fa fa-search"></i></a>
													</div>
												</div>
											</div>
										</div>
										<div class="overlay-popup" id="image-popup">
											<div class="overflow">
												<div class="table-view">
													<div class="cell-view">
														<div class="close-layer"></div>
														<div class="popup-container">
															<img class="gallery-image" src="img/sertifikat/1.jpg" alt="" />
															<div class="close-popup"></div>
														</div>
													</div>
												</div>
											</div>
										</div>


										<div class="col-sm-4 portfolio-entry">
											<div class="image">
												<img alt="" src="img/sertifikat/2.jpg">
												<div class="hover-layer"></div>
												<div class="title-info">
													<div class="subtitle"><a href="#">Special Award "The Best International Invention" Kaohsiung International Invention and Design Expo 2017</a></div>
													<div class="actions">
														<a class="action-button open-image" href="img/sertifikat/2.jpg"><i class="fa fa-search"></i></a>
													</div>
												</div>
											</div>
										</div>
										<div class="overlay-popup" id="image-popup">
											<div class="overflow">
												<div class="table-view">
													<div class="cell-view">
														<div class="close-layer"></div>
														<div class="popup-container">
															<img class="gallery-image" src="img/sertifikat/2.jpg" alt="" />
															<div class="close-popup"></div>
														</div>
													</div>
												</div>
											</div>
										</div> -->
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
