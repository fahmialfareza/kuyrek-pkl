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
	<title>{{trans('app.Coverage')}} | KuyRek</title>
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
					<a>{{trans('app.Coverage')}}</a>
				</div>

				<div class="row">
					@include('layout.front.sidebar')
					<div class="col-md-9">

						<div class="information-blocks">
							<div class="sidebar-navigation">
								<div class="information-blocks" style="padding:10px;">
									<h3 class="block-title main-heading">{{trans('app.Coverage')}}</h3>
									<div class="row">
                    <div class="col-md-12">
                      <a href="https://prasetya.ub.ac.id/berita/Aplikasi-Kitaolahragacom-Antarkan-Tiga-Mahasiswa-UB-Raih-Silver-Medal-20678-id.html">
                        <p class="text-justify">1. Aplikasi Kitaolahraga.com Antarkan Tiga Mahasiswa UB Raih Silver Medal </p>
                      </a>
                    </div>
                    <div class="col-md-12">
                      <a href="http://suryamalang.tribunnews.com/2017/12/20/sering-kehabisan-lapangan-mahasiswa-ub-malang-buat-aplikasi-booking-lapangan-online">
                        <p class="text-justify">2. Sering Kehabisan Lapangan, Mahasiswa UB Malang Buat Aplikasi Booking Lapangan Online </p>
                      </a>
                    </div>
                    <div class="col-md-12">
                      <a href="http://www.infomenarik-terbaru.com/mahasiswa-universitas-brawijaya-ciptakan-platform-untuk-mencari-lawan-tanding-futsal/">
                        <p class="text-justify">3. Mahasiswa Universitas Brawijaya Ciptakan Platform Untuk Mencari Lawan Tanding Futsal </p>
                      </a>
                    </div>
                    <div class="col-md-12">
                      <a href="https://www.ristekdikti.go.id/aplikasi-kitaolahraga-com-antarkan-tiga-mahasiswa-ub-raih-silver-medal/">
                        <p class="text-justify">4. Aplikasi Kitaolahraga.com Antarkan Tiga Mahasiswa UB Raih Silver Medal </p>
                      </a>
                    </div>
                    <div class="col-md-12">
                      <a href="http://em.ub.ac.id/upmagazine/">
                        <p class="text-justify">5. Aplikasi Kitaolahraga.com </p>
                      </a>
                    </div>
                    <div class="col-md-12">
                      <a href="https://halomalang.com/read/2017/12/aplikasi-kitaolahragacom-karya-mahasiswa-ub-sewa-lapangan-olahraga-jadi-lebih-mudah?utm_source=home&utm_term=headline">
                        <p class="text-justify">6. Aplikasi Kitaolahraga.com Karya Mahasiswa UB, Sewa Lapangan  Olahraga Jadi Lebih Mudah </p>
                      </a>
                    </div>
                    <div class="col-md-12">
                      <a href="http://www.digination.id/updates/sering-kehabisan-lapangan-mahasiswa-ub-bikin-aplikasi-pesan-lapangan">
                        <p class="text-justify">7. Sering Kehabisan Lapangan, Mahasiswa UB bikin aplikasi pesan lapangan </p>
                      </a>
                    </div>
                    <div class="col-md-12">
                      <a href="https://news.okezone.com/read/2017/12/29/65/1837334/mahasiswa-ciptakan-aplikasi-untuk-para-pecinta-olahraga-seperti-apa-ya">
                        <p class="text-justify">8. Mahasiswa Ciptakan Aplikasi untuk Para Pecinta Olahraga, Seperti Apa Ya? </p>
                      </a>
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
