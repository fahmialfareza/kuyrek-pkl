<div class="col-md-3 sidebar-column">
  <div class="sidebar-navigation">
    <div class="title">{{trans('app.User')}}<i class="fa fa-angle-down"></i></div>

    <div class="list">
      <a class="entry <?php if (Request::is('howtouseuser*')): ?>
        active
      <?php endif; ?>" href="/howtouseuser"><span><i class="fa fa-angle-right"></i>{{trans('app.Howtouse')}}</span></a>
      <a class="entry <?php if (Request::is('payment*')): ?>
        active
      <?php endif; ?>" href="/payment"><span><i class="fa fa-angle-right"></i>{{trans('app.Payment')}}</span></a>
      <a class="entry <?php if (Request::is('secureguarantee*')): ?>
        active
      <?php endif; ?>" href="/secureguarantee"><span><i class="fa fa-angle-right"></i>{{trans('app.SecureGuarantee')}}</span></a>
    </div>
  </div>
</div>
