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
  <title>{{trans('app.Home')}} | KuyRek</title>
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

        <div class="row">
          <div class="col-md-3 sidebar-column">
            <div class="sidebar-navigation">
              <div class="title">{{trans('app.SportVenue')}}<i class="fa fa-angle-down"></i></div>
              <div class="list">
                @foreach ($sportcategories as $sportcategory)
                  <a class="entry" href="/sportvenue?category={{$sportcategory->id}}"><span><i class="fa fa-angle-right"></i>{{$sportcategory->name}}</span></a>
                @endforeach
              </div>
            </div>
          </div>
          <div class="col-md-9">

            <div class="information-blocks">
              <div class="mozaic-banners-wrapper type-2">
                <div class="row">
                  <div class="banner-column col-md-12">

                    <div class="mozaic-swiper">
                      <div class="swiper-container" data-autoplay="0" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="1">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <div class="mozaic-banner-entry type-1" style="background-image: url(img/slider/slider-3.jpg);">
                              <div class="mozaic-banner-content">
                                <h2 class="title" style="color: white;">{{trans('app.SEARCH')}} {{trans('app.SPORTVENUE')}}</h2>
                                <div class="search-box size-1">
                                  <form action="/sportvenue">
                                    <div class="search-button">
                                      <i class="fa fa-search"></i>
                                      <input type="submit" />
                                    </div>
                                    <div class="search-field">
                                        <input type="text" name="search" placeholder="{{trans('app.Search')}} {{trans('app.SportVenue')}}" />
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="pagination"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row text-center" style="margin-top:25px;">

          <div class="col-md-12">

            <div class="information-blocks">

              <div class="tabs-container">
                <h2 class="block-title">{{trans('app.SPORTVENUE')}}</h2>
                <div class="swiper-tabs tabs-switch">
                  <div class="title">{{trans('app.Filter')}}</div>
                  <div class="list">
                    <a class="block-title tab-switcher active">{{trans('app.BestRating')}}</a>
                    <a class="block-title tab-switcher">{{trans('app.MostSee')}}</a>
                    <a class="block-title tab-switcher">{{trans('app.Newest')}}</a>
                    <div class="clear"></div>
                  </div>
                </div>
                <div>
                  <div class="tabs-entry">
                    <div class="products-swiper">
                      <div class="swiper-container" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="2" data-int-slides="2" data-sm-slides="3" data-md-slides="4" data-lg-slides="4" data-add-slides="4">
                        <div class="swiper-wrapper">
                          <?php foreach ($sportvenues->orderBy('star', 'desc')->paginate(4) as $sportvenue1): ?>
                            <div class="swiper-slide">
                              <div class="paddings-container">
                                <div class="product-slide-entry">
                                  <div class="product-image">
                                    <img src="/images/{{$sportvenue1->sportvenuevendor_id}}/sportvenue/{{$sportvenue1->image1}}" alt="" />
                                    @if ($sportvenue1->official == 1)
                                      <div class="product-image-label type-2" style="z-index: 0;"><span>{{trans('app.OFFICIAL')}}</span></div>
                                    @endif
                                    <a target="_blank" href="/venuewishlist/{{$sportvenue1->id}}" class="top-line-a right"><i class="fa fa-heart"></i></a>
                                    <div class="bottom-line">
                                      @if ($sportvenue1->official == 1)
                                        <a class="bottom-line-a" href="/sportvenueofficial/{{$sportvenue1->id}}"><i class="fa fa-eye"></i> {{trans('app.MoreDetail')}}</a>
                                      @else
                                        <a class="bottom-line-a" href="/sportvenuenotofficial/{{$sportvenue1->id}}"><i class="fa fa-eye"></i> {{trans('app.MoreDetail')}}</a>
                                      @endif
                                    </div>
                                  </div>
                                  <a class="tag" href="/sportvenue?district={{$sportvenue1->sportvenuevendor->district->id}}">{{$sportvenue1->sportvenuevendor->district->name}}, {{$sportvenue1->sportvenuevendor->district->regency->name}}</a>
                                  <a class="title" href="/sportvenue?category={{$sportvenue1->sportvenuecategory->id}}">{{$sportvenue1->sportvenuecategory->name}}</a>
                                  <div class="rating-box">
                                    <?php if ($sportvenue1->star >= 1): ?>
                                      <div class="star"><i class="fa fa-star"></i></div>
                                    <?php else: ?>
                                      <div class="star"><i class="fa fa-star-o"></i></div>
                                    <?php endif; ?>
                                    <?php if ($sportvenue1->star >= 2): ?>
                                      <div class="star"><i class="fa fa-star"></i></div>
                                    <?php else: ?>
                                      <div class="star"><i class="fa fa-star-o"></i></div>
                                    <?php endif; ?>
                                    <?php if ($sportvenue1->star >= 3): ?>
                                      <div class="star"><i class="fa fa-star"></i></div>
                                    <?php else: ?>
                                      <div class="star"><i class="fa fa-star-o"></i></div>
                                    <?php endif; ?>
                                    <?php if ($sportvenue1->star >= 4): ?>
                                      <div class="star"><i class="fa fa-star"></i></div>
                                    <?php else: ?>
                                      <div class="star"><i class="fa fa-star-o"></i></div>
                                    <?php endif; ?>
                                    <?php if ($sportvenue1->star >= 5): ?>
                                      <div class="star"><i class="fa fa-star"></i></div>
                                    <?php else: ?>
                                      <div class="star"><i class="fa fa-star-o"></i></div>
                                    <?php endif; ?>
                                  </div>
                                  <div class="price">
                                    @if ($sportvenue1->official == 1)
                                      <a class="current" href="/sportvenueofficial/{{$sportvenue1->id}}">{{$sportvenue1->name}}</a>
                                    @else
                                      <a class="current" href="/sportvenuenotofficial/{{$sportvenue1->id}}">{{$sportvenue1->name}}</a>
                                    @endif
                                  </div>
                                </div>
                              </div>
                            </div>
                          <?php endforeach; ?>
                        </div>
                        <div class="pagination"></div>
                      </div>
                    </div>
                  </div>
                  <div class="tabs-entry">
                    <div class="products-swiper">
                      <div class="swiper-container" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="2" data-int-slides="2" data-sm-slides="3" data-md-slides="4" data-lg-slides="4" data-add-slides="4">
                        <div class="swiper-wrapper">
                          <?php foreach ($sportvenues->orderBy('see', 'desc')->paginate(4) as $sportvenue2): ?>
                            <div class="swiper-slide">
                              <div class="paddings-container">
                                <div class="product-slide-entry">
                                  <div class="product-image">
                                    <img src="/images/{{$sportvenue2->sportvenuevendor_id}}/sportvenue/{{$sportvenue2->image1}}" alt="" />
                                    @if ($sportvenue2->official == 1)
                                      <div class="product-image-label type-2" style="z-index: 0;"><span>{{trans('app.OFFICIAL')}}</span></div>
                                    @endif
                                    <a target="_blank" href="/venuewishlist/{{$sportvenue2->id}}" class="top-line-a right"><i class="fa fa-heart"></i></a>
                                    <div class="bottom-line">
                                      @if ($sportvenue2->official == 1)
                                        <a class="bottom-line-a" href="/sportvenueofficial/{{$sportvenue2->id}}"><i class="fa fa-eye"></i> {{trans('app.MoreDetail')}}</a>
                                      @else
                                        <a class="bottom-line-a" href="/sportvenuenotofficial/{{$sportvenue2->id}}"><i class="fa fa-eye"></i> {{trans('app.MoreDetail')}}</a>
                                      @endif
                                    </div>
                                  </div>
                                  <a class="tag" href="/sportvenue?district={{$sportvenue2->sportvenuevendor->district->id}}">{{$sportvenue2->sportvenuevendor->district->name}}, {{$sportvenue2->sportvenuevendor->district->regency->name}}</a>
                                  <a class="title" href="/sportvenue?category={{$sportvenue2->sportvenuecategory->id}}">{{$sportvenue2->sportvenuecategory->name}}</a>
                                  <div class="rating-box">
                                    <?php if ($sportvenue2->star >= 1): ?>
                                      <div class="star"><i class="fa fa-star"></i></div>
                                    <?php else: ?>
                                      <div class="star"><i class="fa fa-star-o"></i></div>
                                    <?php endif; ?>
                                    <?php if ($sportvenue2->star >= 2): ?>
                                      <div class="star"><i class="fa fa-star"></i></div>
                                    <?php else: ?>
                                      <div class="star"><i class="fa fa-star-o"></i></div>
                                    <?php endif; ?>
                                    <?php if ($sportvenue2->star >= 3): ?>
                                      <div class="star"><i class="fa fa-star"></i></div>
                                    <?php else: ?>
                                      <div class="star"><i class="fa fa-star-o"></i></div>
                                    <?php endif; ?>
                                    <?php if ($sportvenue2->star >= 4): ?>
                                      <div class="star"><i class="fa fa-star"></i></div>
                                    <?php else: ?>
                                      <div class="star"><i class="fa fa-star-o"></i></div>
                                    <?php endif; ?>
                                    <?php if ($sportvenue2->star >= 5): ?>
                                      <div class="star"><i class="fa fa-star"></i></div>
                                    <?php else: ?>
                                      <div class="star"><i class="fa fa-star-o"></i></div>
                                    <?php endif; ?>
                                  </div>
                                  <div class="price">
                                    @if ($sportvenue2->official == 1)
                                      <a class="current" href="/sportvenueofficial/{{$sportvenue2->id}}">{{$sportvenue2->name}}</a>
                                    @else
                                      <a class="current" href="/sportvenuenotofficial/{{$sportvenue2->id}}">{{$sportvenue2->name}}</a>
                                    @endif
                                  </div>
                                </div>
                              </div>
                            </div>
                          <?php endforeach; ?>
                        </div>
                        <div class="pagination"></div>
                      </div>
                    </div>
                  </div>
                  <div class="tabs-entry">
                    <div class="products-swiper">
                      <div class="swiper-container" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="2" data-int-slides="2" data-sm-slides="3" data-md-slides="4" data-lg-slides="4" data-add-slides="4">
                        <div class="swiper-wrapper">
                          <?php foreach ($sportvenues->orderBy('created_at', 'desc')->paginate(4) as $sportvenue3): ?>
                            <div class="swiper-slide">
                              <div class="paddings-container">
                                <div class="product-slide-entry">
                                  <div class="product-image">
                                    <img src="/images/{{$sportvenue3->sportvenuevendor_id}}/sportvenue/{{$sportvenue3->image1}}" alt="" />
                                    @if ($sportvenue3->official == 1)
                                      <div class="product-image-label type-2" style="z-index: 0;"><span>{{trans('app.OFFICIAL')}}</span></div>
                                    @endif
                                    <a target="_blank" href="/venuewishlist/{{$sportvenue3->id}}" class="top-line-a right"><i class="fa fa-heart"></i></a>
                                    <div class="bottom-line">
                                      @if ($sportvenue3->official == 1)
                                        <a class="bottom-line-a" href="/sportvenueofficial/{{$sportvenue3->id}}"><i class="fa fa-eye"></i> {{trans('app.MoreDetail')}}</a>
                                      @else
                                        <a class="bottom-line-a" href="/sportvenuenotofficial/{{$sportvenue3->id}}"><i class="fa fa-eye"></i> {{trans('app.MoreDetail')}}</a>
                                      @endif
                                    </div>
                                  </div>
                                  <a class="tag" href="/sportvenue?district={{$sportvenue3->sportvenuevendor->district->id}}">{{$sportvenue3->sportvenuevendor->district->name}}, {{$sportvenue3->sportvenuevendor->district->regency->name}}</a>
                                  <a class="title" href="/sportvenue?category={{$sportvenue3->sportvenuecategory->id}}">{{$sportvenue3->sportvenuecategory->name}}</a>
                                  <div class="rating-box">
                                    <?php if ($sportvenue3->star >= 1): ?>
                                      <div class="star"><i class="fa fa-star"></i></div>
                                    <?php else: ?>
                                      <div class="star"><i class="fa fa-star-o"></i></div>
                                    <?php endif; ?>
                                    <?php if ($sportvenue3->star >= 2): ?>
                                      <div class="star"><i class="fa fa-star"></i></div>
                                    <?php else: ?>
                                      <div class="star"><i class="fa fa-star-o"></i></div>
                                    <?php endif; ?>
                                    <?php if ($sportvenue3->star >= 3): ?>
                                      <div class="star"><i class="fa fa-star"></i></div>
                                    <?php else: ?>
                                      <div class="star"><i class="fa fa-star-o"></i></div>
                                    <?php endif; ?>
                                    <?php if ($sportvenue3->star >= 4): ?>
                                      <div class="star"><i class="fa fa-star"></i></div>
                                    <?php else: ?>
                                      <div class="star"><i class="fa fa-star-o"></i></div>
                                    <?php endif; ?>
                                    <?php if ($sportvenue3->star >= 5): ?>
                                      <div class="star"><i class="fa fa-star"></i></div>
                                    <?php else: ?>
                                      <div class="star"><i class="fa fa-star-o"></i></div>
                                    <?php endif; ?>
                                  </div>
                                  <div class="price">
                                    @if ($sportvenue3->official == 1)
                                      <a class="current" href="/sportvenueofficial/{{$sportvenue3->id}}">{{$sportvenue3->name}}</a>
                                    @else
                                      <a class="current" href="/sportvenuenotofficial/{{$sportvenue3->id}}">{{$sportvenue3->name}}</a>
                                    @endif
                                  </div>
                                </div>
                              </div>
                            </div>
                          <?php endforeach; ?>
                        </div>
                        <div class="pagination"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="clear"></div>
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
