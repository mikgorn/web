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
  <title>Статистика по безналичному рассчету shopms.ru</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
  <?php include('header.php'); ?>

<h2>Данные по безналичному рассчету</h2>
  <?php
      include("server.php");
      $conn = new mysqli($servername,$username,$password,$database);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      $sql = "select * from log_money where type like '%card%' and shop='$shop' order by id desc limit 20;";
      $result = $conn->query($sql);
      if(mysqli_num_rows($result)>0){
        echo"<table class='table table-striped'>
  <thead>
    <tr>
      <th>Дата</th>
      <th>Количество</th>
      <th>Продавец</th>
      <th>Примечания</th>
    </tr>
  </thead>
  <tbody>";
        while($row = $result->fetch_assoc()) {
          $date = $row["date"];
          $amount = $row["amount"];
          $admin = $row["user"];
          $memo = $row["memo"];
          echo"
          <tr>
            <td>$date</td>
            <td>$amount</td>
            <td>$admin</td>
            <td>$memo</td>
          </tr>
          ";

        }

        echo"

            </tbody>
          </table>";

      }
      else{
        echo"<div class='alert alert-danger'>Нет данных!</div>";
      }

  ?>

  <?php include('footer.php'); ?>
</body>
</html>
