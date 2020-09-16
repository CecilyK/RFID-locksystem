<?php
	require'connectDB.php';
    $update_id = $_GET['did'];
if(isset($_GET['did'])) {
    $query = "SELECT  PaymentStatus FROM users WHERE id = $update_id";
    if ($result = $conn->query($query)) {
      $row = $result->fetch_assoc();
          $PaymentStatus = $row["PaymentStatus"];
    if ($PaymentStatus=='Paid'){
      $sql = "UPDATE users SET PaymentStatus='Due' WHERE id='".$update_id."'";
      $conn->query($sql);
  }
  else
    $sql = "UPDATE users SET PaymentStatus='Paid' WHERE id='".$update_id."'";
      $conn->query($sql);
}
header("Location: finance.php");
}
?>
