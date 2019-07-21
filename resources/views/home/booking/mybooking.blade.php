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
	<title>{{trans('app.MyBooking')}} | {{Auth::user()->name}} | KuyRek</title>
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
					<a>{{trans('app.MyBooking')}}</a>
				</div>

				<div class="row">
					@include('home.layout.sidebar')


					<div class="col-md-9">

						<div class="information-blocks">
							<div class="sidebar-navigation">
								<div class="information-blocks" style="padding:10px;">
									<h3 class="block-title main-heading">{{trans('app.MyBooking')}}</h3>

									<div class="row">
										<div class="col-xs-12">


											<div class="information-blocks">
												<div class="table-responsive">
													<table class="compare-table">
														<tr class="text-center">
															<td>{{trans('app.VenueName')}}</td>
															<td>{{trans('app.Time')}}</td>
															<td>Total Dibayarkan</td>
															<td>{{trans('app.PaymentExpired')}}</td>
															<td>{{trans('app.Action')}}</td>
														</tr>
														@foreach ($bookings as $booking)
															<tr class="text-center">
																<td>{{$booking->sportvenueprice->sportvenue->name}}</td>
																<td>
																	<?php
																		$play = \Carbon\Carbon::createFromFormat('Y-m-d', $booking->date);
																		setlocale(LC_TIME, 'id_ID');
																		$play = $play->format('l, j F Y');;
																	?>
																	{{$play}} {{$booking->start_time}} s/d {{$booking->end_time}}
																</td>
																<td>Rp {{number_format($booking->total_payment,2,",",".")}}</td>
																<td>
																	<?php
																		$datetime = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $booking->expired);
																		setlocale(LC_TIME, 'id_ID');
																		$datetime = $datetime->format('l, j F Y H:i:s');;
																	?>
																	{{$datetime}}
																</td>
																<td>
																	<a target="_blank" href="/sportvenueofficial/{{$booking->sportvenueprice->sportvenue->id}}" class="button btn-info btn-flat col-md-12">{{trans('app.DetailVenue')}}</a>
																	@if (\Carbon\Carbon::now() <= $booking->expired)
																		@if ($booking->transfer == 0)
																			@if ($booking->payment != null)
																				{{trans('app.WaitingPaymentStatus')}}
																			@else
																				<a href="/home/mybooking/{{$booking->id}}/confirmation" class="button btn-info btn-flat col-md-12">{{trans('app.BookingConfirmation')}}</a>
																				<a href="/home/mybooking/{{$booking->id}}/cancel" class="button btn-danger btn-flat col-md-12">{{trans('app.Cancel')}}</a>
																			@endif
																		@else
																			<a class="button btn-info btn-flat col-md-12" href="/home/mybooking/{{$booking->id}}/print">{{trans('app.PrintInvoice')}}</a>
																		@endif
																	@else
																		@if ($booking->transfer == 0)
																			@if ($booking->payment != null)
																				{{trans('app.WaitingPaymentStatus')}}
																			@else
																				{{trans('app.BookingCanceled')}}
																			@endif
																		@else
																			<a class="button btn-info btn-flat col-md-12" href="/home/mybooking/{{$booking->id}}/print">{{trans('app.PrintInvoice')}}</a>
																		@endif
																	@endif
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
