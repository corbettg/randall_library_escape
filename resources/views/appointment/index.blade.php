@extends('layouts.main')

@section('content')
@if(count($apts) > 0)
<div id="body" class="bg-1">
  <div class="container">
    <h2> All appointments </h2>
    <div class="row text-center">
      <table class="table">
          <thead>
              <tr>
                  <th>Name</th>
                  <th>Phone number</th>
                  <th>Appointment time (UTC)</th>
                  <th>Notification time</th>
                  <th>Actions</th>
                  <th></th>
              </tr>
          </thead>
          <tbody>
          @foreach($apts as $apt)
              <tr>
                  <td> {{ $apt->name }}</td>
                  <td> {{ $apt->phoneNumber }}</td>
                  <td> {{ $apt->when }}</td>
                  <td> {{ $apt->notificationTime }}</td>
                  <td> todo: Delete Button </td>
                  <td> todo: Edit Button </td>
              </tr>
          @endforeach
          </tbody>
      </table>
    </div>
  </div>
</div>
@else
<div id="body" class="bg-1">
  <div class="container">
    <div class="row text-center">
      <h2> All appointments </h2>
      <div class="well"> There are no appointments to display </div>
    </div>
  </div>
</div>
@endif

@stop
