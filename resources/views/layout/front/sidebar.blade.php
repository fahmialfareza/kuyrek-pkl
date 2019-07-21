<div class="col-md-3 sidebar-column">
  <div class="sidebar-navigation">
    <div class="title">KuyRek<i class="fa fa-angle-down"></i></div>

    <div class="list">
      <a class="entry <?php if (Request::is('about*')): ?>
        active
      <?php endif; ?>" href="/about"><span><i class="fa fa-angle-right"></i>{{trans('app.About')}} KuyRek</span></a>
      <a class="entry <?php if (Request::is('ourteam*')): ?>
        active
      <?php endif; ?>" href="/ourteam"><span><i class="fa fa-angle-right"></i>{{trans('app.OurTeam')}}</span></a>
      <a class="entry <?php if (Request::is('award*')): ?>
        active
      <?php endif; ?>" href="/award"><span><i class="fa fa-angle-right"></i>{{trans('app.Achievements')}}</span></a>
      <a class="entry <?php if (Request::is('coverage*')): ?>
        active
      <?php endif; ?>" href="/coverage"><span><i class="fa fa-angle-right"></i>{{trans('app.Coverage')}}</span></a>
      <a class="entry <?php if (Request::is('gallery*')): ?>
        active
      <?php endif; ?>" href="/gallery"><span><i class="fa fa-angle-right"></i>{{trans('app.Gallery')}}</span></a>
      <!-- <a class="entry <?php if (Request::is('merchandise*')): ?>
        active
      <?php endif; ?>" href="/merchandise"><span><i class="fa fa-angle-right"></i>Merchandise</span></a> -->
      <!-- <a class="entry <?php if (Request::is('blog*')): ?>
        active
      <?php endif; ?>" href="/blog"><span><i class="fa fa-angle-right"></i>Blog KuyRek</span></a> -->
    </div>
  </div>
</div>
