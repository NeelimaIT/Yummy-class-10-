<?php

session_start(); 
include "../inc/env.php";

//*Validation Rules



$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$phone=$_REQUEST['phone'];
$password=$_REQUEST['password'];
$confirm_password=$_REQUEST['confirm_password'];
$errors= [];


if(empty($name)){
    $errors['name_error'] = "Please enter your User name";

}

if(empty($email)){
    $errors['email_error'] = "Please enter your email";

}
else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
     $errors['email_error'] = "Please enter valid email";
}


 if((strlen($phone))!=11){
    $errors['phone_error'] = "Please enter your valid phone number";

}

if(empty($password)){
    $errors['password_error'] = "Please enter your password";
}
else if(strlen($password)< 8){
    $errors['password_error'] = "Please enter a strong password";
}

if(empty($confirm_password)){
    $errors['confirm_password_error'] = "Please Confirm your password";

}
else if($confirm_password !=$password){
    $errors['confirm_password_error'] = "Password didn't match";
}


//*CHECK ERRORS
if(count($errors)>0){
    //*Ridirect BACK
    $_SESSION['error']= $errors;
    
    header("location: ../register.php");
}
else{

    $query="INSERT INTO users(name, email, phone, password)
     VALUES ('$name', '$email', '$phone', '$password')";

 $response= mysqli_query($conn,$query);
var_dump($response);

}
?>





