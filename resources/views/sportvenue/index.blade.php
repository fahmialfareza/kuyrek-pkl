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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
  <title>{{trans('app.SportVenue')}} | KuyRek</title>
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
          <a href="/sportvenue">{{trans('app.SportVenue')}}</a>
        </div>

        <div class="information-blocks">
          <div class="row">
            <div class="col-md-9 col-md-push-3 col-sm-8 col-sm-push-4">
              <div class="page-selector">
                <form>
                <div class="shop-grid-controls">
                  <div class="entry">
                    <div class="inline-text">{{trans('app.Sortby')}}</div>
                    <div class="simple-drop-down">
                      <select name="sortby" id="sortby">
                        <option disabled selected>{{trans('app.Sort')}}</option>
                        <option value="1" <?php if ($request->sortby == 1): ?>
                          selected
                        <?php endif; ?>>{{trans('app.LowestPrice')}}</option>
                        <option value="2" <?php if ($request->sortby == 2): ?>
                          selected
                        <?php endif; ?>>{{trans('app.HighestPrice')}}</option>
                        <option value="3" <?php if ($request->sortby == 3): ?>
                          selected
                        <?php endif; ?>>{{trans('app.MostSee')}}</option>
                        <option value="4" <?php if ($request->sortby == 4): ?>
                          selected
                        <?php endif; ?>>{{trans('app.BestRating')}}</option>
                        <option value="5" <?php if ($request->sortby == 4): ?>
                          selected
                        <?php endif; ?>>{{trans('app.Official')}}</option>
                        <option value="6" <?php if ($request->sortby == 4): ?>
                          selected
                        <?php endif; ?>>{{trans('app.NotOfficial')}}</option>
                      </select>
                    </div>
                  </div>
                  <div class="entry">
                    <div class="view-button active grid"><i class="fa fa-th"></i></div>
                    <div class="view-button list"><i class="fa fa-list"></i></div>
                  </div>
                  <div class="entry">
                    <div class="inline-text">Tampilkan</div>
                    <div class="simple-drop-down" style="width: 75px;">
                      <select name="pagination" id="pagination">
                          <option value="12" <?php if ($request->pagination == 12): ?>
                            selected
                          <?php endif; ?>>12</option>
                          <option value="24" <?php if ($request->pagination == 24): ?>
                            selected
                          <?php endif; ?>>24</option>
                          <option value="36" <?php if ($request->pagination == 36): ?>
                            selected
                          <?php endif; ?>>36</option>
                          <option value="48" <?php if ($request->pagination == 48): ?>
                            selected
                          <?php endif; ?>>48</option>
                      </select>
                    </div>
                    <div class="inline-text">{{trans('app.perpage')}}</div>
                  </div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="row shop-grid grid-view">
                @foreach ($sportvenues as $sportvenue)
                  <div class="col-md-3 col-sm-4 shop-grid-item">
                    <div class="product-slide-entry shift-image">
                      <div class="product-image">
                        <img src="/images/{{$sportvenue->sportvenuevendor_id}}/sportvenue/{{$sportvenue->image1}}" alt="" />
                        @if ($sportvenue->image2)
                          <img src="/images/{{$sportvenue->sportvenuevendor_id}}/sportvenue/{{$sportvenue->image2}}" alt="" />
                        @endif
                        @if ($sportvenue->official == 1)
                          <div class="product-image-label type-2"><span>{{trans('app.OFFICIAL')}}</span></div>
                        @endif
                        <div class="bottom-line left-attached">
                          <a target="_blank" href="/venuewishlist/{{$sportvenue->id}}" class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                          @if ($sportvenue->official == 1)
                            <a href="/sportvenueofficial/{{$sportvenue->id}}" class="bottom-line-a square"><i class="fa fa-eye"></i></a>
                          @else
                            <a href="/sportvenuenotofficial/{{$sportvenue->id}}" class="bottom-line-a square"><i class="fa fa-eye"></i></a>
                          @endif
                        </div>
                      </div>
                      <a class="tag" href="/sportvenue?district={{$sportvenue->sportvenuevendor->district->id}}">{{$sportvenue->sportvenuevendor->district->name}}, {{$sportvenue->sportvenuevendor->district->regency->name}}</a>
                      <a class="title" href="/sportvenuenotofficial/{{$sportvenue->id}}">{{$sportvenue->name}}</a>
                      <div class="rating-box">
                        <?php if ($sportvenue->star >= 1): ?>
                          <div class="star"><i class="fa fa-star"></i></div>
                        <?php else: ?>
                          <div class="star"><i class="fa fa-star-o"></i></div>
                        <?php endif; ?>
                        <?php if ($sportvenue->star >= 2): ?>
                          <div class="star"><i class="fa fa-star"></i></div>
                        <?php else: ?>
                          <div class="star"><i class="fa fa-star-o"></i></div>
                        <?php endif; ?>
                        <?php if ($sportvenue->star >= 3): ?>
                          <div class="star"><i class="fa fa-star"></i></div>
                        <?php else: ?>
                          <div class="star"><i class="fa fa-star-o"></i></div>
                        <?php endif; ?>
                        <?php if ($sportvenue->star >= 4): ?>
                          <div class="star"><i class="fa fa-star"></i></div>
                        <?php else: ?>
                          <div class="star"><i class="fa fa-star-o"></i></div>
                        <?php endif; ?>
                        <?php if ($sportvenue->star >= 5): ?>
                          <div class="star"><i class="fa fa-star"></i></div>
                        <?php else: ?>
                          <div class="star"><i class="fa fa-star-o"></i></div>
                        <?php endif; ?>
                      </div>
                      <div class="article-container style-1">
                        <h4>{{trans('app.DETAIL')}}</h4>
                        <p><b>Alamat : </b>{{$sportvenue->sportvenuedescription->address}}</p>
                      </div>
                      @if ($sportvenue->official == 1)
                        <div class="price">
                          <?php
                            $a = 0;
                          ?>
                            {{trans('app.Start')}}
                            @foreach ($sportvenue->sportvenueprices as $price)
                              @if ($a < $price->price)
                                <?php
                                  $a = $price->price;
                                ?>
                                <div class="current">IDR {{$a}}</div>
                              @endif
                            @endforeach
                        </div>
                      @endif
                      <div class="list-buttons">
                        <a href="/sportvenueofficial/{{$sportvenue->id}}" class="button style-10">{{trans('app.Booking')}}</a>
                        <a target="_blank" href="/venuewishlist/{{$sportvenue->id}}" class="button style-11"><i class="fa fa-heart"></i> {{trans('app.Addto')}} {{trans('app.Wishlist')}}</a>
                      </div>
                    </div>
                    <div class="clear"></div>
                  </div>
                @endforeach
              </div>
              <div class="page-selector">
                <div class="description">Menampilkan: {{$sportvenues->firstItem()}}-{{$sportvenues->lastItem()}} {{trans('app.of')}} {{$sportvenues->total()}}</div>
                <div class="pages-box">
  								<a class="square-button" href="/blog?page=1"><i class="fa fa-angle-double-left"></i></a>
  								<?php if ($sportvenues->previousPageUrl()): ?>
  									<a class="square-button" href="{{$sportvenues->previousPageUrl()}}"><i class="fa fa-angle-left"></i></a>
  									<a class="square-button" href="{{$sportvenues->previousPageUrl()}}">{{$sportvenues->currentPage() - 1}}</a>
  								<?php endif; ?>
  								<a class="square-button active" href="">{{$sportvenues->currentPage()}}</a>
  								<?php if ($sportvenues->nextPageUrl()): ?>
  									<a class="square-button" href="{{$sportvenues->nextPageUrl()}}">{{$sportvenues->currentPage() + 1}}</a>
  									<a class="square-button" href="{{$sportvenues->nextPageUrl()}}"><i class="fa fa-angle-right"></i></a>
  								<?php endif; ?>
  								<a class="square-button" href="/blog?page={{$sportvenues->lastPage()}}"><i class="fa fa-angle-double-right"></i></a>
  							</div>
                <div class="clear"></div>
              </div>
            </div>
            <div class="col-md-3 col-md-pull-9 col-sm-4 col-sm-pull-8 blog-sidebar">
              <div class="information-blocks categories-border-wrapper">
                <div class="block-title size-2">{{trans('app.Category')}}</div>
                <select name="category" class="simple-field" id="category">
                  <option value="0" selected>{{trans('app.All')}} {{trans('app.Category')}}</option>
                    <?php foreach ($categories as $category): ?>
                      <option value="{{$category->id}}" <?php if ($request->category == $category->id): ?>
                        selected
                      <?php endif; ?>>{{$category->name}}</option>
                    <?php endforeach; ?>
                </select>
                <div class="information-blocks">
                  <div class="block-title size-2">{{trans('app.Price')}}</div>
                  <div class="range-wrapper">
                    <div id="prices-range"></div>
                    <div class="range-price">
                      {{trans('app.Max')}} : <input class="simple-field" name="max" type="number" />
                      {{trans('app.Min')}} : <input class="simple-field" name="min" type="number" />
                    </div>
                  </div>
                </div>
                <div class="information-blocks">
                  <div class="block-title size-2">{{trans('app.Province')}}</div>
                  <select name="province" id="province" class="simple-field">
                    <option disabled selected>Pilih Provinsi</option>
                    <?php foreach ($provinces as $province): ?>
                      <option value="{{$province->id}}" <?php if ($request->province == $province->id): ?>
                        selected
                      <?php endif; ?>>{{$province->name}}</option>
                    <?php endforeach; ?>
                  </select>
                  <div class="block-title size-2">{{trans('app.Regency')}} / {{trans('app.City')}}</div>
                  <select name="regency" id="regency" class="simple-field">
                    <option disabled selected>Pilih Kabupaten / Kota</option>
                    <?php foreach ($regencies as $regency): ?>
                      <option value="{{$regency->id}}" <?php if ($request->regency == $regency->id): ?>
                        selected
                      <?php endif; ?>>{{$regency->name}}</option>
                    <?php endforeach; ?>
                  </select>
                  <div class="block-title size-2">{{trans('app.District')}}</div>
                  <select name="district" id="district" class="simple-field">
                    <option disabled selected>Pilih Kecamatan</option>
                    <?php
                      if ($request->has('province')) { ?>
                          <option value="0">SEMUA KECAMATAN</option>
                    <?php } ?>
                    <?php foreach ($districts as $district): ?>
                      <option value="{{$district->id}}" <?php if ($request->district == $district->id): ?>
                        selected
                      <?php endif; ?>>{{$district->name}}</option>
                    <?php endforeach; ?>
                  </select>
                  <input type="text" name="search" value="{{$request->search}}" hidden />
                  <button class="btn btn-primary" type="submit" id="submit">{{trans('app.Filter')}}</button>
                </div>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>

      <!-- FOOTER -->
      @include('layout.footer')

    </div>

  </div>
  <div class="clear"></div>

  </div>

  @include('layout.search') @include('layout.cart')

  <script>
    $.ajaxSetup({
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
    });
    $('#province').on('click change', function(e){
        console.log(e);
        var province = e.target.value;
        //ajax
        $.get('/regencies/' + province, function(data){
            console.log(data);
                $('#regency').empty();
                $('#district').empty();
            $.each(data, function(index, subcatObj){
                $('#regency').append('<option value ="'+ subcatObj.id +'">'+subcatObj.name+'</option>');
            });
        });
    });
    $('#regency').on('click change', function(e){
        console.log(e);
        var regency = e.target.value;
        //ajax
        $.get('/districts/' + regency, function(data){
            console.log(data);
                $('#district').empty();
                $('#district').append('<option value ="0">SEMUA KECAMATAN</option>');
            $.each(data, function(index, subcatObj){
                $('#district').append('<option value ="'+ subcatObj.id +'">'+subcatObj.name+'</option>');
            });
        });
    });
  </script>

  <script type="text/javascript">
    $('#sortby').on('change', function() {
      $('#submit').trigger('click');
    });
    $('#pagination').on('change', function() {
      $('#submit').trigger('click');
    });
  </script>

  <?php if ($request->has('district')): ?>
  <?php else: ?>
		<script type="text/javascript">
      $(window).load(function(e){
          $('#regency').empty();
          $('#district').empty();

          $(document).ready(function(){
            $('#province').trigger('click');
          });
      });
	  </script>
	<?php endif; ?>

  <script src="js/jquery-2.1.3.min.js"></script>
  <script src="js/idangerous.swiper.min.js"></script>
  <script src="js/global.js"></script>

  <!-- custom scrollbar -->
  <script src="js/jquery.mousewheel.js"></script>
  <script src="js/jquery.jscrollpane.min.js"></script>
</body>

</html>
