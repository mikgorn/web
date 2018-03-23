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
  <title>Данные по товару shopms.ru</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
  <?php include('header.php'); ?>

<?php
include("server.php");
$name = $_GET["name"];
$code = $_GET["code"];
$shop = $_GET["shop"];
$conn = new mysqli($servername,$username,$password,$database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "select * from items where name='$name' and code ='$code' and shop='$shop';";
$result = $conn->query($sql);
if(mysqli_num_rows($result)>0){
$row = $result->fetch_assoc();
  $name = $row["name"];
  $code = $row["code"];
  $color = $row["color"];
  $price_high = $row["price_high"];
  $photo = $row["photo"];
  if($photo!=""){
    echo"<img src='$photo' width='100%'/>";
  }
} else{
  echo"<div class='alert alert-danger'>Item does not exists!</div>";
}
$pairs = array();
$sql = "select size,amount from items where name='$name' and code ='$code' and shop='$shop';";
$result = $conn->query($sql);
if(mysqli_num_rows($result)>0){
  while($row = $result->fetch_assoc()){
    $size = $row["size"];
    if(intval($row["amount"])>0){
    $pairs[$size]=$row["amount"];
  }
  }
  }
 ?>

 <br />
 <label>Название</label>
 <p><?php echo"$name"?></p>
 <br />

 <label>Артикл</label>
 <p><?php echo"$code"?></p>
 <br />

 <label>Сезон</label>
 <p><?php echo"$color"?></p>
 <br />

 <form action="sell.php" method="post" >


 <label>Размер</label>
</br>
 <?php
 foreach($pairs as $key=> $value){
   echo"<p>
   $key:$value пар(ы)
   </p>";
 }
 echo"<div class=\"btn-group btn-group-justified\">";
 for ($i = 19; $i <= 29; $i++) {
   echo "<p id =\"button$i\" class=\"btn btn-default\">$i</p>
   ";
   if(array_key_exists($i,$pairs)){
     echo"<script>
        var x$i = 0;
     $(document).ready(function(){
         $('#button$i').click(function(){
           if(x$i==0){
             x$i=1;
             $('#form$i').show(500);
             document.getElementById('button$i').style.background='darkgray';
             document.getElementById('input$i').value=\"1\";
           } else{
             x$i=0;
             $('#form$i').hide(500);
             document.getElementById('button$i').style.background='white';
             document.getElementById('input$i').value=\"\";
           }
         });

     });
     </script>
     ";
   } else{
     echo("<script> document.getElementById('button$i').setAttribute(\"disabled\", \"disabled\"); </script>");
   }

 }
 echo"</div>
 </br>";

 echo"<div class=\"btn-group btn-group-justified\">";
 for ($i = 30; $i <= 40; $i++) {
   echo "<p id =\"button$i\" class=\"btn btn-default\">$i</p>
  ";
   if(array_key_exists($i,$pairs)){
     echo"<script>
        var x$i = 0;
     $(document).ready(function(){
         $('#button$i').click(function(){
           if(x$i==0){
             x$i=1;
             $('#form$i').show(500);
             document.getElementById('button$i').style.background='darkgray';
             document.getElementById('input$i').value=\"1\";
           } else{
             x$i=0;
             $('#form$i').hide(500);
             document.getElementById('button$i').style.background='white';
             document.getElementById('input$i').value=\"\";
           }
         });

     });
     </script>
     ";
   } else{
     echo("<script> document.getElementById('button$i').setAttribute(\"disabled\", \"disabled\"); </script>");
   }

 }
 echo"</div>";

 for ($i = 19; $i <= 40; $i++) {
   echo"<div id=\"form$i\" style=\"display:none\">
   <label>$i</label>
   <input id='input$i' type=\"number\" class=\"form-control\" name=\"$i\"/>
   </div>
   ";
 }


  ?>

 <label>Цена</label>
 <p><?php echo"$price_high"?></p>
 <br />


 <label>Покупатель</label>
 </br>
   <input type="text" name="buyer"/>
 </br>

 <label>Примечания</label>
 </br>
   <input type="text" name="memo"/>
 </br>

   <h3>Оплата</h3>
 </br>

 <label>Наличные</label>
 </br>
 <label> <small>Количество наличных денег, полученных от покупателя</small></label>
 </br>
   <input type="number" name="cash" value="<?php echo"$price_high";?>"/>
 </br>

 <label>Карта</label>
 </br>
 <label> <small>Количество денег, оплаченных картой</small></label>
 </br>
   <input type="number" name="card" value="0"/>
 </br>

 <label>Долг</label>
 </br>
 <label> <small>Количество денег, которые будут записаны как долг</small></label>
 </br>
   <input type="number" name="debt" value="0"/>
 </br>
   <input type="hidden"name="name" value=<?php echo"$name";?>>
   <input type="hidden"name="code" value=<?php echo"$code";?>>
   <input type="hidden"name="shop" value=<?php echo"$shop";?>>
   <input type="submit" name = "sell" class="btn btn-default" value="Продать">

 </br>
  <h3>Транспортировка</h3>
   <select class="form-control" name = "destination" >
     <?php
     $sql = "select distinct shop from users where login='$user' and shop!='$shop';";
     $result = $conn->query($sql);
     if(mysqli_num_rows($result)>0){
       while($row = $result->fetch_assoc()){
         $destination = $row["shop"];

         echo"<option>$destination</option>";
       }
     }
     ?>
   </select>
      <input type="submit" name = "transfer" class="btn btn-default" value="Отправить">
 </form>

  <?php include('footer.php'); ?>
</body>
</html>
