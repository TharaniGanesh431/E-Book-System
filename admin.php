<?php
  include "adminlogsts.php";
  include "adminfunctions.php";
  if(isset($_POST["submit"])){
    upload();
  }
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TECH EBOOK</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/adminstyle.css">
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
                  <a href="adminlogout.php" class="nav-link tm-nav-link tm-text-white active">Log Out</a>
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
</div>


  <div class="container"><br>
<div class="container text-center tm-welcome-container">
        <div class="tm-welcome">
      <div style="display-inline"><br><br>
        <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#addbook">Upload Book</button>
    </div></div></div>
      <br><br><br>
      <h3>Remove Books</h3>
      <div style="display-inline">
        <input class="form-control" type="text" name="search" onkeyup="searchbook()" placeholder="Type Title or Author Name ..." >
      </div>
    <br><br>
    <div id="options"></div>

  <script type="text/javascript">
    function searchbook(){
      var value = $("input[name='search']").val();
      $.post("adminresult.php", {search: value},function(option){
        $("#options").html(option);
      });
    }
  </script>

<div class="modal fade" tabindex="-1" id="addbook" role="dialog"  aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="model-header">
                    <h2 class="modal-title text-center" id="title">Upload a Book</h2>
                </div>
                <div class="modal-body">
                    <hr>
                    <div class="container">
                       
                        <form method="post" action="" enctype="multipart/form-data">
                           
                           <div class="form-group form-inline">
                                <label for="title">Title</label><pre>                   </pre>
                                <input type="text" name="title" class="form-control ml-4" placeholder="Enter the Book Title">
                           </div>
                            
                           
                            <div class="form-group form-inline">
                                <label for="author">Author</label><pre>                 </pre>
                                <input type="text" name="author" class="form-control ml-4" placeholder="Enter the Author Name">
                            </div>
                            
                            <div class="form-group form-inline">
                                <label for="bid">Book Id</label><pre>                </pre>
                                <input type="text" name="bid" class="form-control ml-4" placeholder="Enter the Book Id">
                            </div>
                            
                            <div class="form-group form-inline">
                                <label for="file_upload">Upload Here</label><pre>   </pre>
                                <input type="file" name="file_upload" class="btn btn-filestack">
                            </div>
                            
                            <div class="form-group form-inline">
                                <label for="photo_upload">Upload Photo Here</label>
                                <input type="file" name="photo_upload">
                            </div>
                           
                            <div class="modal-footer">
                                 <input type="submit" name="submit" class="btn  btn-success" value="UPLOAD">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div> 
                </div> 
                
            </div>
        </div>
    </div>

</body>
</html>



<!--
<form class="form" method="post" action="user.php" enctype="multipart/form-data">-->
                        <!--<div class="form-group form-inline">
                          <label for="bid">Book Id:</label>
                          <input type="text" class="form-control ml-4" name="bid" placeholder="Enter the Book Id">
                        </div>-->
               <!--         <div class="form-group form-inline">
                          <label for="bname">Title:</label>
                          <input type="text" class="form-control ml-5" name="title" placeholder="Enter the Book Name">
                        </div>
                        <div class="form-group form-inline">
                          <label for="author">Author:&nbsp;</label>
                          <input type="text" class="form-control ml-4" name="author" placeholder="Enter the Author Name">
                        </div>
                        <div class="form-group form-inline">
                          <label for="edition">Text book/Reference book:&nbsp;</label>
                          <input type="text" class="form-control ml-4" name="type" placeholder="Enter the Edition">
                        </div>
                        <div class="form-group form-inline">
                          <label for="bpic">Book Picture:</label>
                          <input type="file" name="photo_upload" class="">-->
                          <!-- <input type="file" class="custom-file-input" id="bpic">
                          <label class="custom-file-label" for="bpic">Choose Book Picture</label> -->
                    <!--    </div>
                        <div class="form-group form-inline">
                          <label for="ebook">E-Book :</label>
                            <input type="file" name="file_upload" class="">-->
                          <!-- <input type="file" class="custom-file-input" id="ebook">
                          <label class="custom-file-label" for="bpic">Choose E-Book</label> -->
                        <!--</div>
                        <div class="modal-footer">
                            <input class="btn  btn-success" type="submit" value="UPLOAD" name="submit">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </form>-->