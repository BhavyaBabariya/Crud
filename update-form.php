<?php
include('update-script.php');
include('database.php');

$conn=mysqli_connect("localhost","root","","crud");
$query = "SELECT * FROM user_details where id=$id";
$result = $conn->query($query);

$selectedValue = '';
if(isset($_GET['language'])){
  $selectedValue = $_GET['language'];
}

$query1=mysqli_query($conn,"SELECT nationality From user_details where id = $id");
while($row = mysqli_fetch_array($query1)){
  $nationality = explode(",",$row['nationality']);
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="update-form.css">
<title>PHP CRUD Operations</title>
</head>
<body>
<!--====form section start====-->

<div class="user-detail">

    <div class="form-title">
    <h2>Update Form</h2>
    
    
    </div>
 
    <p style="color:red">
    
<?php if(!empty($msg)){echo $msg; }?>
<?php while ($rows=$result->fetch_assoc())
{
?>
</p>
    <form method="post" action="">
          <label>Full Name</label>
        
        <input type="text" placeholder="Enter Full Name" name="full_name" required value="<?php echo $rows['full_name'] ?>">

          <label>Email Address</label>
        
        <input type="email" placeholder="Enter Email Address" name="email_address" required value="<?php echo $rows['email_address'] ?>">


            <label>Gender:</label><br>
          <label>Male</label>
          <input type="radio" name="gender"  <?=$rows['Gender']=="M" ? "checked" : ""?> value="M" >
          <label>Female</label>
          <input type="radio" name="gender" <?=$rows['Gender']=="F" ? "checked" : ""?> value="F" >

          <label>City:</label>
           <input type="city" placeholder="Enter Full City" name="city" required value="<?php echo $rows['city']  ?>">
          
           <label for="Language">Choose a Language:</label><br>
          <select name="language">
          <option name = "language"<?=$rows['language']=="English" ? "selected" : "" ?> value="English">English</option>
          <option name = "language"<?=$rows['language']=="Gujarati" ? "selected" : "" ?> value="Gujarati">Gujarati</option>
          <option name = "language"<?=$rows['language']=="Hindi" ? "selected" : "" ?> value="Hindi">Hindi</option>
          </select><br><br>

          <label for="">Nationality:</label><br>
          <label for="nationality"> Indian</label>
          <input type="checkbox" name="nationality[]" value="Indian,"<?php if(in_array("Indian",$nationality))  ?> checked="checked" <?php  ?>>
          <label for="nationality"> Non Indian</label><br>
          <input type="checkbox" name="nationality[]" value="Non-Indian"<?php if(in_array("Non-Indian",$nationality)) ?> checked="checked" <?php ?>>
          
          <p><label for="about">About Me:</label></p>
          <textarea name="about" rows="4" cols="50" required><?php echo $rows['Info'] ?></textarea> 
<?php
 }
?>
<?php 
}
?>        

          <button type="submit" name="update">Submit</button>
    </form>
        </div>
</div>
<!--====form section start====-->


</body>
</html>