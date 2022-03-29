<?php

include "serverconnect.php";

function file_upload_status($uploads_dir){
            $upload_confirm = 1;
            
            //Checking file size
            if($_FILES["file_upload"]["size"]>26214400){
                echo "File size is more than 25MB. Try compressing it and then upload";
                $upload_confirm = 0;
            }
            
            //Checking file type
            if($_FILES["file_upload"]["type"] != "application/pdf"){
                echo "Only .pdf files can be uploaded";
                $upload_confirm = 0;
            }
            
            //Check if the file already exist
            if(file_exists($uploads_dir)){
                echo "File already exists. Cannot upload again";
                $upload_confirm = 0;
            }
            return $upload_confirm;
}


function photo_upload_status($uploads_dir1){
    $photo_upload_confirm = 1;
            
            //Checking file size
            if($_FILES["photo_upload"]["size"]>26214400){
                echo "Image is too larger. Try uploading image of size less than 5MB";
                $photo_upload_confirm = 0;
            }
            
            //Checking file type
            $extension = $_FILES["photo_upload"]["type"];
            if(!(($extension != "image/png")||($extension != "image/jpeg")||($extension != "image/jpg"))){
                echo "Only .jpg, .png, .jpeg  image file types are suported";
                $photo_upload_confirm = 0;
            }
            
            //Check if the file already exist
            if(file_exists($uploads_dir1)){
                echo "Photo already exists. Cannot upload again";
                $photo_upload_confirm = 0;
            }
    return $photo_upload_confirm;
}


function upload(){
    global $connect;
    $title = $_POST["title"];
    $author = $_POST["author"];
    $bid = $_POST["bid"];       
    
    
    $pname = $_FILES["file_upload"]["name"];
    $tname = $_FILES["file_upload"]["tmp_name"];
    $uploads_dir = '/dbms/download/'.$pname;
    $upload_confirm = file_upload_status($uploads_dir);
    
    
    $pname1 = $_FILES["photo_upload"]["name"];
    $tname1 = $_FILES["photo_upload"]["tmp_name"];
    $uploads_dir1 = '/dbms/bookimg/'.$pname1;
    $photo_upload_confirm = photo_upload_status($uploads_dir1);
    
    
    if($upload_confirm&&$photo_upload_confirm)
    {
        move_uploaded_file($tname, 'download/'.$pname);
        move_uploaded_file($tname1, 'bookimg/'.$pname1);
        // rename('C:/xampp/htdocs/dbms/'.$uploads_dir,'C:/xampp/htdocs/dbms/download/'.$title.'.pdf');
        // rename('C:/xampp/htdocs/dbms/'.$uploads_dir1,'C:/xampp/htdocs/dbms/bookimg/'.$title.'.jpg');
        $sql = "INSERT into book (ISBN,title,author,bookpath,download) values ('$bid','$title','$author','$uploads_dir1','$uploads_dir')";
        $result = mysqli_query($connect,$sql);
        if($result){
            echo '<center style="color:green;">File uploaded successfully</center>';
        }
        else{
            echo "Error while uploading";
        }

    }        
}

if(isset($_POST['i'])){
    $j=1;

    while($j<=$_POST['i']){

        if(isset($_POST["remove".$j])){
                
            global $connect;
            $id=$_POST['ISBN'.$j];//echo $id;
            $file='C:/xampp/htdocs'.mysqli_real_escape_string($connect,$_POST['download'.$j]);
            $photo='C:/xampp/htdocs'.mysqli_real_escape_string($connect,$_POST['bookpath'.$j]);
            
            if(!unlink($photo))
            {
                die("Photo couldn't be deleted");
            }
            if(!unlink($file))
            {
                die("File couldn't be deleted");
            }
            $query = "DELETE FROM book WHERE ISBN='$id'";
            $result = mysqli_query($connect,$query);
            if(!$result)
            {
                die("<br>".mysqli_error($connect));
            }
            else{
                echo "Deleted successfully";
            }

            break;
        }
        else
            ++$j;
    }
}

function validateAdmin()
{
    global $connect;
    $id=$_POST['Admin_name'];
    $passwd=$_POST['Password'];
    //$salt='$5$rounds=3000$onlyyouandonlyyoucan$';
    //$passwd=crypt($passwd,$salt);
    if(empty($id)||empty($passwd))
    {
        echo "<br><center style='color:red';>Invalid Username or Password</center>";
        return;
    }
    
    $query="SELECT * FROM employee WHERE admin_id='$id' AND admin_password='$passwd'";
    $result=mysqli_query($connect,$query);
    if($result)
    {
        $value=mysqli_fetch_assoc($result); 
        if($value)
        {
            $_SESSION['logsts']='set';
            header("Location:admin.php");
        }
        else{
            echo "<br><center style='color:red';>Invalid Username or Password</center>"; 
        }
    }    
    else
        header("Location:adminlogin.php"); 
}

?>