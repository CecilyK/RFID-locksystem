<?php
session_start();
    //Connect to database
    require'connectDB.php';


    //Get current date and time
    date_default_timezone_set('Asia/Damascus');
    $d = date("Y-m-d");

    $Tarrive = mktime(22,00,00);
    $TimeArrive = date("H:i:sa", $Tarrive);

    $Tleft = mktime(02,30,00);
    $Timeleft = date("H:i:sa", $Tleft);

    if (!empty($_POST['seldate'])) {
        $seldate = $_POST['date'];
    }
    else{
        $seldate = $d;
      }

    $_SESSION["exportdata"] = $seldate;
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet"  href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users Logs</title>
<script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous">
</script>
<script src="js/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    setInterval(function(){
      $.ajax({
        url: "load-users.php"
        }).done(function(data) {
        $('#cards').html(data);
      });
    },3000);
  });
</script>
<style>
body
{background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.9) ), url("image/IS-bg2.jpg");
background-repeat:no-repeat;
background-attachment:fixed;
	  background-position: top right;
	  background-size: cover;
  }

header .head h1 {

  text-align: center;
  color:#ddd;
  }
header .head img {
  float: left;
}
header .opt {
  float: right;
  margin: -100px 20px 0px 0px;
}
header .opt a {


  text-align: center;
  font-size:20px;

  margin-right: 15px;
}
header .opt a:hover {
  opacity: 0.8;
  cursor: pointer;
}
header .opt #inp {
  padding:3px;
  margin:0px 0px 0px 33px;
  background-color:#00A8A9;

  font-size:16px;
  opacity: 0.6;

}
header .opt #inp:hover {
  background-color: #00A8A9; opacity: 0.8;}
header .opt input {
  padding-left:5px;
  margin:2px 0px 3px 20px;
  border-radius:4px;

  background-color:#8E8989;
   color: white;
 }
header .opt p {

  text-align: left;
  font-size:19px;
  color:#f2f2f2;
}

#table {

    border-collapse: collapse;
    width: 100%;
}

</style>
</head>
<body>
<header >

	<div class="head">
	<!--	<img src="image/rfid1.jpg" width="80" height="80"> -->
		<h1>RFID<br>Logs module</h1>
	</div>

	<div class="opt">
		<table border="0">
			<tr>





				<td><p>Select the date log:
				<form method="POST" action="">


					<input type="date" name="date"><br>

          <button type="submit" name="seldate" class="btn btn-primary" style="margin:10px 20px 10px 20px">Select Date</button>




				</form>
				</p></td>
			</tr>
		</table>
	</div>
</header>
<h2 style="margin-left: 15px; color:white;">
  Curfew :<?php echo $TimeArrive?><br>

</h2>

<form method="post" action="export.php">

  <button type="submit" name="export" class="btn btn-success" style="margin-left: 20px;">Export to Excel</button>
   <a href="AddCard.php"><button type="button" class="btn btn-secondary" style="margin-left: 20px;">Add a new User</button></a> <br><br>
</form>
<div id="cards" class="cards">
</div>
</body>
</html>
