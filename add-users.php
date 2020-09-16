<!DOCTYPE html>
<html>
<head>
  <head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>


<table id="table" class="table table-dark">
  <thead class="thead-dark">
  <tr>
    <th>Sr.No.</th>
    <th>Name</th>
    <th>Number</th>
    <th>Gender</th>
    <th>CardID</th>
  </tr>
</thead>
<?php 
//Connect to database
require('connectDB.php');

$sql ="SELECT * FROM users ORDER BY id DESC";
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0)
{
  while ($row = mysqli_fetch_assoc($result))
    {
?>
   <TR>
      <TD><?php echo $row['id']?></TD>
      <TD><?php echo $row['username']?></TD>
      <TD><?php echo $row['SerialNumber']?></TD>
      <TD><?php echo $row['gender']?></TD>
      <TD><?php echo $row['CardID'];
          if ($row['CardID_select'] == 1) {
              echo '<img src="image/che.png" style="margin-right: 60%; float: right;" width="20" height="20" title="The selected Card">';
          }
          else{
              echo '';
          }?>
      </TD>
   </TR>
<?php   
    }
}
?>
</table>

</body>
</html>