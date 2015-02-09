@if(isset($logged_user) && $logged_user->user_profile()->count())
    <img src="{{assets_path().'/images/avtar.png'}}" width="{{$size}}">
@else
    <img src="{{assets_path().'/images/avtar.png'}}" width="{{$size}}">
@endif