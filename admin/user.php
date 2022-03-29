<?php
  include "functions.php";
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
</head>

<body>

  <div class="jumbotron jumbotron-fluid pt-0 pb-0 bg-dark text-white">
    <h1 class="display-3 text-center">E-BOOK SEARCH </h1>
    <hr>
    <br>
  </div>

    <div class="container">
      <i class="fas fa-search" ></i>
      <h3>Search and Remove Files : </h3>
      <div style="display-inline">
        <input class="form-control" type="text" name="search" onkeyup="searchbook()" placeholder="Type Title or Author Name ..." >
      </div>
      <div style="display-inline">
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#addbook">Upload Book</button>
    </div>
    <br><br>
    <div id="options"></div>

  <script type="text/javascript">
    function searchbook(){
      var value = $("input[name='search']").val();
      $.post("result.php", {search: value},function(option){
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
                       
                        <form method="post" action="user.php" enctype="multipart/form-data">
                           
                           <div class="form-group form-inline">
                                <label for="title">Title</label><pre>                   </pre>
                                <input type="text" name="title" class="form-control ml-4" placeholder="Enter the Book Title">
                           </div>
                            
                           
                            <div class="form-group form-inline">
                                <label for="author">Author</label><pre>                 </pre>
                                <input type="text" name="author" class="form-control ml-4" placeholder="Enter the Author Name">
                            </div>
                            
                            <div class="form-group form-inline">
                                <label for="type">Text book/Refernce book</label>
                                <input type="text" name="type" class="form-control ml-4" placeholder="Enter the Type of book">
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