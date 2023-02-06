<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('backend/assets/plugins/fontawesome-free/css/all.min.css')}}">
<!-- Theme style -->
@if(LaravelLocalization::getCurrentLocaleDirection() === 'rtl')
<link rel="stylesheet" href="{{asset('backend/assets/dist/css/adminlte_RTL.css')}}">
@else
<link rel="stylesheet" href="{{asset('backend/assets/dist/css/adminlte.css')}}">
@endif
