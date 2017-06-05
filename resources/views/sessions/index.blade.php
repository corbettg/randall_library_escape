@extends("layouts.admin")

@section("content")

    <h3 class="text-center">Sessions Dates</h3>

    <ul class="list-group">
    <?php
          $datesArray[] = '';
          $times = 1;
          $dateHolder = new DateTime('1993-11-20');
    ?>
    @foreach ($sessions as $session)
      <?php $date = new DateTime($session->date);?>
        @if (date_format($date, 'l jS F Y') !== date_format($dateHolder, 'l jS F Y'))
          <?php $times = 1;
                array_push($datesArray, "<li class='list-group-item text-primary'>" .
                date_format($date, 'l jS F Y') .
                "<span class='badge'>" . $times . " Session(s)</span></li>");?>
        @else
          <?php array_pop($datesArray); $times++;
                array_push($datesArray, "<li class='list-group-item text-primary'>" .
                date_format($date, 'l jS F Y') .
                "<span class='badge'>" . $times . " Session(s)</span></li>");?>
        @endif
      <?php $dateHolder = $date ?>
    @endforeach
    @foreach ($datesArray as $date)
      <?php echo $date; ?>
    @endforeach
    </ul>

    <button class="btn btn-primary text-center"><span class="glyphicon glyphicon glyphicon-chevron-left"></span></button>
    <button class="btn btn-primary text-center"><span class="glyphicon glyphicon glyphicon-chevron-right"></span></button>
    <button class="btn btn-primary text-center">Add Session Date</button>


    <h3 class="text-center">Sessions Times</h3>
    <ul>
    @foreach ($sessions as $session)
    <?php $date = new DateTime($session->date);?>
      <li><?php echo date_format($date, 'g:ia \o\n l jS F Y'); ?></li>
    @endforeach
    </ul>

    <div class="row text-center" style="margin-top: 50px;">
      <button class="btn btn-primary">Add Session Time</button>
    </div>

    <ul class="list-group">
      <li class="list-group-item">Monday <span class="badge">8 Spots Available</span> <button class="btn" data-toggle="modal" data-target="#myModal">Make Reservation</button></li>
      <li class="list-group-item">Tuesday <span class="badge">2 Spots Available</span> <button class="btn" data-toggle="modal" data-target="#myModal">Make Reservation</button></li>
      <li class="list-group-item">Wednesday <span class="label label-danger">Booked!</span></li>
      <li class="list-group-item">Thursday <span class="badge">4 Spots Available</span> <button class="btn" data-toggle="modal" data-target="#myModal">Make Reservation</button></li>
      <li class="list-group-item">Friday <span class="label label-danger">Booked!</span></li>
    </ul>

@endsection

@section('scripts')

<script>
$(document).ready(function(){
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
