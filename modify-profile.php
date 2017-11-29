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

  <?php
    session_start();
    $email=$_SESSION["email"];
    session_write_close();



    $name = $_POST["name"];
    $pass = $_POST["pass"];

    include("server.php");

  if($email!=""){

    $conn = new mysqli($servername,$username,$password,$database);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    if($name !=""){
      $sql = "update users set name='$name' where email='$email';";
      $conn->query($sql);
    }
    if($pass !=""){
      $sql = "update users set pass='$pass' where email='$email';";
      $conn->query($sql);
    }
  } else{
    echo"<div class='alert alert-danger'>Log In first!</div>";
    echo"$email";
  }


   ?>
  <h1>Modify your profile</h1>


  <form method ="post">

    <label>Name</label>
    <input type="text" class="form-control" name="name" />


    <label>Password</label>
    <input type="text" class="form-control" name="pass" />


    <button type="submit" action="signup.php"class="btn btn-default" >Modify</button>
  </form>


</body>
</html>
