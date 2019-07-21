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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<title>{{trans('app.ChangePassword')}} | {{Auth::user()->name}} | KuyRek</title>
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
					<a>{{trans('app.MyProfile')}}</a>
					<a>{{trans('app.ChangePassword')}}</a>
				</div>

				<div class="row">
					@include('home.layout.sidebar')
					<div class="col-md-9">

						<div class="information-blocks">
							<div class="sidebar-navigation">
								<div class="information-blocks" style="padding:10px;">
									<h3 class="block-title main-heading">{{trans('app.ChangePassword')}}</h3>
										<form role="form" method="post" action="/home/password">
											@if (session('status'))
													<span class="help-block alert alert-danger">
															<strong>{{session('status')}}</strong>
													</span>
											@endif
											@if (session('status1'))
													<span class="help-block alert alert-success">
															<strong>{{session('status1')}}</strong>
													</span>
											@endif
											{{csrf_field()}}
											<div class="row">
												<div class="col-xs-12">
													<label>{{trans('app.NewPassword')}} <span>*</span></label>
													<input class="simple-field" type="password" name="password" placeholder="{{trans('app.NewPassword')}}" required value="" />
													@if ($errors->has('password'))
				                      <span class="help-block alert alert-danger">
				                          <strong>Kata sandi tidak valid</strong>
				                      </span>
				                  @endif
													<label>{{trans('app.NewPasswordConfirmation')}} <span>*</span></label>
													<input class="simple-field" type="password" name="confirm_password" placeholder="{{trans('app.NewPasswordConfirmation')}}" required value="" />
													<div class="clear"></div>
													<div class="button style-10">{{trans('app.SaveNewPassword')}}<input type="submit" value="" /></div>
												</div>
											</div>
										</form>
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

	<script>
  $.ajaxSetup({
   headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
   });
    $('#country_id').on('click', function(e){
        console.log(e);

        var country_id = e.target.value;

        //ajax
        $.get('setting/ajax-subcat/' + country_id, function(data){
            console.log(data);

                $('#city_id').empty();

            $.each(data, function(index, subcatObj){

                $('#city_id').append('<option value ="'+ subcatObj.id +'">'+subcatObj.name+'</option>');

            });
        });
    });
		$(window).load(function(e){
        $('#city_id').empty();

				$(document).ready(function(){
				  $('#country_id').trigger('click');
				});
    });
  </script>
	<script src="/js/jquery-2.1.3.min.js"></script>
	<script src="/js/idangerous.swiper.min.js"></script>
	<script src="/js/global.js"></script>

	<!-- custom scrollbar -->
	<script src="/js/jquery.mousewheel.js"></script>
	<script src="/js/jquery.jscrollpane.min.js"></script>
</body>

</html>
