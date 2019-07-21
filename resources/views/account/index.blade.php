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
	<link rel="stylesheet" href="/css/icofont.css">
	<!--[if IE 9]>
        <link href="/css/ie9.css" rel="stylesheet" type="text/css" />
    <![endif]-->
	<link rel="shortcut icon" href="/img/kitaolahraga-fav.png" />
	<title>{{trans('app.ProfileOf')}} {{$user->name}} | KO</title>
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
					<a>{{trans('app.Account')}}</a>
					<a>{{$user->name}}</a>
				</div>

				<div class="row">
					@include('account.front.sidebar')
					<div class="col-md-9">

						<div class="information-blocks">
							<div class="sidebar-navigation">
								<div class="information-blocks" style="padding:10px;">
									<h3 class="block-title main-heading">{{trans('app.ProfileOf')}} {{$user->name}}</h3>
										<div class="row">
											<div class="col-md-12" style="margin:0px;padding:0px;">
												<div class="col-md-4 col-xs-12 portfolio-entry">
													<div class="image">
														<img alt="" src="/images/user/{{$user->id}}/{{$user->userprofile->profile_photo}}">
														<div class="hover-layer"></div>
														<div class="title-info">
															<div class="actions">
																<a class="action-button open-image" href="#"><i class="fa fa-search"></i> {{trans('app.ZOOM')}}</a>
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
																	<img class="gallery-image" src="/img/our/1.jpg" alt="" />
																	<div class="close-popup"></div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-8 col-xs-12">
													<label>{{trans('app.FullName')}} </label>
													<input class="simple-field" type="text" placeholder="Nama Lengkap" required value="{{$user->name}}" disabled />
													<div class="clear"></div>
												</div>
												<div class="col-md-8 col-xs-12">
													<label>{{trans('app.Country')}}</label>
													<input class="simple-field" type="text" placeholder="Negara" required value="{{$user->userprofile->district->regency->province->country->name}}" disabled />
													<div class="clear"></div>
												</div>
												<div class="col-md-8 col-xs-12">
													<label>{{trans('app.Province')}} </label>
													<input class="simple-field" type="text" placeholder="Provinsi" required value="{{$user->userprofile->district->regency->province->name}}" disabled />
													<div class="clear"></div>
												</div>
											</div>
											<div class="col-xs-12">
												<label>{{trans('app.Regency')}} / {{trans('app.City')}} </label>
												<input class="simple-field" type="text" placeholder="Kabupaten / Kota" required value="{{$user->userprofile->district->regency->name}}" disabled />
												<label>{{trans('District')}} </label>
												<input class="simple-field" type="text" placeholder="Kecamatan" required value="{{$user->userprofile->district->name}}" disabled />
												<label style="font-weight: bold;">{{trans('app.Contact')}} :</label>
												<a class="button style-1" target="_blank" href="mailto:{{$user->email}}" style="font-size: 12px;">
														<i class="fa fa-envelope"></i> {{$user->email}}
												</a>
												<a class="button style-1" target="_blank" href="tel:{{$user->userprofile->whatsapp}}" style="font-size: 12px;">
														<i class="fa fa-phone"></i> {{$user->userprofile->whatsapp}}
												</a>
												<a class="button style-1" target="_blank" href="https://api.whatsapp.com/send?phone=62{{$user->userprofile->whatsapp}}" style="font-size: 12px;">
														<i class="fa fa-whatsapp"></i> {{$user->userprofile->whatsapp}}
												</a>
												<a class="button style-1" target="_blank" href="https://line.me/ti/p/~{{$user->userprofile->line}}" style="font-size: 12px;">
														<i class="icofont icofont-brand-line-messenger"></i> {{$user->userprofile->line}}
												</a>
											</div>
										</div>
								</div>
							</div>
						</div>


					</div>
				</div>

				<div style="height: 15px;"></div>
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
