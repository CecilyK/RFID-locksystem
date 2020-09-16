<!DOCTYPE html>
<html>
<head>



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<title>Update Payment Status</title>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>





<style type="text/css">

body{

    background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('image/IS-bg3.jpg');
    background-repeat:no-repeat;
    background-attachment:fixed;
    background-size: cover;



    }

        table td{

            color: white ;
        }
</style>
</head>
<body>
<div class="container">
    <br>
    <br>
    <!-- Button trigger modal -->
    <br>
    <br>
      
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Gender</th>
                <th scope="col">Payment Status</th>
                 <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
               <?php
                        require'connectDB.php';
                        $query = "SELECT id, username, gender, PaymentStatus FROM users";
                        if ($result = $conn->query($query)) {
                        while ($row = $result->fetch_assoc()) {
                                 $id = $row["id"];
                            $username = $row["username"];
                            $gender = $row["gender"];
                            $PaymentStatus = $row["PaymentStatus"];
                 ?>
                        <tr>
                            <td> <?php  echo $id.'<br />' ?> </td>
                         <td> <?php  echo $username.'<br />' ?> </td>
                         <td> <?php  echo $gender.'<br />' ?> </td>
                         <td> <?php  echo $PaymentStatus.'<br />' ?> </td>
                         <td><a href="Update.php?did=<?php echo $row["id"]; ?> "> <button type="button" class="btn btn-warning">Update </button></a></td>
<?php
    }
    }
        ?>
    </tr>
            </tbody>
        </table>
            </form>
    </div>
  </body>
</html>
