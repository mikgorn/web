<?php
  session_start();
  $user=$_SESSION["user"];
  $shop=$_SESSION["shop"];
  $access=$_SESSION["access"];
  session_write_close();

  if($user==""){
    header('Location: login.php');
  }
?>
<!DOCTYPE html>

<html>
<head>
  <title>Статистика shopms.ru</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
  <?php include('header.php'); ?>

  <h2>Сегодня</h2>

  <?php
  if($user!=""){
      include("server.php");
      $conn = new mysqli($servername,$username,$password,$database);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      $today= date("Y.m.d");
      $sql = "select * from log_items where date like '%$today%' and shop='$shop';";
      $result = $conn->query($sql);
      if(mysqli_num_rows($result)>0){
        echo"<table class='table table-striped'>
  <thead>
    <tr>
      <th>Название</th>
      <th>Цена</th>
      <th>Продавец</th>

    </tr>
  </thead>
  <tbody>";
        while($row = $result->fetch_assoc()) {
          $name = $row["name"] ." " . $row["code"];
          $price = intval($row["cash"])+intval($row["card"])+intval($row["debt"]);
          $destination = $row["destination"];
          $admin = $row["user"];
          if($destination!="sold"){
            $price = "Перевезено в $destination";
          }
          $id = $row["id"];
          $item = $row["item"];
          echo"
          <tr>
            <td>$name</td>
            <td>$price</td>
            <td>$admin</td>
          </tr>
          ";

        }

        echo"

            </tbody>
          </table>";

      }
      else{
        echo"<div class='alert alert-danger'>Нет продаж на сегодня!</div>";
      }
    }
  ?>
</br>

<h2>Касса</h2>
<?php
if(($access=="1")|($access=="2")){
  echo"
  <a href=\"money_in.php\" class=\"btn btn-success\">Ввести средства</a>
  <a href=\"money_out.php\" class=\"btn btn-warning\">Вывести средства</a>";
} ?>
<p class='money'>Наличные</p>
<?php
$sql = "select sum(amount) as total from log_money where type like '%cash%' and shop='$shop';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$sum = intval($row["total"]);
echo"<p onclick=\"location.href='cash_info.php';\" class='money-cash bg-success'>
$sum
</p>";
?>
<p class='money'>Безнал</p>
<?php
$sql = "select sum(amount) as total from log_money where type like '%card%' and shop='$shop';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$sum = intval($row["total"]);
echo"<p onclick=\"location.href='card_info.php';\" class='money-card bg-warning'>
$sum
</p>";
?>

<p class='money'>Долг</p>
<?php
$sql = "select sum(amount) as total from log_money where type like '%debt%' and shop='$shop';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$sum = intval($row["total"]);
echo"<p onclick=\"location.href='debt_info.php';\" class='money-debt bg-danger'>
$sum
</p>";
?>

</br>
<a href="reports.php" class="btn btn-primary">Отчеты</a>
  <?php include('footer.php'); ?>
</body>
</html>
