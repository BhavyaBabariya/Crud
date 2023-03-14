<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="create-form.css">
<title>PHP CRUD Operations</title>
</head>
<body>
<!--====form section start====-->

<div class="user-detail">

    <div class="form-title">
    <h2>Create Form</h2>
    </div>
    <form action="insert.php" method="POST">
          <label>Full Name</label>
          <input type="text" placeholder="Enter Full Name" name="full_name" required>
          <label>Email Address</label>
          <input type="email" placeholder="Enter Email Address" name="email_address" required>
          <label>Male</label>
          <input type="radio" placeholder="" name="gender" value="M" checked>
          <label>Female</label>
          <input type="radio" placeholder="" name="gender" value="F">
          <label>City</label>
          <input type="text" placeholder="Enter Full City" name="city">
          <label for="Language">Choose a Language:</label>

          <select name="language" >
          <option value="English">English</option>
          <option value="Gujarati">Gujarati</option>
          <option value="Hindi">Hindi</option>
          </select><br>

          <label for="nationality"> Indian</label>
          <input type="checkbox" name="nationality[]" value="Indian" checked>
          <label for="nationality"> Non Indian</label><br>
          <input type="checkbox" name="nationality[]" value="Non-Indian">
          
          <p><label for="about">About Me</label></p>
          <textarea name="about" rows="4" cols="50"></textarea> 

          <input name="submit" type="submit" value="Submit">
    </form>
        </div>
<!--====form section end====-->


</body>
</html>