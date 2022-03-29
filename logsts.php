<?php
session_start();

if((! isset($_SESSION['logsts'])) or ($_SESSION['logsts']!='set')){    

    session_unset();
    session_destroy();
    
    $_POST = array();

    mysqli_close($connect);

    header("Location: login.php");
}

?>