<?php
	include "serverconnect.php";
	session_start();
	error_reporting(E_ALL);
	ini_set('display error', 1);
	$id = $_SESSION['id'];
	$stable = mysqli_query($connect, "SELECT * FROM student where sid='$id'");
	$result = mysqli_query($connect, "SELECT * FROM history where sid='$id' ORDER BY time,date DESC");

?>

<!doctype html>

<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <title>TECH EBOOK PROFILE PAGE</title>
        <link rel="stylesheet" href="css/profilebootstrap.css">   
        <link rel="stylesheet" href="css/profilestyle.css">

    </head>
    <body>

        <!--================Home Banner Area =================-->
        <section class="home_banner_area">
		<a href="user.php"><pre><br><font color="white" size="5"> Search</a><a href="logout.php" ><font color="white">  Logout<br></a></pre>
		</font></font></font>           	
		<div class="container box_1620">
		<div class="banner_inner d-flex align-items-center">
		<!-- <h1><font color="orange">USER PROFILE</h1></font><br><br><br> -->
		<div class="banner_content">
			<div class="media">
				<div class="d-flex">
			<img src="/dbms/img/img1.jpg" alt="" width=400 height=400>
		</div>
				<div class="media-body">
					<div class="personal_text">
						<?php while($student = mysqli_fetch_assoc($stable)){?>
					
						<h3><?php echo $student["name"];?></h3>
						<h4>Student</h4>
						<p><?php echo $student["department"]; ?><br>
						PSG COLLEGE OF TECHNOLOGY</p>
						<ul class="list basic_info">
							<li><b>Date Of Birth:</b><?php echo " ".$student["dob"]; ?></li>
							<li><b>Mobile: </b><?php  echo " ".$student["phone"]; ?></li>
							<li><b>Email: </b><?php  echo " ".$student["email"]; ?></li>
							<li><b>City: </b><?php  echo " ".$student["city"]; ?></li>
						</ul>	
				<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

        </section>
        <!--================End Home Banner Area =================-->   
<div class="container box_1620">
           		<div class="banner_inner d-flex align-items-center">
<pre><br><br><br><br><h1><font color="orange">HISTORY          </h1></font></pre>
					

<style>
	.demo {
		width:100%;
		height:100%;
		border:1px solid #000000;
		border-collapse:collapse;
		border-spacing:2px;
		padding:5px;
	}
	.demo th {
		border:1px solid #000000;
		padding:5px;
		background:#FF8040;
	}
	.demo td {
		border:1px solid #000000;
		text-align:left;
		padding:5px;
		background:#FFFFFF;
	}
</style>
<table class="demo">
	
	<thead>
	<tr>
		<th><center><font color="black">Book Id</center></font></th>
		<th><center><font color="black">Date</center></font></th>
		<th><center><font color="black">Time</center></font></th>
		<th><center><font color="black">Book</center></font></th>
		<th><center><font color="black">Author</center></font></th>
	</tr>
	</thead>
	<tbody>
	<?php while($row = mysqli_fetch_assoc($result)){
		$bid=mysqli_real_escape_string($connect,$row['ISBN']);
		$book = mysqli_query($connect, "SELECT title,author FROM book where ISBN='$bid'");
		$record = mysqli_fetch_assoc($book)
	?>
	<tr>
		<td><center><?php echo $row["ISBN"];?></center></td>
		<td><center><?php echo $row["date"];?></center></td>
		<td><center><?php echo $row["time"];?></center></td>
		<td><center><?php echo $record["title"];?></center></td>
		<td><center><?php echo $record["author"];?></center></td>
	</tr>
	<?php } ?>
	<tbody>
</table>


</div></div>
    <br><br><br><br>
    </body>


</html>
