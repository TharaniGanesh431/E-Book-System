<?php
  include "serverconnect.php";
  if(isset($_POST['search']) and $_POST['search']!=NULL){
    $i=1;
    $search = mysqli_real_escape_string($connect,$_POST['search']);

    $book=mysqli_query($connect, "SELECT * FROM book WHERE title LIKE '%$search%' OR author LIKE '%$search%' ORDER BY ISBN");
    if(! $book )
      die('Could not access server-Book Table');

    $count = mysqli_num_rows($book);
    if ($count == 0)
      echo "<div class='container'> <div class='alert alert-warning' role='alert'>No Match Found!</div> </div>";
    else { ?>
      <br>
      <div class="container">
      <form action="" method=post>
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
                      <input name='<?php echo 'ISBN'.$i; ?>' type="hidden" value="<?php echo $record['ISBN']; ?>"/>
                      <input name='i' type="hidden" value="<?php echo $i; ?>"/>
                      <center>
                        <br> <input type="submit" value='Download' name="<?php echo 'download'.$i; ?>" class="btn btn-success">
                      </center>
                    </div>
                </div>
            </div>
        </form>
          <?php ++$i; } 
    }
  }
?>

