<?php
  session_start();
  $user = $_SESSION["user"];
  $shop = $_SESSION["shop"];
  session_write_close();
if ($user==""){
      header('Location: login.php');
    }
     ?>
<!DOCTYPE html>

<html>
<head>
  <title>Склад shopms.ru</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
  <?php include('header.php'); ?>

  <?php
    if($user!=""){
        include("server.php");
        $conn = new mysqli($servername,$username,$password,$database);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $sql = "select name,code,avg(price_high) as price from items where amount>0 and shop='$shop' group by name,code;";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)>0){
          echo"<table class='table table-striped'>
    <thead>
      <tr>
        <th>Брэнд</th>
        <th>Артикул</th>
        <th>Цена</th>
        <th>Подробнее</th>
      </tr>
    </thead>
    <tbody>";
          while($row = $result->fetch_assoc()) {
            $name = $row["name"];
            $code = $row["code"];
            $price = $row["price"];
            $id = $row["id"];
            echo"
            <tr>
              <td>$name</td>
              <td>$code</td>
              <td>$price</td>
              <td><a class='btn btn-default' href='info.php?name=$name&code=$code&shop=$shop'>Подробнее</a></td>
            </tr>
            ";

          }

          echo"

              </tbody>
            </table>";

        }
        else{
          echo"<div class='alert alert-danger'>Нет предметов на складе!</div>";
        }
    }
    ?>

  <?php include('footer.php'); ?>
</body>
</html>
