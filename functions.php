<?php include "serverconnect.php"; ?>
<?php

if(isset($_POST['i'])){
    $j=1;

    while($j<=$_POST['i']){

        if(isset($_POST["download".$j])){
                
            global $connect;
            $id=mysqli_real_escape_string($connect,$_POST['ISBN'.$j]);
            $sid=mysqli_real_escape_string($connect,$_SESSION['id']);

            //echo "INSERT INTO history (sid,ISBN) VALUES ('18Z260','$id')";
            if(! mysqli_query($connect, "INSERT INTO history (sid,ISBN) VALUES ('$sid','$id')"))
                    die('History Storage Failed - Server Error');

            $bookdow=mysqli_query($connect, "SELECT download FROM book WHERE ISBN='$id'");
            if(! $bookdow )
                die('Could not access server-Book Table');
            
            $value=mysqli_fetch_assoc($bookdow);
            $File=$value['download'];
            
            header("Content-Disposition: attachment; filename=\"" . basename($File) . "\"");
            header("Content-Type: application/octet-stream");
            header("Content-Length: " . filesize($File));
            header("Connection: close");

            break;
        }
        else
            ++$j;
    }
}

function validate_user()
{
    global $connect;
    $id=$_POST['id'];
    $passwd=$_POST['password'];
    
    if(empty($id)||empty($passwd))
    {
        echo "<center style='color:red;'>Invalid Roll Number or Password</center><br>";
        return;
    }
    //$salt='$5$rounds=3000$onlyyouandonlyyoucan$';
    //$passwd=crypt($passwd,$salt);
    $query="SELECT * FROM student WHERE sid='$id'";
    $result=mysqli_query($connect,$query);
    
    if($result)
    {
        $value=mysqli_fetch_assoc($result); 
        if(!$value)
        {
            echo "<center style='color:red;'>Invalid Roll Number or Password</center><br>";
        }
        else if($value['studpass']==$passwd)
        {
            /*echo "You are logged in";*/
            $_SESSION['logsts']='set';
            $_SESSION['id'] =  $id;
            header("Location:user.php");
        }
        else
            echo "<center style='color:red;'>Invalid Roll Number or Password</center><br>";
            //header("Location:login.php");
    }
    else
    {
            echo "<center style='color:red;'>Invalid Roll Number or Password</center><br>";
    }
}

?>