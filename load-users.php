<table class="table table-dark">
    <thead>
<tr>
    <th>ID.No</th>
    <th>Name</th>
    <th>CardID</th>
    <th>SerialNumber</th>
    <th>Date</th>
    <th>Time In</th>
    <th>User Status</th>
</tr>
</thead>
<?php
session_start();
//Connect to database
require'connectDB.php';

$seldate = $_SESSION["exportdata"];

$sql = "SELECT * FROM logs WHERE DateLog='$seldate' ORDER BY id DESC";
$result=mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0)
{
  while ($row = mysqli_fetch_assoc($result))
  {
?>
        <TR>
        <TD><?php echo $row['id'];?></TD>
        <TD><?php echo $row['Name'];?></TD>
        <TD><?php echo $row['CardNumber'];?></TD>
        <TD><?php echo $row['SerialNumber'];?></TD>
        <TD><?php echo $row['DateLog'];?></TD>
        <TD><?php echo $row['TimeIn'];?></TD>
        
        <TD><?php echo $row['UserStat'];?></TD>
        </TR>
<?php
  }
}
?>
</TABLE>
