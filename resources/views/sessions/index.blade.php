<?php
if(!isset($message)) $message='none';

$datesArray[] = '';
$timesArray[] = '';
$reservationsArray[] = '';
$times = 1;
$dateHolder = new DateTime('1993-11-20');

foreach ($sessions as $session) {
  $date = new DateTime($session->date);
    //Sets up datesArray[]
    if (date_format($date, 'l F jS') !== date_format($dateHolder, 'l F jS')) {
            $times = 1;
            array_push($datesArray, "<li class='list-group-item text-primary session_date' id='" .
            date_format($date, 'n/j/Y') ."'>" . date_format($date, 'l F jS') .
            "<span class='badge'>" . $times . " Session(s)</span></li>");
    } else {
            array_pop($datesArray); $times++;
            array_push($datesArray, "<li class='list-group-item text-primary session_date' id='" .
            date_format($date, 'n/j/Y') ."'>" . date_format($date, 'l F jS') .
            "<span class='badge'>" . $times . " Session(s)</span></li>");
    }

  //Sets up timesArray[]
  array_push($timesArray, "<li id='ID" . $session->id . "Session' class='list-group-item text-primary session_time " .
  date_format($date, 'n/j/Y') ."'>" . date_format($date, 'l F jS g:i:s A') .
  "<span class='badge'>" . $session->reservations . " Reservation(s)</span></li>");

  $dateHolder = $date;
}

foreach ($reservations as $reservation) {
  array_push($reservationsArray, "<li class='list-group-item text-primary session_reservation ID" . $reservation->session . "Session'>". $reservation->user . "</li>");
}

?>


@extends("layouts.admin")

@section("content")


  <div class="row text-center">
    @if ($message == 'success')
    <div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok"></span> Session Date Added
      <button type="button" class="close" style="color:#000 !important" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @else
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign"></span> {{ $error }}
              <button type="button" class="close" style="color:#000 !important" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        @endforeach
    @endif
  </div>


    <h3 class="text-center">Sessions Dates</h3>
      <ul id="datesList" class="list-group">
        @for ($k = 0; $k < 6; $k++)
          <?php echo $datesArray[$k]; ?>
        @endfor
      </ul>
    <div class="row text-center">
      <button class="btn btn-primary text-center" id="btn-previous"><span class="glyphicon glyphicon-chevron-left "></span></button>
      <button class="btn btn-primary text-center" id="btn-next"><span class="glyphicon glyphicon-chevron-right"></span></button>
    </div>

    <h3 class="text-center">Sessions Times</h3>
      <ul id="timesList" class="list-group">
        <li class="list-group-item text-danger text-center">Click on a Session Date above to see Session Times</span></li>
      </ul>

    <h3 class="text-center">Reservations In Session</h3>
      <ul id="reservationsList" class="list-group">
        <li class="list-group-item text-danger text-center">Click on a Session Time above to see Session Reservations</span></li>
      </ul>

    <div class="row text-center">
      <button class="btn btn-primary" style="font-size:2.5em;" data-toggle="modal" data-target="#myModal">Add Session</button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h4><span class="glyphicon glyphicon-calendar"></span> New Session</h4>
          </div>
          <div class="modal-body">
            <form role="form"  method="post">
              <input type='hidden' name='_token' value='{{ csrf_token() }}'>
              <div class="row">
                <div style="overflow:hidden;">
                  <div class="form-group">
                      <div class="row">
                          <div class="col-md-12">
                              <div id="datetimepicker12">
                                  <input type='hidden' id='date' name='date' class="form-control" />
                              </div>
                          </div>
                      </div>
                  </div>
                <button type="submit" class="btn btn-block">ADD <span class="glyphicon glyphicon-ok"></span>
                </button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
              <span class="glyphicon glyphicon-remove"></span> Cancel
            </button>
            <p>Need <a href="#">help?</a></p>
          </div>
        </div>
      </div>
    </div>

@endsection

@section('scripts')

<script>
$(document).ready(function(){

  $('#datetimepicker12').datetimepicker({
      //defaultDate: "6/1/2017 08:00:00",
      format: 'YYYY-MM-DD HH:mm:00',
      inline: true,
      sideBySide: true
  });

  var allDates = <?php echo json_encode($datesArray); ?>;
  var allTimes = <?php echo json_encode($timesArray); ?>;
  var allReservations = <?php echo json_encode($reservationsArray); ?>;
  var datesPagination = 0;
  var datesPaginationMax = Math.floor(allDates.length / 5);
  console.log(datesPaginationMax);

  $('#btn-previous').on('click', function() {
    var sessionDatesArray = [];
      if ( datesPagination > 0 ) {
        $('#datesList').html('');
        var start = datesPagination * 5 - 4;
        var stop = start + 5;
          for (i = start; i < stop; i++) {
              sessionDatesArray.push(allDates[i]);
          }
          datesPagination--;
      }
    $('#datesList').append(sessionDatesArray);
    console.log(datesPagination);
  });
  $('#btn-next').on('click', function() {
    var sessionDatesArray = [];
      if ( datesPagination < datesPaginationMax ) {
        $('#datesList').html('');
        var start = datesPagination * 5 + 6;
        var stop = start + 5;
          for (i = start; i < stop; i++) {
              sessionDatesArray.push(allDates[i]);
          }
          datesPagination++;
      }
    $('#datesList').append(sessionDatesArray);
    console.log(datesPagination);
  });

  $(document).on('click', '.session_date', function() {
    $('#timesList').html('');
    var sessionDate = $(this).attr('id');
    console.log(sessionDate);
    var sessionTimesArray = [];
    $.each( allTimes, function( i, v ){
        if(v.indexOf(sessionDate) >= 0) {sessionTimesArray.push(v);}
    });
    $('#timesList').append(sessionTimesArray);
  });

  $(document).on('click', '.session_time', function() {
    $('#reservationsList').html('');
    var sessionTimeID = $(this).attr('id');
    console.log(sessionTimeID);
    var sessionReservationsArray = [];
    $.each( allReservations, function( i, v ){
        if(v.indexOf(sessionTimeID) >= 0) {sessionReservationsArray.push(v);}
    });
    $('#reservationsList').append(sessionReservationsArray);
  });


  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip();

  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#home']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>

@endsection
