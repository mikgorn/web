<?php
  session_start();
  $user = $_SESSION["user"];
  $access = $_SESSION["access"];
  $shop = $_SESSION["shop"];
  session_write_close();
if ($user==""){
      header('Location: login.php');
    }
     ?>
    <!DOCTYPE html>

<html>
<head>
  <title>Добавление товара shopms.ru</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
  <?php include('header.php'); ?>

  <?php


      $name = $_POST["name"];
      $code = $_POST["code"];
      $color = $_POST["color"];
      $price_low = intval($_POST["price_low"]);
      $price_high = intval($_POST["price_high"]);

      if (($name!="")&($price_high>0)){
        $id = uniqid();

        $uploaddir = $_SERVER['DOCUMENT_ROOT'] . "/shopms.ru/images/";
        $image = $uploaddir . basename($_FILES['image']['name']);
        $image_loc = "/shopms.ru/images/" . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $image)) {
        } else {
        }



        include("server.php");


        $date = date("Y.m.d H:i");
        $conn = new mysqli($servername,$username,$password,$database);
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        for ($i=19;$i<=44;$i++){
          $amount = intval($_POST["$i"]);
          if ($amount>0){
            $sql="insert into items(id,name,code,size,color,price_low,price_high,amount,photo,shop) values('$id','$name','$code',$i,'$color',$price_low,$price_high,$amount,'$image_loc','$shop')
            ON DUPLICATE KEY UPDATE amount = amount+$amount;";
            $result = $conn->query($sql);

            $sql ="insert into log_items(id,date,name,code,size,cash,card,debt,user,buyer,memo,shop,destination,amount) values('$id','$date','$name','$code',$i,0,0,0,'$user','','','out','$shop',$amount);";
            $result = $conn->query($sql);
          echo $conn->error;
          }
        }

        echo"<div class='alert alert-success'>Товар добавлен!</div>";

}
     ?>



  <form class = "input-field"method="post" enctype="multipart/form-data">



    <div class="row">
      <div class="col-xs-4">
        <label>Брэнд</label>
      </div>
      <div class="col-xs-8">
        <input type="text" class="form-control" name="name"/>
      </div>
    </div>
    </br>




    <div class="row">
      <div class="col-xs-4">
        <label>Артикул</label>
      </div>
      <div class="col-xs-8">
        <input type="text" class="form-control" name="code"/>
      </div>
    </div>
    </br>




    <label>Размер</label>
  </br>
    <?php
    echo"<div class=\"btn-group btn-group-justified\">";
    for ($i = 19; $i <= 29; $i++) {
      echo "<script>
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
      <p id =\"button$i\" class=\"btn btn-default\">$i</p>";
    }
    echo"</div>
    </br>";

    echo"<div class=\"btn-group btn-group-justified\">";
    for ($i = 30; $i <= 40; $i++) {
      echo "<script>
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
      <p id =\"button$i\" class=\"btn btn-default\">$i</p>";
    }
    echo"</div>";

    for ($i = 19; $i <= 40; $i++) {
      echo"<div id=\"form$i\" class=\"row\" style=\"display:none\">
      <div class=\"col-xs-4\">

      <label>$i</label>
      </div>
      <div class=\"col-xs-8\">
      <input id='input$i' type=\"number\" class=\"form-control\" name=\"$i\"/>
      </div>
      </div>
      ";
    }
     ?>
</br>

<div class="row">
  <div class="col-xs-4">
    <label>Сезон</label>
  </div>
  <div class="col-xs-8">
  <input type="text" class="form-control" name="color"/>
  </div>
</div>
</br>






<?php
  if(($access=="1")|($access=="2")){
    echo"<div class=\"row\">
      <div class=\"col-xs-4\">
      <label>Себестоимость</label>
      </div>
      <div class=\"col-xs-8\">
      <input type=\"number\" class=\"form-control\" name=\"price_low\"/>
      </div>
    </div>
    </br>";
  }
?>

<div class="row">
  <div class="col-xs-4">
      <label>Цена</label>
  </div>
  <div class="col-xs-8">
      <input type="number" class="form-control" name="price_high"/>
  </div>
</div>
</br>



    <label>Фото</label>
    <input type="file" capture="camera" name="image" />
  </br>

    <input type="submit" class="btn btn-default" value="Добавить товар">
  </form>

  <?php include('footer.php'); ?>
</body>
</html>
