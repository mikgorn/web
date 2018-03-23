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
  <title>Поиск товара shopms.ru</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
  <?php include('header.php'); ?>

  <form method="post" enctype="multipart/form-data">
    <label>Брэнд</label>
    <input type="text" class="form-control" name="name"/>
    </br>

    <label>Артикул</label>
    <input type="text" class="form-control" name="code"/>
    </br>

    <label>Размер</label>
    <input type="number" class="form-control" name="size"/>
    </br>

    <label>Сезон</label>
    <input type="text" class="form-control" name="color"/>
    </br>


    <input type="submit" class="btn btn-default" value="Поиск">
  </form>

  <?php
  $name = $_POST["name"];
  $code = $_POST["code"];
  $size = intval($_POST["size"]);
  $color = $_POST["color"];


    if(($user!="")&(($size>0)|($name.$code.$color!=""))){
        include("server.php");
        $conn = new mysqli($servername,$username,$password,$database);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        if($size>0){
          $sql = "select * from items where name like '%$name%' and code like '%$code%' and color like '%$color%' and size=$size and amount>0 and shop='$shop' order by name,code;";
        }else{
        $sql = "select * from items where name like '%$name%' and code like '%$code%' and color like '%$color%' and amount>0 and shop='$shop' order by name,code;";
      }
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)>0){
          echo"<table class='table table-striped'>
    <thead>
      <tr>
        <th>Название</th>
        <th>Артикул</th>
        <th>Размер</th>
        <th>Цена</th>
        <th>Подробнее</th>
      </tr>
    </thead>
    <tbody>";
          while($row = $result->fetch_assoc()) {
            $name = $row["name"];
            $code = $row["code"];
            $size = $row["size"];
            $price = $row["price_high"];

            $id = $row["id"];
            $shop_1 = $row["shop"];
            echo"
            <tr>
              <td>$name</td>
              <td>$code</td>
              <td>$size</td>
              <td>$price</td>
              <td><a class='btn btn-default' href='info.php?name=$name&code=$code&shop=$shop_1'>Подробнее</a></td>
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
