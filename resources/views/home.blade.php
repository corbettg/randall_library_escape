<?php
$loginLINK = action('RandallAuthController@login');

if(!isset($message)) $message='none';
$datesArray[] = '';
$timesArray[] = '';
$reservationsArray[] = '';
$times = 1;
$currentDate = new DateTime();
$dateHolder = new DateTime('1993-11-20');

foreach ($sessions as $session) {
  $date = new DateTime($session->date);
  if ($date > $currentDate) {
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
  }

  //Sets up timesArray[]
  $spotsAvaiable = 10 - $session->num_of_reservations;
  $reservationSlothtml = "<li id='SessionID" . $session->id . "' class='list-group-item text-primary session_time " .
  date_format($date, 'n/j/Y') ."'>" . date_format($date, 'l F jS g:i A');

  if ($spotsAvaiable == 0) {
    $reservationSlothtml .= "<span class='label label-danger'> Fully Booked!</span></li>";
  } else {
    if (randallAuth()) {
      $reservationSlothtml .= "<span class='badge'>" . $spotsAvaiable . " Spot(s) Available</span>
      <button id='" . date_format($date, 'm/d/y g:i A') . "'class='btn' data-toggle='modal' data-target='#myModal'>Make Reservation</button></li>";
    } else {
      $reservationSlothtml .= " <a href='" . $loginLINK . "'><button class='btn'>
      You must be logged in to make a reservation. Click here to login</button></a></li>";
    }
  }

  array_push($timesArray, $reservationSlothtml);

  $dateHolder = $date;
}

?>

@extends("layouts.main")

@section("content")
<!-- Rotater Section -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="images/webBanner.jpg" alt="League Background" width="100%" height="600">
        <div class="carousel-caption">
          <h3>ESCAPE FROM RANDALL LIBRARY</h3>
          <p>SEPTEBER 2017</p>
        </div>
      </div>
      <div class="item">
        <img src="images/randall.jpg" alt="Randall02" width="100%" >
        <div class="carousel-caption">
          <h3>Randall Library 2</h3>
          <p>Image 2 of Randall Library</p>
        </div>
      </div>
    </div>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<!-- About Section-->
<div id="about" class="container text-center">
  <h3>ABOUT</h3>
  <p>Welcome, recruits, to the Academy of Extraordinary Research! The League of Extraordinary Researchers has developed one
     last test before you can begin your training--the escape room. You and your team will be locked in our testing chamber,
     and will face a series of library-related puzzles, tasks, and challenges. Complete them all--and escape the room--within 60 minutes,
     and we'll welcome you into the Academy. Assuming our nemesis, the Dewey Decimator, hasn't interfered somehow..."</p>
  <br>
  <div class="row">
    <div class="col-sm-4">
      <p class="text-center"><strong>Puzzles</strong></p><br>
      <a href="#demo" data-toggle="collapse">
        <img src="images/cryptex.jpg" class="img-circle person" alt="Random Name" width="100" height="100">
      </a>
      <div id="demo" class="collapse">
        <p>Additional Info</p>
      </div>
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>Excitement</strong></p><br>
      <a href="#demo2" data-toggle="collapse">
        <img src="images/lock.jpg" class="img-circle person" alt="Random Name" width="100" height="100">
      </a>
      <div id="demo2" class="collapse">
        <p>Additional Info</p>
      </div>
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>Knowledge</strong></p><br>
      <a href="#demo3" data-toggle="collapse">
        <img src="images/book.jpg" class="img-circle person" alt="Random Name" width="100" height="100">
      </a>
      <div id="demo3" class="collapse">
        <p>Additional Info</p>
      </div>
    </div>
  </div>
</div>

<!-- Reservation Section -->
<div id="reserve" class="bg-1">
  <div class="container">
    <h3 class="text-center">RESERVE</h3>
    <!-- Flash Messages Section -->
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
    <!-- Available Dates and Times Sections -->
    <ul id="datesList" class="list-group">
      <?php sizeof($datesArray) < 6 ? $countTo = sizeof($datesArray) : $countTo = 6;
      for ($k = 0; $k < $countTo; $k++) {
        echo $datesArray[$k];
      } ?>
    </ul>
    <div class="row text-center">
      <button class="btn btn-primary text-center" id="btn-previous"><span class="glyphicon glyphicon-chevron-left "></span></button>
      <button class="btn btn-primary text-center" id="btn-next"><span class="glyphicon glyphicon-chevron-right"></span></button>
    </div>
    <h3 class="text-center">Sessions</h3>
      <ul id="timesList" class="list-group">
        <li class="list-group-item text-danger text-center">Click on a Session Date above to see Session Times</span></li>
      </ul>
  </div>

  <!-- Reservation Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h><span class="glyphicon glyphicon-calendar"></span> Reservation</h4>
        </div>
        <div class="modal-body">
          <form role="form" method="post">
            <input type='hidden' name='_token' value='{{ csrf_token() }}'>
            <div class="form-group">
              <label for="name"><span class="glyphicon glyphicon-user"></span> Name:</label>
              <input type="text" class="form-control" id="name"  name="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-envelope"></span> UNCW Email:</label>
              <input type="email" class="form-control" id="email" name="email" value="{{randallAuth()}}@uncw.edu" disabled>
            </div>
            <div class="form-group">
              <label for="session"><span class="glyphicon glyphicon-calendar"></span> Session Date:</label>
              <input type="datetime" class="form-control" id="session_date" value="Choose A Session" disabled>
            </div>
            <div class="form-group"><p><hr>If you would like to recieve a text reminder, please provide your phone number and a notification time below:</p></div>
            <div class="form-group">
              <label for="phoneNumber"><span class="glyphicon glyphicon-phone"></span> Phone number:</label>
              <input type="phone" class="form-control" id="phone" name="phoneNumber" placeholder="XXXXXXXXXX">
            </div>
            <div class="form-group">
                <label for="delta">Notification time:</label>
                <select id="delta" name="delta"><option value="15">15 minutes before session</option><option value="30">30 minutes before session</option><option value="60">One hour before session</option></select>
            </div>
            <input type="hidden" id="session_id" name="session_id" value="NULL">
            <input type="hidden" id="user" name="user" value="{{randallAuth()}}">
            <input type="hidden" id="time-of-appointment" name="when" value="NULL">
            <input type="hidden" id="user-timezone" name="timezoneOffset" value="NULL">
              <button type="submit" class="btn btn-block">Reserve
                <span class="glyphicon glyphicon-ok"></span>
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
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container">
  <h3 class="text-center">Questions</h3>
  <div class="row">
    <div class="col-md-4">
      <p>Get Help</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> 601 S. College Road</p>
      <p><span class="glyphicon glyphicon-phone"></span> Phone: (910) 962-3760</p>
      <p><span class="glyphicon glyphicon-envelope"></span> Email: libref@uncw.edu</p>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="question" placeholder="Question" rows="5"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn pull-right" type="submit">Send</button>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- FAQ Section -->
  <div id="faqs" class="bg-1">
    <div class="container text-center">
      <h3 class="text-center">FAQs</h3>
        <div class="row" style="margin-top: 50px;">
          <div class='col-md-4'>
            <ul>
              <li class="faqQuestion active"><a data-toggle="tab" href="#faq1">What is this?</a></li>
              <li class="faqQuestion"><a data-toggle="tab" href="#faq2">Who can participate?</a></li>
              <li class="faqQuestion"><a data-toggle="tab" href="#faq3">How do I sign up?</a></li>
              <li class="faqQuestion"><a data-toggle="tab" href="#faq4">Where is the escape room?</a></li>
              <li class="faqQuestion"><a data-toggle="tab" href="#faq5">Is this a competition?</a></li>
            </ul>
          </div>
          <div class='col-md-8'>
            <div class="tab-content">
              <div id="faq1" class="tab-pane fade faqAnswer in active">
                <p>A temporary escape room hosted in Randall Library. Escape rooms are live-action puzzle-solving games,
                   in which small groups work together to solve all the puzzles before time runs out.
                   Our room is designed to refresh knowledge of library tools and resources, and of research skills.</p>
              </div>
              <div id="faq2" class="tab-pane fade faqAnswer">
                <p>At this time, Dewey Decimated! is only open to current UNCW students.</p>
              </div>
              <div id="faq3" class="tab-pane fade faqAnswer">
                <p>On the reservations page (this text linked), pick a date and time that work for you
                  and register for it! If you want to be in a group with your friends, find an open date
                  and time that works for all of you, and register at the same time. Up to 10 people can play at the same time.</p>
              </div>
              <div id="faq4" class="tab-pane fade faqAnswer">
                <p>In the Special Collections room in Randall Library, Room 2042 on the second floor.
                  <a href='http://library.uncw.edu/floormaps/maps/location/rl2042'>http://library.uncw.edu/floormaps/maps/location/rl2042</a></p>
              </div>
              <div id="faq5" class="tab-pane fade faqAnswer">
                <p>Glad you asked! We'll be keeping track of finishing times for every team that plays.
                  The fastest three teams will all win some great prizes, and of course eternal glory.</p>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>


<!-- Reviews Section -->
<div id="reviews">
  <div class="container text-center">
    <h3 class="text-center">Reviews</h3>
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#home">Student 1</a></li>
      <li><a data-toggle="tab" href="#menu1">Student 2</a></li>
      <li><a data-toggle="tab" href="#menu2">Student 3</a></li>
    </ul>

    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <h2>Student 1</h2>
        <p>This was the best thing ever!!</p>
      </div>
      <div id="menu1" class="tab-pane fade">
        <h2>Student 2</h2>
        <p>Man, the Randall Library ROCKS!</p>
      </div>
      <div id="menu2" class="tab-pane fade">
        <h2>Student 3</h2>
        <p>I cant wait to do this again!</p>
      </div>
    </div>

    <div class="row" style="margin-top: 50px;">
      <button class="btn btn-primary">Leave Review</button>
    </div>
  </div>
</div>


<!-- Add Google Maps -->
<div id="googleMap">
  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4711.454211836409!2d-77.87334509192117!3d34.2268515574177!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x44e363561eaccaac!2sWilliam+Madison+Randall+Library!5e0!3m2!1sen!2sus!4v1496113296344" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

@if (isset($anchor))
    <input type="hidden" name="anchor" value="{{ $anchor }}">
@endif

@endsection

@section('scripts')
<script>
$(document).ready(function(){

  if ( $( "[name='anchor']" ).length ) {
      window.location = '#' + $( "[name='anchor']" ).val();
  }

  var allDates = <?php echo json_encode($datesArray); ?>;
  var allTimes = <?php echo json_encode($timesArray); ?>;
  var datesPagination = 0;
  var datesPaginationMax = Math.floor(allDates.length / 5);

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

  $(document).on('click', '#timesList li .btn', function() {
    var session_id = $(this).parent().attr('id');
    session_id = session_id.slice(9);
    var content = $(this).parent().first().html();
    var dateToUseArray = content.split("<span");
    var dateToUse = dateToUseArray[0];
    var appointmentInISOFormat = new Date($(this).attr('id')).toISOString();

    $('#myModal #session_date').attr("value", dateToUse);
    $('#myModal #session_id').attr("value", session_id);
    $('#myModal #time-of-appointment').attr("value", appointmentInISOFormat);
    $('#myModal #user-timezone').attr("value", new Date().getTimezoneOffset());
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
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    }
  });
})
</script>
@endsection
