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
  <title>{{$sportvenue->name}} | {{trans('app.SportVenue')}} | KuyRek</title>
</head>

<body class="style-3">

  <!-- LOADER -->
  <div id="loader-wrapper">
    <div class="bubbles">
      <div class="title">loading</div>
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
          <a href="/sportvenue?category={{$sportvenue->sportvenuecategory->id}}">{{$sportvenue->sportvenuecategory->name}}</a>
          <a>{{$sportvenue->name}}</a>

        </div>

        <div class="information-blocks">
          <div class="row">
            @if (session('status'))
                <span class="help-block alert alert-success">
                    <strong>{{session('status')}}</strong>
                </span>
            @endif
            @if (session('status1'))
                <span class="help-block alert alert-danger">
                    <strong>{{session('status1')}}</strong>
                </span>
            @endif
            <div class="col-sm-5 col-md-4 col-lg-5 information-entry">
              <div class="product-preview-box">
                <div class="swiper-container product-preview-swiper" data-autoplay="0" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="1">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <div class="product-zoom-image">
                        <img src="/images/{{$sportvenue->sportvenuevendor_id}}/sportvenue/{{$sportvenue->image1}}" alt="" data-zoom="/images/{{$sportvenue->sportvenuevendor_id}}/sportvenue/{{$sportvenue->image1}}" />
                      </div>
                    </div>
                    @if ($sportvenue->image2)
                    <div class="swiper-slide">
                      <div class="product-zoom-image">
                        <img src="/images/{{$sportvenue->sportvenuevendor_id}}/sportvenue/{{$sportvenue->image2}}" alt="" data-zoom="/images/{{$sportvenue->sportvenuevendor_id}}/sportvenue/{{$sportvenue->image2}}" />
                      </div>
                    </div>
                    @endif @if ($sportvenue->image3)
                    <div class="swiper-slide">
                      <div class="product-zoom-image">
                        <img src="/images/{{$sportvenue->sportvenuevendor_id}}/sportvenue/{{$sportvenue->image3}}" alt="" data-zoom="/images/{{$sportvenue->sportvenuevendor_id}}/sportvenue/{{$sportvenue->image3}}" />
                      </div>
                    </div>
                    @endif @if ($sportvenue->image4)
                    <div class="swiper-slide">
                      <div class="product-zoom-image">
                        <img src="/images/{{$sportvenue->sportvenuevendor_id}}/sportvenue/{{$sportvenue->image4}}" alt="" data-zoom="/images/{{$sportvenue->sportvenuevendor_id}}/sportvenue/{{$sportvenue->image4}}" />
                      </div>
                    </div>
                    @endif
                  </div>
                  <div class="pagination"></div>
                  <div class="product-zoom-container">
                    <div class="move-box">
                      <img class="default-image" src="/images/{{$sportvenue->sportvenuevendor_id}}/sportvenue/{{$sportvenue->image1}}" alt="" />
                      <img class="zoomed-image" src="/images/{{$sportvenue->sportvenuevendor_id}}/sportvenue/{{$sportvenue->image1}}" alt="" />
                    </div>
                    <div class="zoom-area"></div>
                  </div>
                </div>
                <div class="swiper-hidden-edges">
                  <div class="swiper-container product-thumbnails-swiper" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="3" data-int-slides="3" data-sm-slides="3" data-md-slides="4" data-lg-slides="4"
                    data-add-slides="4">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide selected">
                        <div class="paddings-container">
                          <img src="/images/{{$sportvenue->sportvenuevendor_id}}/sportvenue/{{$sportvenue->image1}}" alt="" />
                        </div>
                      </div>
                      @if ($sportvenue->image2)
                      <div class="swiper-slide">
                        <div class="paddings-container">
                          <img src="/images/{{$sportvenue->sportvenuevendor_id}}/sportvenue/{{$sportvenue->image2}}" alt="" />
                        </div>
                      </div>
                      @endif @if ($sportvenue->image3)
                      <div class="swiper-slide">
                        <div class="paddings-container">
                          <img src="/images/{{$sportvenue->sportvenuevendor_id}}/sportvenue/{{$sportvenue->image3}}" alt="" />
                        </div>
                      </div>
                      @endif @if ($sportvenue->image4)
                      <div class="swiper-slide">
                        <div class="paddings-container">
                          <img src="/images/{{$sportvenue->sportvenuevendor_id}}/sportvenue/{{$sportvenue->image4}}" alt="" />
                        </div>
                      </div>
                      @endif
                    </div>
                    <div class="pagination"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-7 col-md-4 information-entry">
              <div class="product-detail-box">
                <h1 class="product-title">{{$sportvenue->name}}</h1>
                <h3 class="product-subtitle">
                    <a href="/sportvenue?category={{$sportvenue->sportvenuecategory->id}}">{{$sportvenue->sportvenuecategory->name}}</a>
                </h3>
                <div class="bottom-line">
                  <i class="fa fa-eye"></i> {{trans('app.See')}} {{$sportvenue->see}}x
                </div>
                <?php if ($sportvenue->sportvenuereviews->count() > 0): ?>
                  <div class="rating-box">
                    <?php if ($sportvenue->star >= 1): ?>
                      <div class="star">
                        <i class="fa fa-star"></i>
                      </div>
                    <?php else: ?>
                      <div class="star">
                        <i class="fa fa-star-o"></i>
                      </div>
                    <?php endif; ?>
                    <?php if ($sportvenue->star >= 2): ?>
                      <div class="star">
                        <i class="fa fa-star"></i>
                      </div>
                    <?php else: ?>
                      <div class="star">
                        <i class="fa fa-star-o"></i>
                      </div>
                    <?php endif; ?>
                    <?php if ($sportvenue->star >= 3): ?>
                      <div class="star">
                        <i class="fa fa-star"></i>
                      </div>
                    <?php else: ?>
                      <div class="star">
                        <i class="fa fa-star-o"></i>
                      </div>
                    <?php endif; ?>
                    <?php if ($sportvenue->star >= 4): ?>
                      <div class="star">
                        <i class="fa fa-star"></i>
                      </div>
                    <?php else: ?>
                      <div class="star">
                        <i class="fa fa-star-o"></i>
                      </div>
                    <?php endif; ?>
                    <?php if ($sportvenue->star >= 5): ?>
                      <div class="star">
                        <i class="fa fa-star"></i>
                      </div>
                    <?php else: ?>
                      <div class="star">
                        <i class="fa fa-star-o"></i>
                      </div>
                    <?php endif; ?>
                    <div class="rating-number">{{$sportvenue->sportvenuereviews->count()}} {{trans('app.Reviews')}}</div>
                  </div>
                <?php endif; ?>
                <div class="product-description detail-info-entry"></div>
                <div class="detail-info-entry">
                  <!-- <div class="prev">IDR 75000/Jam</div> -->
                  {{trans('app.PriceList')}} : <br>
                  @foreach ($sportvenue->sportvenueprices as $price)
                    {{App\Day::find($price->from_day)->day}} - {{App\Day::find($price->to_day)->day}},
                    {{substr($price->start_time,0,5)}} - {{substr($price->end_time,0,5)}} :
                    <span class="price current">Rp {{number_format( $price->price , 2 , ',' , '.' )}}</span>
                  @endforeach
                  <br>
                </div>
                <?php if ($sportvenue->sportvenueprices->count() > 0): ?>
                  <form action="/sportvenue/{{$id}}/booking" method="post">
                    {{csrf_field()}}
                    <div class="size-selector detail-info-entry">
                      <label>{{trans('app.Date')}}</label>
                      <input type="number" name="sportvenue_id" value="{{$id}}" hidden>
                      <input class="form-control" name="date" id="date" type="date" value="<?php echo date('m/d/y');?>" / required>
                      <label>{{trans('app.PlayTime')}}</label>
                      <select name="start_time" id="sh" class="form-control" / required>
                        @for ($i = 0; $i < 24; $i++)
                          @if ($i < 10)
                            <option value="0{{$i}}:00" >0{{$i}}:00</option>
                          @else
                            <option value="{{$i}}:00" >{{$i}}:00</option>
                          @endif
                        @endfor
                      </select>
                      <label>{{trans('app.Howmuchplay')}}? ({{trans('app.Hours')}})</label>
                      <select name="end_time" id="hl" class="form-control" type="number" / required>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                      </select>
                    </div>
                    <div class="detail-info-entry">
                      <a class="button style-10">{{trans('app.BookingNow')}}
                          <input type="submit" value="" />
                      </a>
                      <a target="_blank" href="/venuewishlist/{{$sportvenue->id}}" class="button style-11">
                        <i class="fa fa-heart"></i> {{trans('app.Addto')}} {{trans('app.Wishlist')}}
                      </a>
                      <div class="clear"></div>
                    </div>
                  </form>
                <?php else: ?>
                  <div class="detail-info-entry">
                    <!-- <a class="button style-10">{{trans('app.BookingNow')}}
                        <input type="submit" value="" />
                    </a> -->
                    <a target="_blank" href="/venuewishlist/{{$sportvenue->id}}" class="button style-11">
                      <i class="fa fa-heart"></i> {{trans('app.Addto')}} {{trans('app.Wishlist')}}
                    </a>
                    <div class="clear"></div>
                  </div>
                <?php endif; ?>
                <div class="tags-selector detail-info-entry">
                  <div class="detail-info-entry-title">{{trans('app.Tags')}}:</div> {{$sportvenue->tags}}
                </div>
                <div class="share-box detail-info-entry">
                  <div class="title">{{trans('app.ShareSocial')}}</div>
                  <div class="socials-box">
                    <a target="_blank" href="https://www.facebook.com/sharer.php?u={{url()->full()}}">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a target="_blank" href="https://twitter.com/intent/tweet?text={{$sportvenue->name}} - {{trans('app.SportVenue')}} - KuyRek&url={{url()->full()}}&via=KuyRek&original_referer={{url()->full()}}">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a target="_blank" href="https://plus.google.com/share?url={{url()->full()}}">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url={{url()->full()}}&title={{$sportvenue->name}} - {{trans('app.SportVenue')}} - KuyRek&ro=false&summary={{trans('app.Exercisein')}} {{$sportvenue->name}}! {{trans('app.OnlyonKO')}}&source=">
                        <i class="fa fa-linkedin"></i>
                    </a>
                  </div>
                  <div class="clear"></div>
                </div>
              </div>
            </div>
            <div class="clear visible-xs visible-sm"></div>
            <div class="col-md-4 col-lg-3 information-entry product-sidebar">
              <div class="row">
                <div class="col-md-12">
                  <div class="information-blocks">
                    <div class="information-entry products-list">
                      <h3 class="block-title inline-product-column-title">Vendor</h3>
                      <div class="information-blocks production-logo">
                        <div class="logo">
                          <img src="/images/{{$sportvenue->sportvenuevendor->id}}/vendor/{{$sportvenue->sportvenuevendor->profile_photo}}" style="max-height: 128px; max-width: 128px;" alt="" />
                        </div>
                      </div>
                      <h3 class="block-title inline-product-column-title">{{trans('app.OtherVenue')}}</h3>
                      @foreach ($sportvenuevendors as $sportvendor)
                        @if ($sportvendor->official == true)
                          <div class="inline-product-entry">
                            <a href="/sportvenueofficial/{{$sportvendor->id}}" class="image">
                                    <img src="/images/{{$sportvendor->sportvenuevendor_id}}/sportvenue/{{$sportvendor->image1}}">
                                </a>
                            <div class="content">
                              <div class="cell-view">
                                <a href="/sportvenueofficial/{{$sportvendor->id}}" class="title">{{$sportvendor->name}}</a>
                                <div class="price">
                                  <?php
                                    $a = 0;
                                  ?>
                                    {{trans('app.Start')}}
                                    @foreach ($sportvendor->sportvenueprices as $price)
                                      @if ($a < $price->price)
                                        <?php
                                          $a = $price->price;
                                        ?>
                                        <div class="current">IDR {{$a}}</div>
                                      @endif
                                    @endforeach
                                </div>
                              </div>
                            </div>
                            <div class="clear"></div>
                          </div>
                        @else
                          <div class="inline-product-entry">
                            <a href="/sportvenuenotofficial/{{$sportvendor->id}}" class="image">
                                <img src="/images/{{$sportvendor->sportvenuevendor_id}}/sportvenue/{{$sportvendor->image1}}">
                            </a>
                            <div class="content">
                              <div class="cell-view">
                                <a href="/sportvenuenotofficial/{{$sportvendor->id}}" class="title">{{$sportvendor->name}}</a>
                                <div class="price">
                                  <a href="/sportvenuenotofficial/{{$sportvendor->id}}" class="current">{{trans('app.BookingNow')}}</a>
                                </div>
                              </div>
                            </div>
                            <div class="clear"></div>
                          </div>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="information-blocks">
          <div class="tabs-container style-1">
            <div class="swiper-tabs tabs-switch">
              <div class="title">{{trans('app.DetailVenue')}}</div>
              <div class="list">
                <a class="tab-switcher active">{{trans('app.Description')}}</a>
                <a class="tab-switcher">{{trans('app.Schedule')}}</a>
                <a class="tab-switcher">{{trans('app.Review')}}</a>
                <div class="clear"></div>
              </div>
            </div>
            <div>
              <div class="tabs-entry">
                <div class="article-container style-1">
                  <div class="row">
                    <div class="col-md-6 information-entry">
                      <h4>GOOGLE MAPS</h4>
                      <div class="map-box type-2">
                        <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyC2qc6uSBA7EE9i1oJGvAJsPigmYV_Xp1Q&q={{$sportvenue->sportvenuedescription->lat}},{{$sportvenue->sportvenuedescription->lng}}"
                          width="100%" height="350" frameborder="1" style="border:0" allowfullscreen></iframe>
                      </div>
                    </div>
                    <div class="col-md-6 information-entry">
                      <h4>{{trans('app.DETAIL')}}</h4>
                      <p><b>{{trans('app.Address')}} : </b>{{$sportvenue->sportvenuedescription->address}}</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tabs-entry">
                  <div class="article-container style-1">
                      <div class="row">
                          <div class="col-md-12 information-entry">
                              <h4>{{trans('app.BOOKSCHEDULE')}}</h4>
                              <div class="jadwal" id='calendar'></div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="tabs-entry">
                <div class="article-container style-1">
                  <div class="row">
                    <div class="col-md-12 information-entry">
                      <h4>{{trans('app.ReviewFromUsers')}}</h4>
                      <form role="form" action="/sportvenue/{{$sportvenue->id}}" method="post">
                        {{csrf_field()}}
                        <div class="row">
                          <div class="col-sm-12">
                            <label>Rating <span>*</span></label>
                            <div class="simple-drop-down simple-field">
                              <select name="star" id="star" required>
                                  <option value="1">{{trans('app.Star')}} 1</option>
                                  <option value="2">{{trans('app.Star')}} 2</option>
                                  <option value="3">{{trans('app.Star')}} 3</option>
                                  <option value="4">{{trans('app.Star')}} 4</option>
                                  <option value="5">{{trans('app.Star')}} 5</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-12">
                            <label>{{trans('app.Review')}} <span>*</span></label>
                            <textarea class="simple-field" name="review" placeholder="review" required>{{old('review')}}</textarea>
                            <div class="button style-10">{{trans('app.SendReview')}}
                              <input type="submit" value="" />
                            </div>
                          </div>
                        </div>
                      </form>
                      <div class="block-title"></div>
                      <div class="blog-entry">
                        <h4 class="additional-blog-title">{{trans('app.Review')}} ({{$sportvenue->sportvenuereviews->count()}})</h4>
                        <?php foreach ($sportvenue->sportvenuereviews as $review): ?>
                          <div class="comment">
                            <a class="comment-image" href="#">
                              <?php if ($review->user->userprofile): ?>
                                <img class="img-circle" src="/images/user/{{$review->user->id}}/{{$review->user->userprofile->profile_photo}}" alt="" />
                              <?php else: ?>
                                <img class="img-circle" src="/img/user_icon.png" alt="" />
                              <?php endif; ?>
                            </a>
                            <div class="comment-content">
                              <div class="comment-title">
                                <?php
                                  $dt = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $review->created_at);
                                ?>
                                <span>{{$review->user->name}}</span>, <?php echo $dt->format('H:i'); ?>, <?php echo $dt->format('d F Y'); ?></div>
                              <div class="rating-box">
                                <?php if ($review->star >= 1): ?>
                                  <div class="star">
                                    <i class="fa fa-star"></i>
                                  </div>
                                <?php else: ?>
                                  <div class="star">
                                    <i class="fa fa-star-o"></i>
                                  </div>
                                <?php endif; ?>
                                <?php if ($review->star >= 2): ?>
                                  <div class="star">
                                    <i class="fa fa-star"></i>
                                  </div>
                                <?php else: ?>
                                  <div class="star">
                                    <i class="fa fa-star-o"></i>
                                  </div>
                                <?php endif; ?>
                                <?php if ($review->star >= 3): ?>
                                  <div class="star">
                                    <i class="fa fa-star"></i>
                                  </div>
                                <?php else: ?>
                                  <div class="star">
                                    <i class="fa fa-star-o"></i>
                                  </div>
                                <?php endif; ?>
                                <?php if ($review->star >= 4): ?>
                                  <div class="star">
                                    <i class="fa fa-star"></i>
                                  </div>
                                <?php else: ?>
                                  <div class="star">
                                    <i class="fa fa-star-o"></i>
                                  </div>
                                <?php endif; ?>
                                <?php if ($review->star >= 5): ?>
                                  <div class="star">
                                    <i class="fa fa-star"></i>
                                  </div>
                                <?php else: ?>
                                  <div class="star">
                                    <i class="fa fa-star-o"></i>
                                  </div>
                                <?php endif; ?>
                              </div>
                              <div class="comment-text">{{$review->review}}</div>
                            </div>
                          </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="information-blocks text-center">
          <div class="tabs-container">
            <h2 class="block-title">{{trans('app.SportVenue')}}</h2>
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
                      <?php foreach ($sportvenues->where('id', '!=', $sportvenue->id)->orderBy('star', 'desc')->paginate(4) as $sportvenue1): ?>
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
                      <?php foreach ($sportvenues->where('id', '!=', $sportvenue->id)->orderBy('see', 'desc')->paginate(4) as $sportvenue2): ?>
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
                      <?php foreach ($sportvenues->where('id', '!=', $sportvenue->id)->orderBy('created_at', 'desc')->paginate(4) as $sportvenue3): ?>
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

    <!-- FOOTER -->
    @include('layout.footer')

  </div>

  </div>
  <div class="clear"></div>

  </div>

  @include('layout.search') @include('layout.cart')

  <script type="text/javascript">
    $('#date').on('click change', function(e){
      console.log(e);
      var a = e.target.value;
      b =
    });
  </script>
  <script type="text/javascript">
    $('#sh').on('click change', function(e){
      console.log(e);
      var i = e.target.value;

      $('#hl').empty();

      var a = parseInt(i.substring(0, 2));

      if (a == 23) {
        $('#hl').append('<option value ="1">1</option>');
      } else if (a == 22) {
        $('#hl').append('<option value ="1">1</option>');
        $('#hl').append('<option value ="2">2</option>');
      } else {
        $('#hl').append('<option value ="1">1</option>');
        $('#hl').append('<option value ="2">2</option>');
        $('#hl').append('<option value ="3">3</option>');
      }
    });
  </script>

  <script src="/js/jquery-2.1.3.min.js"></script>
  <script src="/js/idangerous.swiper.min.js"></script>
  <script src="/js/global.js"></script>

  <!-- custom scrollbar -->
  <script src="/js/jquery.mousewheel.js"></script>
  <script src="/js/jquery.jscrollpane.min.js"></script>

  <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css' rel='stylesheet' />
  <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.print.css' rel='stylesheet' media='print' />
  <script src='/lib/moment.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js'></script>
  <script>
    $(document).ready(function() {

      $('#calendar').fullCalendar({
        header: {
          left: 'prev,next',
          center: 'title',
          right: 'listDay,listWeek,month'
        },

        // customize the button names,
        // otherwise they'd all just say "list"
        views: {
          listDay: {
            buttonText: 'hari'
          },
          listWeek: {
            buttonText: 'minggu'
          },
          month: {
            buttonText: 'bulan'
          },
        },

        defaultView: 'listWeek',
        navLinks: true, // can click day/week names to navigate views
        editable: false,
        eventLimit: true, // allow "more" link when too many events
        events: [
          @foreach ($sportvenue->sportvenuebookings->where('transfer', 1) as $sportvenuebooking)
            {
              title: '{{$sportvenuebooking->user->name}}',
              start: '{{$sportvenuebooking->date}}T{{$sportvenuebooking->start_time}}',
              end: '{{$sportvenuebooking->date}}T{{$sportvenuebooking->end_time}}'
            },
          @endforeach
        ],
        timeFormat: 'HH:mm'
      });

    });
  </script>
</body>

</html>
