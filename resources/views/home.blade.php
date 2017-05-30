<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Randall Library Escape Room</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      font: 400 15px/1.8 Lato, sans-serif;
      color: #777;
  }
  h3, h4 {
      margin: 10px 0 30px 0;
      letter-spacing: 10px;
      font-size: 20px;
      color: #111;
  }
  .container {
      padding: 80px 120px;
  }
  .person {
      border: 10px solid #ccc;
      margin-bottom: 25px;
      width: 80%;
      height: 80%;
      opacity: 0.7;
  }
  .person:hover {
      border-color: #006666;
  }
  .carousel-inner img {
      -webkit-filter: grayscale(90%);
      filter: grayscale(90%); /* make all photos black and white */
      width: 100%; /* Set width to 100% */
      margin: auto;
  }
  .carousel-caption h3 {
      color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  .bg-1 {
      background: #2d2d30;
      color: #bdbdbd;
  }
  .bg-1 h3 {color: #fff;}
  .bg-1 p {font-style: italic;}
  .list-group-item:first-child {
      border-top-right-radius: 0;
      border-top-left-radius: 0;
  }
  .list-group-item:last-child {
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail p {
      margin-top: 15px;
      color: #555;
  }
  .btn {
      padding: 10px 20px;
      background-color: #333;
      color: #f1f1f1;
      border-radius: 0;
      transition: .2s;
  }
  .btn:hover, .btn:focus {
      border: 1px solid #333;
      background-color: #fff;
      color: #000;
  }
  .modal-header, h4, .close {
      background-color: #333;
      color: #fff !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-header, .modal-body {
      padding: 40px 50px;
  }
  .nav-tabs li a {
      color: #777;
  }
  #googleMap {
      width: 100%;
      height: 400px;
      /*-webkit-filter: grayscale(100%);
      filter: grayscale(100%);*/
  }
  .navbar {
      font-family: Montserrat, sans-serif;
      margin-bottom: 0;
      background-color: #2d2d30;
      border: 0;
      font-size: 11px !important;
      letter-spacing: 4px;
      opacity: 0.9;
  }
  .navbar li a, .navbar .navbar-brand {
      color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
      color: #fff !important;
  }
  .navbar-nav li.active a {
      color: #fff !important;
      background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
  }
  .open .dropdown-toggle {
      color: #fff;
      background-color: #555 !important;
  }
  .dropdown-menu li a {
      color: #000 !important;
  }
  .dropdown-menu li a:hover {
      background-color: red !important;
  }
  footer {
      background-color: #2d2d30;
      color: #f5f5f5;
      padding: 32px;
  }
  footer a {
      color: #f5f5f5;
  }
  footer a:hover {
      color: #777;
      text-decoration: none;
  }
  .form-control {
      border-radius: 0;
  }
  textarea {
      resize: none;
  }
  </style>
</head>
<body id="home" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#home">WILLIAM MADISON RANDALL LIBRARY</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#home">HOME</a></li>
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#reserve">RESERVE</a></li>
        <li><a href="#contact">CONTACT</a></li>
        <li><a href="#reviews">REVIEWS</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
      </ul>
    </div>
  </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="images/randall.jpg" alt="Randall01" width="100%" height="600">
        <div class="carousel-caption">
          <h3>Randall Library 1</h3>
          <p>Image 1 of Randall Library</p>
        </div>
      </div>

      <div class="item">
        <img src="images/randall.jpg" alt="Randall02" width="100%" >
        <div class="carousel-caption">
          <h3>Randall Library 2</h3>
          <p>Image 2 of Randall Library</p>
        </div>
      </div>

      <div class="item">
        <img src="images/randall.jpg" alt="Randall03" width="100%" >
        <div class="carousel-caption">
          <h3>Randall Library 3</h3>
          <p>Image 3 of Randall Library</p>
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

<!-- Container (The About Section) -->
<div id="about" class="container text-center">
  <h3>ABOUT</h3>
  <p><em>RANDALL LIBRARY ESCAPE 2017</em></p>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
  <br>
  <div class="row">
    <div class="col-sm-4">
      <p class="text-center"><strong>SOMETHING 1</strong></p><br>
      <a href="#demo" data-toggle="collapse">
        <img src="images/sammy.gif" class="img-circle person" alt="Random Name" width="100" height="100">
      </a>
      <div id="demo" class="collapse">
        <p>More Info 1</p>
        <p>More Info 2</p>
        <p>More Info 3</p>
      </div>
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>SOMETHING 1</strong></p><br>
      <a href="#demo2" data-toggle="collapse">
        <img src="images/sammy.gif" class="img-circle person" alt="Random Name" width="100" height="100">
      </a>
      <div id="demo2" class="collapse">
        <p>More Info 1</p>
        <p>More Info 2</p>
        <p>More Info 3</p>
      </div>
    </div>
    <div class="col-sm-4">
      <p class="text-center"><strong>SOMETHING 1</strong></p><br>
      <a href="#demo3" data-toggle="collapse">
        <img src="images/sammy.gif" class="img-circle person" alt="Random Name" width="100" height="100">
      </a>
      <div id="demo3" class="collapse">
        <p>More Info 1</p>
        <p>More Info 2</p>
        <p>More Info 3</p>
      </div>
    </div>
  </div>
</div>

<!-- Container (TOUR Section) -->
<div id="reserve" class="bg-1">
  <div class="container">
    <h3 class="text-center">RESERVE</h3>
    <p class="text-center">Lorem ipsum we'll play you some music.<br> ..............</p>
    <ul class="list-group">
      <li class="list-group-item">Monday <span class="badge">8 Spots Available</span> <button class="btn" data-toggle="modal" data-target="#myModal">Make Reservation</button></li>
      <li class="list-group-item">Tuesday <span class="badge">2 Spots Available</span> <button class="btn" data-toggle="modal" data-target="#myModal">Make Reservation</button></li>
      <li class="list-group-item">Wednesday <span class="label label-danger">Booked!</span></li>
      <li class="list-group-item">Thursday <span class="badge">4 Spots Available</span> <button class="btn" data-toggle="modal" data-target="#myModal">Make Reservation</button></li>
      <li class="list-group-item">Friday <span class="label label-danger">Booked!</span></li>
    </ul>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4><span class="glyphicon glyphicon-calendar"></span> Reservation</h4>
        </div>
        <div class="modal-body">
          <form role="form">
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-user"></span> Name:</label>
              <input type="number" class="form-control" id="psw" placeholder="Enter your name">
            </div>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-envelope"></span> UNCW Email:</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter email">
            </div>
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
      <p><span class="glyphicon glyphicon-phone"></span>Phone: (910) 962-3760</p>
      <p><span class="glyphicon glyphicon-envelope"></span>Email: libref@uncw.edu</p>
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

<div id="reviews" class="bg-1">
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
<!-- <script>
function myMap() {
var myCenter = new google.maps.LatLng(41.878114, -87.629798);
var mapProp = {center:myCenter, zoom:12, scrollwheel:false, draggable:false, mapTypeId:google.maps.MapTypeId.ROADMAP};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
var marker = new google.maps.Marker({position:myCenter});
marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAu1b1EVgSaELcJrtyEa8m5ayZSQyKRH8E&callback=myMap"></script> -->
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#home" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p>Bootstrap Theme Made By <a href="https://www.w3schools.com" data-toggle="tooltip" title="Visit w3schools">www.w3schools.com</a></p>
</footer>

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

</body>
</html>
