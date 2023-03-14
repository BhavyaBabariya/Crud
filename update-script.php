<?php

include('database.php');


if(isset($_GET['edit'])){

    $id= $_GET['edit'];
  $editData= edit_data($connection, $id);
}

if(isset($_POST['update']) && isset($_GET['edit'])){

  $id= $_GET['edit'];
    update_data($connection,$id);
    
    
} 
function edit_data($connection, $id)
{
 $query= "SELECT * FROM user_details WHERE id= $id";
 $exec = mysqli_query($connection, $query);
}

// update data query
function update_data($connection, $id){

    $full_name= ($_POST['full_name']);
      $email_address= ($_POST['email_address']);
      $city = ($_POST['city']);
      $gender = ($_POST['gender']);
      $language = ($_POST['language']);
      $nationality = ($_POST['nationality']);
      $Info = ($_POST['about']);

      $query="UPDATE user_details 
            SET full_name='$full_name',
                email_address='$email_address',
                city= '$city',
                gender = '$gender',
                language = '$language',
                nationality =  '".implode($nationality)."', 
                Info = '$Info' WHERE id=$id";

      $exec= mysqli_query($connection,$query);
  
      if($exec){
         header('location:user-table.php');
      
      }else{
         $msg= "Error: " . $query . "<br>" . mysqli_error($connection);
         echo $msg;  
      }
}

?>