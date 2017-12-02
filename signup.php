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

<section class = "container">
  <div class="col-sm-6 col-xs-12 col-sm-offset-3 form-wrap">

  <?php
    $test=$_GET["test"];
    if($test=="duplicate"){
      echo"<div class='alert alert-danger'>This e-mail is already taken!</div>";
    }else{

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

    echo "<br />";

    if($result->num_rows>0){
      header("Location: signup.php?test=duplicate");
    } else{
      $sql = "insert into users(name,email,password) values('$name','$email','$pass');";
      $conn->query($sql);
      session_start();
      $_SESSION["email"]=$email;
      session_write_close();
      header("Location: profile.php?new=true&email=$email");
    }
  }
}


   ?>
  <h1>Signup page of Burgerboss</h1>


  <form method ="post">

    <label>Name</label>
    <input type="text" class="form-control" name="name" />

    <label>E-mail</label>
    <input type="text" class="form-control" name="email" />

    <label>Password</label>
    <input type="password" class="form-control" name="pass" />

    <label>Repeat password</label>
    <input type="password" class="form-control" name="repass" />

    <button type="submit" action="signup.php"class="btn btn-default" >Sign Up</button>
  </form>

</div>
</section>

<?php include("footer.php");?>
</body>
</html>
