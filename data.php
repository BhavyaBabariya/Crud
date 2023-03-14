<table border="1">
        <tr>
            <th>Sr.No</th>
            <th>Full Name</th>
            <th>Email Address</th>
            <th>City</th>
            <th>Gender</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        
<?php
        if(count($fetchData)>0){
        $sn=1;
        foreach($fetchData as $data){
            
?> <tr>
<td><?php echo $sn; ?></td>
<td><?php echo $data['full_name']; ?></td>
<td><?php echo $data['email_address']; ?></td>
<td><?php echo $data['city']; ?></td>
<td><?php echo $data['gender']; ?></td>
<td><a href="update-form.php?edit=<?php echo $data['id']; ?>">Edit</a></td>
<td><a href="delete-script.php?delete=<?php echo $data['id']; ?>">Delete</a></td>
</tr> <?php
     $sn++; }
      }else{
?>
      <tr>
        <td colspan="6"><h2 style="text-align:center">No Data Found</h2></td>
      </tr>              
<?php
    }
?>
   </table>
   // echo "<tr><td>". $row["id"]."</td><td>".$row["full_name"]."</td><td>".$row["email_address"]."</td><td>".$row["city"]."</td><td>".$row["Gender"]."</td><td>".$row["language"]."</td><td>".$row["nationality"]."</td><td>".$row["Info"]."</td><td>"."<table><a href = 'create-form.php ?edit=<?php echo $data.['id']; ?>Update</a></table>"."</td><td>"."<table><a href = 'delete-script.php?delete=".$data['id']."'>Delete</a></table>"."</td></tr>";