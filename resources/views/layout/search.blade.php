<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

<div class="search-box popup">
  @if (Request::is('sportvenue*'))
    <form action="/sportvenue">
  @endif
    <div class="search-button">
      <i class="fa fa-search"></i>
      <input type="submit" />
    </div>
    <div class="search-drop-down">
      @if (Request::is('sportvenue*'))
        <div class="title"><span>{{trans('app.SportVenue')}}</span><i class="fa fa-angle-down"></i></div>
      @endif
    </div>
    <div class="search-field">
      @if (Request::is('sportvenue*'))
        <input type="text" value="{{Request::get('search')}}" name="search" placeholder="{{trans('app.SportVenue')}}" />
      @endif
    </div>
  </form>
</div>

<script type="text/javascript">
  $('#sportvenue').on('click change', function() {
      var a = $("#sportvenue").text();
      console.log(a);
  });
</script>
