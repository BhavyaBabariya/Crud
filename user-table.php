<?php
include('read-script.php');
session_start();


$search = "";
$Gender = "";
if (isset($_GET['search'])) {
  $search = $_GET['search'];
  $_SESSION['searchText'] = $search;
} else {
  if (isset( $_SESSION['searchText'])) {
    $search = $_SESSION['searchText'];
  }
}
$citysearch="";
if(isset($_GET['citysearch'])){
  $citysearch = $_GET['citysearch'];
  $_SESSION['citySearch'] = $citysearch;
}else{
  if(isset($_SESSION['citySearch'])){
    $citysearch = $_SESSION['citySearch'];
  }
}
if (isset($_GET['Gender'])) {
    $Gender = $_GET['Gender'];
    $_SESSION['Gender'] = $Gender;
  }else {
    if (isset( $_SESSION['Gender'])) {
      $Gender = $_SESSION['Gender'];
    
    }
  }

   
if(isset($_POST['reset']))
{
	$textareaValue = trim($_POST['Info']);
	
	$sql = "insert into user_deails (Info) values ('".$textareaValue."')";
	$rs = mysqli_query($conn, $sql);
	$affectedRows = mysqli_affected_rows($conn);
	
	if($affectedRows == 1)
	{
		$successMsg = "Record has been saved successfully";
	}
}

//Pagination
//$column = $_GET['column'];
if (isset($_GET['pageno'])) {
  $pageno = $_GET['pageno'];  
} else {
  $pageno = 1;
}
$no_of_records_per_page = 5;
 $offset = ($pageno-1) * $no_of_records_per_page;

$conn=mysqli_connect("localhost","root","","crud");
// Check connection
if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die();
}

   
//Search
$where = '';
if($search != "" | $Gender != "" | $citysearch != ""){
  $where = " and (full_name like '%".$search."%' or email_address like '%".$search."%')and  Gender = '".$Gender."' and city like '%".$citysearch."%'";
}

// if($citysearch != ""){
//   $where = " and city like '%".$citysearch."%'";
// }

// if( $Gender != ""){
//   $where = " and  Gender = '".$Gender."'";
// }
 
$selectedValue = '';
if(isset($_GET['Gender'])){
  $selectedValue = $_GET['Gender'];
}

echo $total_pages_sql = "SELECT COUNT(*) FROM user_details where 1=1 ". $where;

$total_pages_sql_res = mysqli_query($conn,$total_pages_sql);
$total_rows = mysqli_fetch_array($total_pages_sql_res)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
$limit = " LIMIT $offset, $no_of_records_per_page";
$total_pages_sql2 = mysqli_query($conn,$total_pages_sql.$limit);
$total_pages_sql3 = $conn->query($total_pages_sql);

$sql1 = "SELECT * FROM user_details  where 1=1 ". $where. $limit;
$result1= mysqli_query($conn,$sql1);

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="user-table.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>PHP CRUD Operations</title>
</head>
<body>
    <div class="table-data">
        <div class="list-title">
            <h2>CRUD List</h2>
        </div>
        <form action="" method="GET">
            Name Search: <input class="search" type="text" name="search" value="<?php echo $search ?>">
            City Search: <input class="search" type="text" name="citysearch" value="<?php echo $citysearch ?>">
           
            <select name="Gender">
                <option value="" <?php  if($Gender == '') echo 'selected'?>>Select Gender</option>
                <option value="M" <?php if($Gender == 'M') echo'selected'?>>Male</option>
                <option value="F" <?php if($Gender == 'F') echo 'selected'?>>Female</option>
            </select><br>
            <button type="submit">Search</button>
            <button style="margin-left:690px"><a href="create-form.php" style="text-decoration:none; ">ADD</a></button>
        </form>
        
<?php

if ($total_pages_sql2->num_rows >= 0){
echo "<table><tr><td><b>sr.no</td><td><b>name</td><td><b>Email Id</td><td><b>city</td><td><b>Gender</td><td><b>Language</td><td><b>Nationality</td><td><b>Information</b></td></tr>";

while($row = mysqli_fetch_array($result1)){
  
  $action =
  "<button style='background-color:#77e079;'><a href='update-form.php?edit=".$row['id']."'>Update</a><br></button<br>"."<button style='background-color:#e6757d;'><a href='delete-script.php?delete=".$row['id']."'>Delete</a></button>";
?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['full_name']; ?></td>
            <td><?php echo $row['email_address']; ?></td>
            <td><?php echo $row['city']; ?></td>
            <td><?php echo $row['Gender']; ?></td>
            <td><?php echo $row['language']; ?></td>
            <td><?php echo $row['nationality']; ?></td>
            <td><?php echo $row['Info']; ?></td>
            <td><?php echo $action; ?></td>
        </tr>
        <?php
  //here goes the data
}
"</table>";

} else {
	echo "0 records";
}
 
mysqli_close($conn);
?>

        <ul class="pagination">
            <li><a href="?pageno=1">First</a></li>
            <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno <= 1){
       echo '#'; } else { echo "?pageno=".($pageno - 1); $pageno; } ?>">Prev</a>
            </li>
            <li class="<?php if($pageno >= $total_pages)
{ echo 'disabled'; $pageno; }
 ?>">
                <a href="<?php if($pageno >= $total_pages)
    { echo '#'; } else 
    { echo "?pageno=".($pageno + 1); $pageno;} ?>">Next</a>
            </li>
            <li><a href="?pageno=<?php echo $total_pages; $pageno ?>">Last</a></li>
        </ul>
    </div>
</body>
</html>











