<?php
// Database credentials
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'nodemculog';

// Create connection and select db
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Get data from database
$result = $db->query("SELECT gender, count(*) as number FROM users GROUP BY gender");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Data Visualization</title>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Gender', 'Number'],
      <?php
      if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo "['".$row['gender']."', ".$row['number']."],";
          }
      }
      ?>
    ]);

    var options = {
        title: 'Percentage of Male and Female Residents',
        width: 900,
        height: 500,
        is3D:true,
        pieHole: 0.4,
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
}
</script>
<style>
body {background-image:url("image/2.jpg");background-repeat:no-repeat;background-attachment:fixed;
	  background-position: top right;
	  background-size: cover;}

header .head h1 {
  font-family:aguafina-script;text-align: center;color:#ddd;
}
header .head img {
  float: left;
}
header .opt {
  float: right;margin: -100px 20px 0px 0px
}
header .opt a {
  text-decoration: none;
  font-family:cursive;
  text-align: center;
  font-size:20px;
  color:red;
  margin-right: 15px
}
header .opt a:hover {
  opacity: 0.8;cursor: pointer;
}
header .opt #inp {
  padding:3px;
  margin:0px 0px 0px 33px;
  background-color:#00A8A9;
  font-family:cursive;
  font-size:16px;
   opacity: 0.6;
   color:red;}
header .opt #inp:hover {background-color: #00A8A9;
  opacity: 0.8;}
header .opt input {padding-left:5px;
  margin:2px 0px 3px 20px;
  border-radius:7px;
  border-color: #A40D0F ;
  background-color:#8E8989;
   color: white;
 }
header .opt p {font-family:cursive;
  text-align: left;font-size:19px;
  color:#f2f2f2;
}
.export {margin: 0px 0px 10px 20px;
   background-color:#900C3F ;
   font-family:cursive;
   border-radius: 7px;width: 145px;
   height: 28px;
   color: #FFC300;
   border-color: #581845;
   font-size:17px
 }
.export:hover {cursor: pointer;
  background-color:#C70039
}
#table {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#table td, #table th {
    border: 1px solid #ddd;
    padding: 8px;
     opacity: 0.6;
}

#table tr:nth-child(even){
  background-color: #f2f2f2;
}
#table tr:nth-child(odd){
  background-color: #f2f2f2;opacity: 0.9;
}

#table tr:hover {
  background-color: #ddd; opacity: 0.8;
}

#table th {
	 opacity: 0.6;
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #00A8A9;
    color: white;
}
</style>
</head>
<body>
    <!-- Display the pie chart -->
    <div id="piechart"></div>
</body>
</html>
