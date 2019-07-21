<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{trans('app.EmailConfirmation')}}</title>
  </head>
  <body>
    <h1>{{trans('app.Thankyouforregister')}}.</h1>
    <p>
      {{trans('app.Toconfirm')}} <a href="{{url("register/confirm/{$user->token}")}}"> {{trans('here')}}.</a>
    </p>
  </body>
</html>
