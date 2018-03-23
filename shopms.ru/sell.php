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
  <title>Продажа товара shopms.ru</title>
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

  $id = uniqid();
  $name = $_POST["name"];
  $code = $_POST["code"];
  $shop = $_POST["shop"];

  $cash = intval($_POST["cash"]);
  $card = intval($_POST["card"]);
  $debt = intval($_POST["debt"]);

  $buyer=$_POST["buyer"];
  $memo =$_POST["memo"];

  $date = date("Y.m.d H:i");
  $destination="";
  if(isset($_POST["transfer"])){
    $destination = $_POST["destination"];
    echo"<div class='alert alert-success'>Товар отправлен!</div>";
  }else{
    $destination = "sold";
    if($cash>0){
    $sql="insert into log_money(id,type,date,amount,user,buyer,memo,shop) values('$id','cash_in','$date',$cash,'$user','$buyer','$memo','$shop');";
    $result = $conn->query($sql);
    echo"<div class='alert alert-success'>Товар продан!</div>";
  }
  if($card>0){
  $sql="insert into log_money(id,type,date,amount,user,buyer,memo,shop) values('$id','card_in','$date',$card,'$user','$buyer','$memo','$shop');";
  $result = $conn->query($sql);
}
if($debt>0){
$sql="insert into log_money(id,type,date,amount,user,buyer,memo,shop) values('$id','debt_in','$date',$debt,'$user','$buyer','$memo','$shop');";
$result = $conn->query($sql);
}
  }
  for($i=19;$i<=44;$i++){
    if(intval($_POST[$i])>0){
        $amount = intval($_POST[$i]);
        $sql = "select * from items where name='$name' and code='$code' and shop='$shop' and size=$i;";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)>0){
          $row = $result->fetch_assoc();
          $color = $row["color"];
          $price_low = $row["price_low"];
          $price_high = $row["price_high"];
          $image_loc=$row["photo"];

        $sql="insert into items(id,name,code,size,color,price_low,price_high,amount,photo,shop) values('$id','$name','$code',$i,'$color',$price_low,$price_high,$amount,'$image_loc','$destination')
        ON DUPLICATE KEY UPDATE amount = amount+$amount;";
        $result = $conn->query($sql);


        $sql="update items set amount = amount-$amount where name='$name' and code ='$code' and size =$i and shop='$shop';";
        $result = $conn->query($sql);

        $sql ="insert into log_items(id,date,name,code,size,cash,card,debt,user,buyer,memo,shop,destination,amount) values('$id','$date','$name','$code',$i,$cash,$card,$debt,'$user','$buyer','$memo','$shop','$destination',$amount);";
        $result = $conn->query($sql);
      }
      }
    }


 ?>

</body>
</html>
