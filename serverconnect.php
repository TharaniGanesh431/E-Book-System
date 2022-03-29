<?php

  $connect=mysqli_connect('localhost','root','','ebook');

  if(mysqli_connect_errno($connect)){
  echo 'Failed to connect';
  }
?>