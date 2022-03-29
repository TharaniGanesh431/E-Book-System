<?php
include "serverconnect.php";
session_start();
if (isset($_SESSION['logsts']))
    session_destroy();

include "functions.php";

?>


<!Doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="style1.css" class="">
    <script src="https://kit.fontawesome.com/01b07809e9.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-image:
                url('');

            background-attachment: fixed;
            background-size: 100% 100%;
            color:
            
        }
    </style>
<title>Login</title>
</head>    


<body id="body" background="">
    <div class="jumbotron jumbotron-fluid text-center bg-dark pb-2 pt-3">
        <h1 class=" display-3 text-white pt-0">E - BOOKS</h1>
        <hr class="m-2 ">
        <small class="text-muted text-center ">The Techie way</small>
    </div>
    
    <br><br><br>
    
    <div class="container border shadow-lg rounded p-4 py-5 mb-5 bg-light" style="max-width: 350px;">
        <form target="_self" method="post" action="login.php">
            
            <h4 class="text-center  my-4  ">AUTHENTICATION PAGE</h4>

            <label for="text" class="ml-1">Techie name:</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fab fa-accusoft"></i>
                    </span>
                </div>
                <input type="text" class="form-control" name="id" placeholder="roll_no">
            </div>
            
            <label for="password" class="ml-1">Passcode:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        
                        <i class="fab fa-periscope"></i>
                    </span>
                </div>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            
            <br>
            <div class="">
              <?php
              if(isset($_POST['submit']))
                {
                    validate_user();
                }
                ?>
              
               <button name="submit" class="p-2 btn btn-block  btn-outline-info" style="background-color:; border:" value="SUBMIT" id="new">Enter world of Techie Books
                </button>
                 
                
            </div>
        </form>
    </div>
    
    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    
    
    
</body>

</html>
