<?php
  $login = strtolower($_POST["login"]);
  $pass = $_POST["password"];

  include("server.php");
  $conn = new mysqli($servername,$username,$password,$database);

  $sql = "select * from users where login='$login';";
  $result = $conn->query($sql);
  if(mysqli_num_rows($result)>0){
    $row = $result->fetch_assoc();

    if($pass==$row["password"]){
      session_start();
      $_SESSION["user"] = $login;
      $_SESSION["access"] = $row["access"];
      $_SESSION["shop"] = $row["shop"];
      session_write_close();
      header('Location: index.php');
      die();
    }

  } else{
    if($login!=""){
      echo"<p class='alert alert-danger'>Пользователя с таким именем не существует!</p>";
    }
  }
?>

<!DOCTYPE html>

<html>
<head>
  <title>Вход shopms.ru</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
  <?php
  if($user!=""){include('header.php');} ?>

  <form method="post">
    <label>Логин</label>
    <input type="text" class="form-control" name="login"/>

    <label>Пароль</label>
    <input type="password" class="form-control" name="password"/>

    <input type="submit" value="Войти">

  </form>

  <?php include('footer.php'); ?>
</body>
</html>
