<?php

session_start();

include '../../config/database.php';

if(isset($_POST['nameubtl'])){
    $name = $_POST['name'];

    if($name){
        $id = $_SESSION['author_id'];
       $update_query = "UPDATE users SET name='$name' WHERE id='$id'";
       mysqli_query($db_connect,$update_query);
       $_SESSION['nameupdate'] = "name update successfull";
       $_SESSION['author_name'] = $name;
       header("location: profile.php");
    }else{
        $_SESSION['nameError'] = "please fillupb name field!";
        header("location: profile.php");
    }
}


if(isset($_POST['passubtn'])){
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass']; 
    $con_pass = $_POST['con_pass'];

    if($old_pass && $new_pass && $con_pass){
        $id = $_SESSION['author_id'];
        $old_pass = sha1($old_pass);
    $count_query = "SELECT COUNT(*) AS 'result' FROM `users` WHERE id='$id' AND password='$old_pass'";  
    $connect = mysqli_query($db_connect,$count_query);
    $result = mysqli_fetch_assoc ($connect)['result'];

     if($result == 1){
     if($new_pass == $con_pass){
        $new_pass = sha1($new_pass);
       $update_query = "UPDATE users SET password='$new_pass' WHERE id='$id'";
       mysqli_query($db_connect,$update_query);
       $_SESSION['password_update'] = "password update successfull";
       header("location: profile.php");
     
    }else{
        $_SESSION['passError'] = "age mail dite hobe!";
        header("location: profile.php");
    }
     }else{
        $_SESSION['passError'] = "error paici!";
        header("location: profile.php");
     }
    
    }else{
        $_SESSION['passError'] = "please fullup pass field!";
        header("location: profile.php");
    }
}

    
     
if(isset($_POST['emailubtl'])){
    $email = $_POST['email'];

    if($email){
        $id = $_SESSION['author_id'];
       $update_query = "UPDATE users SET email='$email' WHERE id='$id'";
       mysqli_query($db_connect,$update_query);
       $_SESSION['emailupdate'] = "email update successfull";
       $_SESSION['author_email'] = $email;
       header("location: profile.php");
    }else{
        $_SESSION['emailError'] = "please fillupb email field!";
        header("location: profile.php");
    }
}


if(isset($_POST['imageubtl'])){
    $image = $_FILES['image']['name'];

   $tmp = $_FILES['image']['tmp_name'];


    if($image){
    $id = $_SESSION['author_id'];
    $authname = $_SESSION['author_name'];
    $explode = explode('.', $image);
   $extention = end($explode);
   $new_name = $id . '-' . $authname . '-' . date("d-m-y") . '-' . rand(0,9999) ."." . $extention; 
   
  $localpath = "../../public/uplode/profile/" . $new_name;

  if(move_uploaded_file($tmp,$localpath)){
    $update_query = "UPDATE users SET image='$new_name' WHERE id='$id'";
       mysqli_query($db_connect,$update_query);
       header("location: profile.php");

  }else{
     echo "kharap";
  }
    }

//     if($name){
//         $id = $_SESSION['author_id'];
//        $update_query = "UPDATE users SET name='$name' WHERE id='$id'";
//        mysqli_query($db_connect,$update_query);
//        $_SESSION['nameupdate'] = "name update successfull";
//        $_SESSION['author_name'] = $name;
//        header("location: profile.php");
//     }else{
//         $_SESSION['nameError'] = "please fillupb name field!";
//         header("location: profile.php");
//     }
}


?>