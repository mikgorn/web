<?php
  session_start();
  $user=$_SESSION["user"];
  $shop=$_GET["shop"];
  session_write_close();

  include("server.php");
  $conn = new mysqli($servername,$username,$password,$database);

  $sql = "select * from users where login='$user' and shop='$shop';";
  $result = $conn->query($sql);
  if(mysqli_num_rows($result)>0){

      session_start();
      $_SESSION["shop"] = $shop;
      session_write_close();
      header('Location: /index.php');
      die();


  } else{
    if($shop!=""){
      echo"<p class='alert alert-danger'>У вас нет доступа к данному магазину!</p>";
    }
  }
?>
<!DOCTYPE html>

<html>
<head>
  <title>Смена магазина shopms.ru</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
  <?php include('header.php'); ?>



  <?php include('footer.php'); ?>
</body>
</html>
