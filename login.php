<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="styles.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


<body>
<?php include("header.php");?>
  <?php

    $email = $_POST["email"];
    $pass = $_POST["pass"];

    include("server.php");

  if($email!=""){

    $conn = new mysqli($servername,$username,$password,$database);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "select * from users where email='$email';";
    $result = $conn->query($sql);

    if($result->num_rows>0){
      $row=$result->fetch_assoc();
      if($pass==$row["password"]){
      session_start();
      $_SESSION["email"]=$email;
      session_write_close();

      header("Location: profile.php?email=$email");
    } else{
      echo"<div class='alert alert-danger'>Wrong password!</div>";
    }

    } else{
      echo"<div class='alert alert-danger'>No user with such e-mail!</div>";
    }
  }


   ?>
   <section class = "container">
     <div class="col-sm-6 col-xs-12 col-sm-offset-3 form-wrap">

       <div class="col-sm-12" style="display:inline-block; padding:20px; font-size:20px;" align="center">
         <h1>Login page of Burgerboss</h1>
       </div>


  <form method ="post">

    <label>E-mail</label>
    <input type="text" class="form-control" name="email" />

    <label>Password</label>
    <input type="password" class="form-control" name="pass" />

    <div style="padding:10px;">
    <button type="submit" action="signup.php"class="btn btn-default" >Log In</button>
    <div>

  </form>
</div>
   </section>
<?php include("footer.php");?>
</body>
</html>
