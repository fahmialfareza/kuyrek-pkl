<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

<div class="header-wrapper style-3">
  <header class="type-1">
    <div class="header-top">
      <div class="header-top-entry">
        <div class="title">
          @if (session('locale') == 'id')
            <img src="/img/flag-lang-2.png" alt="" />Bahasa Indonesia<i class="fa fa-caret-down"></i>
          @elseif (session('locale') == 'en')
            <img src="/img/flag-lang-1.png" alt="" />English<i class="fa fa-caret-down"></i>
          @else
            <img src="/img/flag-lang-2.png" alt="" />Bahasa Indonesia<i class="fa fa-caret-down"></i>
          @endif
        </div>
        <div class="list">
          <form role="form" method="POST" action="{{ url('/language') }}">
            <input type="text" name="locale" id="locale" value="id" hidden>
            {{ csrf_field() }}
            <button class="list-entry" style="border:0px;" type="submit"><img src="/img/flag-lang-2.png"/>Bahasa Indonesia</button>
          </form>
          <form role="form" method="POST" action="{{ url('/language') }}">
            <input type="text" name="locale" id="locale" value="en" hidden>
            {{ csrf_field() }}
            <button class="list-entry" style="border:0px;" type="submit"><img src="/img/flag-lang-1.png"/>English</button>
          </form>
        </div>
      </div>
      <div class="header-top-entry">
        <div class="title"><b>{{trans('app.Currency')}} : </b>IDR<i class="fa fa-caret-down"></i></div>
        <div class="list">
          <a href="#" class="list-entry">IDR</a>
        </div>
      </div>
      <div class="header-top-entry">
        <?php if (Auth::check()): ?>
          <div class="title"><i class="fa fa-user"></i>{{Auth::user()->name}}<i class="fa fa-caret-down"></i></div>
          <div class="list">
            <?php if (Auth::user()->admin == 1): ?>
              <a href="/admin/dashboard" class="list-entry">{{trans('app.MyAccount')}}</a>
            <?php elseif (Auth::user()->vendor == 1): ?>
              <a href="/vendor/dashboard" class="list-entry">{{trans('app.MyAccount')}}</a>
            <?php else: ?>
              <a href="/home/myprofile" class="list-entry">{{trans('app.MyAccount')}}</a>
            <?php endif; ?>
            <a href="/logout" class="list-entry">{{trans('app.Logout')}}</a>
          </div>
        <?php else: ?>
          <div class="title"><i class="fa fa-user"></i>{{trans('app.MyAccount')}}<i class="fa fa-caret-down"></i></div>
          <div class="list">
            <a href="/login" class="list-entry">{{trans('app.Login')}}</a>
            <a href="/register" class="list-entry">{{trans('app.Register')}}</a>
          </div>
        <?php endif; ?>
      </div>
      <div class="header-top-entry hidden-xs">
        <div class="title"><i class="fa fa-phone"></i>{{trans('app.Anyquestion?')}} <a href="tel:+6285799736884"><b>+6285799736884</b></a></div>
      </div>

      <div class="socials-box">
        <a target="_blank" href="https://www.facebook.com/kitaolahraga"><i class="fa fa-facebook"></i></a>
        <a target="_blank" href="https://www.linkedin.com/company/kita-olahraga"><i class="fa fa-linkedin"></i></a>
        <a target="_blank" href="https://www.instagram.com/kitaolahraga/"><i class="fa fa-instagram"></i></a>
      </div>
      <div class="menu-button responsive-menu-toggle-class"><i class="fa fa-reorder"></i></div>
      <div class="clear"></div>
    </div>

    <div class="header-middle">
      <div class="logo-wrapper">
        <a id="logo" href="/"><img src="/img/logo-4.png" alt="" /></a>
      </div>

      <div class="middle-entry">
        <a class="icon-entry" href="tel:6285799736884">
            <span class="image">
                <i class="fa fa-phone"></i>
            </span>
            <span class="text">
                <b>{{trans('app.ContactInfo')}}</b> <br/> (+62) 85799736884
            </span>
        </a>
        <a class="icon-entry" href="#">
            <span class="image">
                <i class="fa fa-soccer-ball-o"></i>
            </span>
            <span class="text">
                <b>{{trans('app.GetApp')}}</b> <br/> {{trans('app.DownloadExercise')}}
            </span>
        </a>
      </div>

      <div class="right-entries">
        @if (Request::is('sportvenue*'))
          <a class="header-functionality-entry open-search-popup" href="#"><i class="fa fa-search"></i><span>{{trans('app.Search')}}</span></a>
        @endif
        <!-- <a class="header-functionality-entry" href="#"><i class="fa fa-copy"></i><span>Compare</span></a> -->
        <a class="header-functionality-entry" href="/home/venuewishlist"><i class="fa fa-heart-o"></i><span>{{trans('app.Wishlist')}}</span></a>
        <!-- <a class="header-functionality-entry open-cart-popup" href="#"><i class="fa fa-shopping-cart"></i><span>Keranjangku</span> <b>Rp 255,00</b></a> -->
      </div>

    </div>

    <div class="close-header-layer"></div>
    <div class="navigation">
      <div class="navigation-header responsive-menu-toggle-class">
        <div class="title">{{trans('app.Navigation')}}</div>
        <div class="close-menu"></div>
      </div>
      <div class="nav-overflow">
        <div class="navigation-search-content">
          @if (Request::is('sportvenue*'))
            <div class="toggle-desktop-menu"><i class="fa fa-search"></i><i class="fa fa-close"></i>{{trans('app.SportVenue')}}</div>
          @endif
          <div class="search-box size-1">
            @if (Request::is('sportvenue*'))
              <form action="/sportvenue">
            @endif
              <div class="search-button">
                <i class="fa fa-search"></i>
                <input type="submit" />
              </div>
              <div class="search-field">
                @if (Request::is('sportvenue*'))
                  <input type="text" name="search" value="{{Request::get('search')}}" placeholder="{{trans('app.SportVenue')}}" />
                @endif
              </div>
            </form>
          </div>
        </div>
        <nav>
          <ul>
            <li><a href="/" class="<?php if (Request::is('/')): ?>
              active
            <?php endif; ?>">{{trans('app.HOME')}}</a></li>
            <li><a class="<?php if (Request::is('sportvenue*')): ?>
              active
            <?php endif; ?>" href="/sportvenue">{{trans('app.SEARCH')}} {{trans('app.SPORTVENUE')}}</a></li>
            <li class="fixed-header-visible">
              @if (Request::is('sportvenue*'))
                <a class="fixed-header-square-button open-search-popup"><i class="fa fa-search"></i></a>
              @endif
            </li>
          </ul>

          <div class="clear"></div>

          <a class="fixed-header-visible additional-header-logo" href="/"><img src="/img/logo-3.png" alt=""/></a>
        </nav>
        <div class="navigation-footer responsive-menu-toggle-class">
          <div class="socials-box">
            <a target="_blank" href="https://www.facebook.com/kitaolahraga"><i class="fa fa-facebook"></i></a>
            <!-- <a href="#"><i class="fa fa-twitter"></i></a> -->
            <!-- <a href="#"><i class="fa fa-google-plus"></i></a> -->
            <!-- <a href="#"><i class="fa fa-youtube"></i></a> -->
            <a target="_blank" href="https://www.linkedin.com/company/kita-olahraga"><i class="fa fa-linkedin"></i></a>
            <a target="_blank" href="https://www.instagram.com/kitaolahraga/"><i class="fa fa-instagram"></i></a>
            <div class="clear"></div>
          </div>
          <div class="navigation-copyright">{{trans('app.Copyright')}} &copy; 2018 <a href="/">KuyRek</a>. All rights reserved</div>
        </div>
      </div>
    </div>
  </header>
  <div class="clear"></div>
</div>

<script type="text/javascript">
  $('#sportvenue').on('click change', function() {
      var a = $("#my_div_id").text();
      console.log(a);
  });
</script>
