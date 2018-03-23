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
  <title>Главная shopms.ru</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
  <?php include('header.php'); ?>
<div class="main-page">
  <h2>SHOPMS.RU</h2>
  <p>
  Вы находитесь на главной странице сайта shopms.ru.
  </p>
  </br>

</div>
<h4>Сменить магазин</h4>

  <?php
  include('server.php');
  $conn = new mysqli($servername,$username,$password,$database);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
  $sql = "select * from users where login='$user';";
  $result = $conn->query($sql);
  if(mysqli_num_rows($result)>0){
    while($row = $result->fetch_assoc()){
      $shop = $row["shop"];

      echo"<a type=\"button\" href=\"shop.php/?shop=$shop\" class=\"btn btn-default btn-shop\">Войти в $shop</a>";
    }
  }

  ?>

  <?php include('footer.php'); ?>
</body>
</html>
