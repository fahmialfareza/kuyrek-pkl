<div class="col-md-3 sidebar-column">
  <div class="sidebar-navigation">
    <div class="title">{{trans('app.Dashboard')}}<i class="fa fa-angle-down"></i></div>

    <div class="list">
      <a class="entry <?php if (Request::is('home/myprofile*')): ?>
        active
      <?php endif; ?>" href="/home/myprofile"><span><i class="fa fa-angle-right"></i>{{trans('app.MyProfile')}}</span></a>
      <a class="entry <?php if (Request::is('home/venuewishlist*')): ?>
        active
      <?php endif; ?>" href="/home/venuewishlist"><span><i class="fa fa-angle-right"></i>{{trans('app.WishlistSportVenue')}}</span></a>
      <a class="entry <?php if (Request::is('home/mybooking*')): ?>
        active
      <?php endif; ?>" href="/home/mybooking"><span><i class="fa fa-angle-right"></i>{{trans('app.MyBooking')}}</span></a>
      <!-- <a class="entry <?php if (Request::is('home/team*')): ?>
        active
      <?php endif; ?>" href="/home/team"><span><i class="fa fa-angle-right"></i>{{trans('app.MyTeam')}}</span></a> -->
      <!-- <a class="entry <?php if (Request::is('home/favouriteteam*')): ?>
        active
      <?php endif; ?>" href="/home/favouriteteam"><span><i class="fa fa-angle-right"></i>{{trans('app.FavouriteTeam')}}</span></a> -->
      <!-- <a class="entry <?php if (Request::is('home/myticket*')): ?>
        active
      <?php endif; ?>" href="/home/myticket"><span><i class="fa fa-angle-right"></i>Tiket Saya</span></a> -->
      <!-- <a class="entry <?php if (Request::is('home/mydonation*')): ?>
        active
      <?php endif; ?>" href="/home/mydonation"><span><i class="fa fa-angle-right"></i>Buat Donasi</span></a>
      <a class="entry <?php if (Request::is('home/createdonation*')): ?>
        active
      <?php endif; ?>" href="/home/mydonation"><span><i class="fa fa-angle-right"></i>Donasi Saya</span></a> -->
      <a class="entry <?php if (Request::is('home/setting*')): ?>
        active
      <?php endif; ?>" href="/home/setting"><span><i class="fa fa-angle-right"></i>{{trans('app.Setting')}}</span></a>
      <a class="entry <?php if (Request::is('home/password*')): ?>
        active
      <?php endif; ?>" href="/home/password"><span><i class="fa fa-angle-right"></i>{{trans('app.ChangePassword')}}</span></a>
      <a class="entry <?php if (Request::is('logout*')): ?>
        active
      <?php endif; ?>" href="/logout"><span><i class="fa fa-angle-right"></i>{{trans('app.Logout')}}</span></a>
    </div>
  </div>
</div>
