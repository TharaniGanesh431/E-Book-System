<?php 
include "logsts.php";
include "functions.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TECH EBOOK</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- load CSS -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">        <!-- Google web font "Open Sans" -->
  <link rel="stylesheet" href="css/bootstrap.min.css">                                            <!-- https://getbootstrap.com/ -->
  <link rel="stylesheet" href="css/fontawesome-all.min.css">                                      <!-- Font awesome -->
  <link rel="stylesheet" href="css/tooplate-style.css">       
 <script>
    var renderPage = true;

    if (navigator.userAgent.indexOf('MSIE') !== -1|| navigator.appVersion.indexOf('Trident/') > 0) {
      /* Microsoft Internet Explorer detected in. */
      alert("Please view this in a modern browser such as Chrome or Microsoft Edge.");
      renderPage = false;
    }
  </script>
</head>

<body>

<div class="tm-main">

    <div class="tm-welcome-section">
      <div class="container tm-navbar-container">
        <div class="row">
          <div class="col-xl-12">
            <nav class="navbar navbar-expand-sm">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <a href="profile.php" class="nav-link tm-nav-link tm-text-white active">Profile</a>
                </li>
                <li class="nav-item active">
                  <a href="logout.php" class="nav-link tm-nav-link tm-text-white active">Log Out</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>

  <div class="container text-center tm-welcome-container">
    <div class="tm-welcome">
      
      <h1 class="ml2">Books-R-Us</h1>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

      <script>
        var textWrapper = document.querySelector('.ml2');
        textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

        anime.timeline({loop: true})
          .add({
            targets: '.ml2 .letter',
            scale: [4,1],
            opacity: [0,1],
            translateZ: 0,
            easing: "easeOutExpo",
            duration: 450,
            delay: (el, i) => 70*i
          }).add({
            targets: '.ml2',
            opacity: 0,
            duration: 1000,
            easing: "easeOutExpo",
            delay: 500
          });
      </script>
      <p class="ml6">
      <span class="text wrapper"><span class="letters">As the page turns</span></span></p>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
      <script>
        var textWrapper = document.querySelector('.ml6 .letters');
        textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

        anime.timeline({loop: true})
          .add({
            targets: '.ml6 .letter',
            translateY: ["1.1em", 0],
            translateZ: 0,
            duration: 300,
            delay: (el, i) => 50 * i
          }).add({
            targets: '.ml6',
            opacity: 0,
            duration: 1000,
            easing: "easeOutExpo",
            delay: 600
          });
      </script>
    </div>
  </div>

  </div>


  <div class="container">
    <div class="tm-search-form-container">
      <input class="form-control" type="text" name="search" onkeyup="searchbook()" placeholder="Type Title or Author Name ..." >
    </div>
  </div>
  <br><br>
  <div id="options"></div>

  <script type="text/javascript">
    function searchbook(){
      var value = $("input[name='search']").val();
      $.post("result.php", {search: value},function(option){
        $("#options").html(option);//
      });
    }
  </script>
</body>
</html>