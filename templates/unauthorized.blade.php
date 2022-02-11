@extends('login')
@section('pagetitle')
    {{ f('page.title', 'Unauthorized') }}
@stop
@section('content')
<div class="login-form login-signin">
    <div class="pb-13 pt-lg-0 pt-5">
        <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Unauthorized</h3>
        <span class="text-muted font-weight-bold font-size-h4">You are not authorized to access this page, maybe you should <a href="{{ URL::site('/login').'?!continue='.\Bono\Helper\URL::redirect() }}" id="kt_login_signup" class="text-primary font-weight-bolder">Sign In</a> first to access it.</span>
    </div>
</div>
@stop