<?php
  session_start();
  $user=$_SESSION["user"];
  $shop=$_SESSION["shop"];
  session_write_close();

  if($user==""){
    header('Location: login.php');
  }
?>
<!DOCTYPE html>

<html>
<head>
  <title> shopms.ru</title>
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
