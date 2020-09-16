
<?php
require('connectDB.php');
$message="";
if(count($_POST)>0) {


  $result = mysqli_query($conn,"SELECT * FROM admin WHERE username='" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
  $count  = mysqli_num_rows($result);
  if($count==0) {
    $message = "Invalid Username or Password!";
  } else {
    $message = "You are successfully authenticated!";
  header("Location: addcard.php");
  }
}
?>
<!DOCTYPE html>
<html>
 <head>
  <title>login</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
    body{
  background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('image/IS-bg4.jpg');
  background-repeat:no-repeat;
  background-attachment:fixed;
  background-size: cover;
}

.loginbox{

  width: 320px;
  height: 450px;
  background:#000;
  opacity: 0.8;
  color: #fff;
  top:50%;
  left: 50%;
  position: absolute;
  transform: translate(-50%,-50%);
  box-sizing: border-box;
  border-radius: 20px;
  padding:70px 30px;
}
.loginbox i{

  color: #009f8b;
   font-size: 40px;
  width: 100px;
  height: 100px;
  position: absolute;
  top: -50px;
  left: calc(50% - 30px);


}

h1{
    margin:0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 22px;



}

.loginbox p{
margin: 0;
padding: 0;
font-weight: bold;


}
.loginbox input{
  width: 100%;
  margin-bottom: 20px;
}

.loginbox input[type="text"],input[type="Password"]{

  border:none;
  border-bottom: 1px solid #fff;
  background: transparent;
  outline: none;
  height: 40px;
  font-size: 16px;
  color: #fff;
}
.loginbox input[type="text"],input[type="Email"]{

  border:none;
  border-bottom: 1px solid #fff;
  background: transparent;
  outline: none;
  height: 40px;
  font-size: 16px;
  color: #fff;
}


.loginbox input[type="submit"]{

  border:none;
  outline: none;
  height: 40px;
  background:#000;
  color: #fff;
  font-size: 18px;
  border-radius: 20px;

}

.loginbox input[type="submit"]:hover{


  cursor: pointer;
  background: #009f8b;
  color: #000;
}
.loginbox a{
  text-decoration: none;
  font-size: 12px;
  line-height: 20px;
  color:darkgrey;


}

.loginbox a:hover{

  color: #009f8b;

}
</style>
 </head>


 <body>
    <div id="nav-placeholder">

</div>


  <br />
  <div class="loginbox">

   <br />

  
   
     <form method="post">
      <div class="message"><?php if($message!="") { echo $message; } ?></div>

 


    <h1>Login Here</h1>
       <label>Username</label>
       <input type="text" name="username" id="username" />
   

       <label>Password</label>
       <input type="password" name="password" id="password" />
 
       <input type="submit" name="login" id="login" value="login" class="btn btn-info"  />
       
      <a href="#">Forogot your password?</a> <br>
       <a href="regform.php">Don't have an account?</a>
   
 
     </form>

  
   <br />
   
  </div>
 </body>
</html>