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
  <title>Ввод средств shopms.ru</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
  <?php include('header.php'); ?>

<?php
include('server.php');

$conn = new mysqli($servername,$username,$password,$database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }

$id=uniqid();
$cash = intval($_POST["cash"]);
$card = intval($_POST["card"]);


$date = date("Y.m.d H:i");
$memo =$_POST["memo"];

if($cash>0){
  if($cash>0){
  $sql="insert into log_money(id,type,date,amount,user,buyer,memo,shop) values('$id','cash_in','$date',$cash,'$user','','$memo','$shop');";
  $result = $conn->query($sql);
  echo"<div class='alert alert-success'>Средства добавлены!</div>";
}
if($card>0){
$sql="insert into log_money(id,type,date,amount,user,buyer,memo,shop) values('$id','card_in','$date',$card,'$user','','$memo','$shop');";
$result = $conn->query($sql);
}
}
 ?>


<form method="post">
<h2>Ввод средств</h2>
<label>Примечания</label>
</br>
  <input type="text" name="memo"/>
</br>

  <h3>Средства</h3>
</br>

<label>Наличные</label>
</br>
  <input type="number" name="cash" value="0"/>
</br>
<label>Карта</label>
</br>
  <input type="number" name="card" value="0"/>
</br>
<input type="submit"  class="btn btn-default" value="Отправить"/>
</form>

  <?php include('footer.php'); ?>
</body>
</html>
