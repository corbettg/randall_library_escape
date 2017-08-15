<?php
$authenticate = action('RandallAuthController@authenticate');
if (!isset($warning))
    $warning = "";

?>


@extends('layouts.main')

@section ('content')
<div class="page_center title_page">
  <div class="container">
    <div class="col-md-4 col-md-offset-4 selectLocation">
      <h3 style="color:red">{{$warning}}</h3>
      <h1>Login</h1>
      <form action="{{$authenticate}}" method="get">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="returnUrl" value="{{ $returnUrl }}">
        <div class="form-group" >
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Username">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection
