<?php
session_start();

session_unset();
session_destroy();

$_POST = array();

mysqli_close($connect);

header("Location: login.php");

?>