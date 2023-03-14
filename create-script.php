<?php

include('database.php');


if(isset($_POST['submit']))
{
  $full_name= ($_POST['full_name']);
  $email_address= ($_POST['email_address']);
  $city = ($_POST['city']);
  $gender = ($_POST['gender']);
  $language = ($_POST['language']);
  $nationality = implode(($_POST['nationality']));
  $Info = ($_POST['about']);
  $query="INSERT INTO user_details (full_name,email_address,city,gender,language,nationality,Info) VALUES ('$full_name','$email_address','$city','$gender','$language','$nationality','$Info')";
  $exec= mysqli_query($connection,$query);
  if($exec){

    $msg="<b>Data was created sucessfully</b>";
    echo $msg;

  }else{
    $msg= "Error: " . $query . "<br>" . mysqli_error($connection);
    echo $msg;
  }
}


?>