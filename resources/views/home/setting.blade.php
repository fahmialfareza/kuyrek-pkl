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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<title>{{trans('app.Setting')}} | {{Auth::user()->name}} | KuyRek</title>
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
					<a>{{trans('app.Setting')}}</a>
				</div>

				<div class="row">
					@include('home.layout.sidebar')
					<div class="col-md-9">

						<div class="information-blocks">
							<div class="sidebar-navigation">
								<div class="information-blocks" style="padding:10px;">
									<h3 class="block-title main-heading">{{trans('app.Setting')}}</h3>
									@if (session('status'))
											<span class="help-block alert alert-danger">
													<strong>{{session('status')}}</strong>
											</span>
									@endif
									<?php if (App\UserProfile::where('user_id', $user->id)->count() > 0): ?>
										<form role="form" action="/home/setting/{{$user->userprofile->id}}" method="post" enctype="multipart/form-data">
									<?php else: ?>
										<form role="form" action="/home/setting" method="post" enctype="multipart/form-data">
									<?php endif; ?>
										{{csrf_field()}}
										<div class="row">
											<div class="col-xs-12">
												<label>{{trans('app.FullName')}} <span>*</span></label>
												<input class="simple-field" type="text" name="name" placeholder="{{trans('app.FullName')}}" required value="{{$user->name}}" />
												@if ($errors->has('name'))
			                      <span class="help-block alert alert-danger">
			                          <strong>{{trans('app.Nameempty')}}</strong>
			                      </span>
			                  @endif
												<div class="clear"></div>
											</div>
											<div class="col-xs-6">
												<label>{{trans('app.Country')}} <span>*</span></label>
												<div class="simple-drop-down simple-field">
													<select name="country_id" id="country_id" required>
														<?php if (App\UserProfile::where('user_id', $user->id)->count() > 0): ?>
															<?php foreach ($countries as $country): ?>
																<option value="{{$country->id}}" <?php if ($user->userprofile->district->regency->province->country->id == $country->id): ?>
																	selected
																<?php endif; ?>>{{$country->name}}</option>
															<?php endforeach; ?>
														<?php else: ?>
															<?php foreach ($countries as $country): ?>
																<option value="{{$country->id}}">{{$country->name}}</option>
															<?php endforeach; ?>
														<?php endif; ?>
                          </select>
												</div>
												@if ($errors->has('country_id'))
														<span class="help-block alert alert-danger">
																<strong>Belum memilih negara</strong>
														</span>
												@endif
											</div>
											<div class="col-xs-6">
												<label>{{trans('app.Province')}} <span>*</span></label>
												<div class="simple-drop-down simple-field">
													<select name="province_id" id="province_id" required>
														<?php if (App\UserProfile::where('user_id', $user->id)->count() > 0): ?>
															<?php foreach ($provinces as $province): ?>
																<option value="{{$province->id}}" <?php if ($user->userprofile->district->regency->province->id == $province->id): ?>
																	selected
																<?php endif; ?>>{{$province->name}}</option>
															<?php endforeach; ?>
														<?php else: ?>
															<?php foreach ($provinces as $province): ?>
																<option value="{{$province->id}}">{{$province->name}}</option>
															<?php endforeach; ?>
														<?php endif; ?>
                          </select>
												</div>
												@if ($errors->has('province_id'))
														<span class="help-block alert alert-danger">
																<strong>Belum memilih provinsi</strong>
														</span>
												@endif
											</div>
											<div class="col-xs-6">
												<label>{{trans('app.Regency')}} / {{trans('app.City')}} <span>*</span></label>
												<div class="simple-drop-down simple-field">
													<select name="regency_id" id="regency_id" required>
														<?php if (App\UserProfile::where('user_id', $user->id)->count() > 0): ?>
															<?php foreach ($regencies as $regency): ?>
																<option value="{{$regency->id}}" <?php if ($user->userprofile->district->regency->id == $regency->id): ?>
																	selected
																<?php endif; ?>>{{$regency->name}}</option>
															<?php endforeach; ?>
														<?php else: ?>
															<?php foreach ($regencies as $regency): ?>
																<option value="{{$regency->id}}">{{$regency->name}}</option>
															<?php endforeach; ?>
														<?php endif; ?>
                          </select>
												</div>
												@if ($errors->has('$regency_id'))
														<span class="help-block alert alert-danger">
																<strong>Belum memilih kabupaten / kota</strong>
														</span>
												@endif
											</div>
											<div class="col-xs-6">
												<label>{{trans('app.District')}} <span>*</span></label>
												<div class="simple-drop-down simple-field">
													<select name="district_id" id="district_id" required>
														<?php if (App\UserProfile::where('user_id', $user->id)->count() > 0): ?>
															<?php foreach ($districts as $district): ?>
																<option value="{{$district->id}}" <?php if ($user->userprofile->district->id == $district->id): ?>
																	selected
																<?php endif; ?>>{{$district->name}}</option>
															<?php endforeach; ?>
														<?php else: ?>
															<?php foreach ($districts as $district): ?>
																<option value="{{$district->id}}">{{$district->name}}</option>
															<?php endforeach; ?>
														<?php endif; ?>
                          </select>
												</div>
												@if ($errors->has('district_id'))
														<span class="help-block alert alert-danger">
																<strong>Belum memilih kecematan</strong>
														</span>
												@endif
											</div>
											<div class="col-xs-12">
												<label>{{trans('app.ProfilePhoto')}} <?php if (App\UserProfile::where('user_id', $user->id)->count() < 0): ?>
													<span>*</span>
												<?php endif; ?></label>
												<input class="img-upload" type="file" name="profile_photo" placeholder="{{trans('app.ProfilePhoto')}}" <?php if (App\UserProfile::where('user_id', $user->id)->count() < 0): ?>
													required
												<?php endif; ?>/>
												@if ($errors->has('profile_photo'))
														<span class="help-block alert alert-danger">
																<strong>Belum memilih foto profil</strong>
														</span>
												@endif
												<label>Whatsapp / {{trans('app.MobileNumber')}} <span>*</span></label>
												<input class="simple-field" type="number" name="whatsapp" placeholder="Whatsapp" required <?php if (App\UserProfile::where('user_id', $user->id)->count() > 0): ?>
													value="{{$user->userprofile->whatsapp}}"
												<?php else: ?>
													value="{{old('whatsapp')}}"
												<?php endif; ?> />
												@if ($errors->has('whatsapp'))
														<span class="help-block alert alert-danger">
																<strong>Belum memasukkan nomor whatsapp</strong>
														</span>
												@endif
												<label>ID Line</label>
												<input class="simple-field" type="text" name="line" placeholder="ID Line" required <?php if (App\UserProfile::where('user_id', $user->id)->count() > 0): ?>
													value="{{$user->userprofile->line}}"
												<?php else: ?>
													value="{{old('line')}}"
												<?php endif; ?> />
												@if ($errors->has('line'))
														<span class="help-block alert alert-danger">
																<strong>Data tidak valid</strong>
														</span>
												@endif
												<label>{{trans('app.Status')}} <span>*</span></label>
												<input class="simple-field" type="text" name="status" placeholder="{{trans('app.Status')}}" required <?php if (App\UserProfile::where('user_id', $user->id)->count() > 0): ?>
													value="{{$user->userprofile->status}}"
												<?php else: ?>
													value="{{old('status')}}"
												<?php endif; ?> />
												@if ($errors->has('status'))
														<span class="help-block alert alert-danger">
																<strong>Belum memasukkan status</strong>
														</span>
												@endif
												<div class="button style-10">{{trans('app.SaveData')}}<input type="submit" value="" /></div>
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
    $('#country_id').on('click change', function(e){
        console.log(e);

        var country_id = e.target.value;

        //ajax
        $.get('/provinces/' + country_id, function(data){
            console.log(data);

                $('#province_id').empty();
								$('#regency_id').empty();
								$('#district_id').empty();

            $.each(data, function(index, subcatObj){

                $('#province_id').append('<option value ="'+ subcatObj.id +'">'+ subcatObj.name + '</option>');

            });
        });
    });
		$('#province_id').on('click change', function(e){
        console.log(e);

        var province_id = e.target.value;

        //ajax
        $.get('/regencies/' + province_id, function(data){
            console.log(data);

								$('#regency_id').empty();
								$('#district_id').empty();

            $.each(data, function(index, subcatObj){

                $('#regency_id').append('<option value ="' + subcatObj.id +'">' + subcatObj.name + '</option>');

            });
        });
    });
		$('#regency_id').on('click change', function(e){
        console.log(e);

        var district_id = e.target.value;

        //ajax
        $.get('/districts/' + district_id, function(data){
            console.log(data);

								$('#district_id').empty();

            $.each(data, function(index, subcatObj){

                $('#district_id').append('<option value ="' + subcatObj.id +'">'+subcatObj.name + '</option>');

            });
        });
    });
	</script>
	<?php if (App\UserProfile::where('user_id', $user->id)->count() < 1): ?>
		<script type="text/javascript">
			$(window).load(function(e){
					$('#province_id').empty();
					$('#regency_id').empty();
					$('#district_id').empty();

					$(document).ready(function(){
					  $('#country_id').trigger('click');
					});
	    });
	  </script>
	<?php endif; ?>
	<script src="/js/jquery-2.1.3.min.js"></script>
	<script src="/js/idangerous.swiper.min.js"></script>
	<script src="/js/global.js"></script>

	<!-- custom scrollbar -->
	<script src="/js/jquery.mousewheel.js"></script>
	<script src="/js/jquery.jscrollpane.min.js"></script>
</body>

</html>
