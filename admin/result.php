<?php
    if(isset($_POST["remove"])){
        
        include "connect.php";
        
        global $connect;
        $id=$_POST['book_id'];
        $query = "DELETE FROM book WHERE book_id='$id'";
        $result = mysqli_query($connect,$query);
        if(!$result)
        {
            die("<br>".mysqli_error($connect));
        }
        else{
            echo "Deleted successfully";
        }
    }

?>
 

 <?php
  include "serverconnect.php";
  if(isset($_POST['search']) and $_POST['search']!=NULL){

    $search = mysqli_real_escape_string($connect,$_POST['search']);
    $book=mysqli_query($connect, "SELECT * FROM book WHERE title LIKE '%$search%' OR author LIKE '%$search%'");
    if(! $book ) {
      die('Could not access server-Book Table');
    }
    $count = mysqli_num_rows($book);
    if ($count == 0)
    echo "<div class='container'> <div class='alert alert-warning' role='alert'>No Match Found!</div> </div>";
    else { ?>
      
      <br>
      <form action="" method=post>
      <div class="container">
        <div class="row pt-3">
          <?php while($record = mysqli_fetch_assoc($book)){?> 
            <div class="col-md-3 mb-5">
              <div class="card mb-5 shadow border h-100 w-100">
                  <img src="<?php echo $record['bookpath']; ?>" alt="" class="card-img-bottom" width=100 height=300>
                  <div class="card-body border rounded ">
                    <center><h4 class="card-title"><b><?php echo $record['title'];?></b></h4></center>
                    <br>
                    <h6><div class='d-inline'><b> AUTHOR : </b></div>
                    <div class='d-inline'><?php echo "  ".$record['author'];?></div></h6>
                    <h6><div class='d-inline'><b> BOOK ID : </b></div>
                    <div class='d-inline'><?php echo "  ".$record['ISBN'];?></div></h6>
                    <input name="ISBN" type="hidden" value="<?php echo $record['ISBN']; ?>"/>
                    <input name="download" type="hidden" value="<?php echo $record['download']; ?>"/>
                    <input name="bookpath" type="hidden" value="<?php echo $record['bookpath']; ?>"/>
                    <center><br>
                      <input type="submit" value="Remove" name="remove" class="btn btn-danger">
                    </center>
                  </div>
            </div>
        </div>
        </form>
          <?php } 
          
    }
  }
?>

