<div class="col-md-3 sidebar-column">
  <div class="sidebar-navigation">
    <div class="title">KO<i class="fa fa-angle-down"></i></div>

    <div class="list">
      <a class="entry <?php if (Request::is('howtousevendor*')): ?>
        active
      <?php endif; ?>" href="/howtousevendor"><span><i class="fa fa-angle-right"></i>{{trans('app.Howtouse')}}</span></a>
      <a class="entry <?php if (Request::is('vendoradvantages*')): ?>
        active
      <?php endif; ?>" href="/vendoradvantages"><span><i class="fa fa-angle-right"></i>{{trans('app.VendorAdvantages')}}</span></a>
      <a class="entry <?php if (Request::is('vendortips*')): ?>
        active
      <?php endif; ?>" href="/vendortips"><span><i class="fa fa-angle-right"></i>{{trans('app.VendorTips')}}</span></a>
      <a class="entry <?php if (Request::is('vendordirectory*')): ?>
        active
      <?php endif; ?>" href="/vendordirectory"><span><i class="fa fa-angle-right"></i>{{trans('app.VendorDirectories')}}</span></a>
    </div>
  </div>
</div>
