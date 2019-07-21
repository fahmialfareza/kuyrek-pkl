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
	<title>{{trans('app.WishlistSportVenue')}} | {{Auth::user()->name}} | KuyRek</title>
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
					<a>{{trans('app.MyAccount')}}</a>
					<a>{{trans('app.WishlistSportVenue')}}</a>
				</div>

				<div class="row">
					@include('home.layout.sidebar')


					<div class="col-md-9">

						<div class="information-blocks">
							<div class="sidebar-navigation">
								<div class="information-blocks" style="padding:10px;">
									<h3 class="block-title main-heading">{{trans('app.WishlistSportVenue')}}</h3>
									@if (session('status'))
											<span class="help-block alert alert-success">
													<strong>{{session('status')}}</strong>
											</span>
									@endif
									<div class="row">
										<div class="col-xs-12">
											<div class="information-blocks">
												<div class="table-responsive">
													<table class="compare-table">
														@foreach ($wishlists as $wishlist)
															<tr>
																<td style="width:25%;">
																	<div class="product-slide-entry shift-image">
																		<div class="product-image">
																			<img src="/images/{{$wishlist->sportvenue->sportvenuevendor_id}}/sportvenue/{{$wishlist->sportvenue->image1}}" alt="" />
																			@if ($wishlist->sportvenue->image2)
																				<img src="/images/{{$wishlist->sportvenue->sportvenuevendor_id}}/sportvenue/{{$wishlist->sportvenue->image2}}" alt="" />
																			@else
																				<img src="/images/{{$wishlist->sportvenue->sportvenuevendor_id}}/sportvenue/{{$wishlist->sportvenue->image1}}" alt="" />
																			@endif
																		</div>

																	</div>
																</td>
																<td style="width:50%;">
																	<div class="breadcrumb-box">
																		<a>{{$wishlist->sportvenue->name}}</a>
																	</div>
																</td>
																<td style="width:25%;">
																	<div class="breadcrumb-box">
																		<a>{{$wishlist->sportvenue->sportvenuevendor->district->name}}, {{$wishlist->sportvenue->sportvenuevendor->district->regency->name}}</a>
																	</div>
																</td>
																<td>
																	<a href="/sportvenueofficial/{{$wishlist->sportvenue->id}}" class="button btn-info btn-flat col-md-12">{{trans('app.DetailVenue')}}</a>
																	<a href="/home/venuewishlist/{{$wishlist->id}}" class="button btn-danger btn-flat col-md-12">{{trans('app.Delete')}}</a>
																</td>
															</tr>
														@endforeach
													</table>
												</div>
											</div>
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
