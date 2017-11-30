<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="styles.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


<body>
<?php include("header.php");?>
  <?php
    $id=$_GET["id"];

    session_start();
    $email=$_SESSION["email"];
    session_write_close();


    $name = $_POST["name"];
    $description = $_POST["description"];
    $skill = $_POST["skill"];
    $payment = $_POST["payment"];
    $deadline = $_POST["deadline"];



    include("server.php");

  if($email!=""){

    $conn = new mysqli($servername,$username,$password,$database);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "select * from jobs where id='$id';";
    $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      if($email!=$row["email"]){
        echo"<div class='alert alert-danger'>You are not owner of this Job!</div>";

      } else{
    if($name !=""){
      $sql = "update jobs set name='$name' where id='$id';";
      $conn->query($sql);
    }
    if($description !=""){
      $sql = "update jobs set description='$description' where id='$id';";
      $conn->query($sql);
    }
    if($skill !=""){
      $sql = "update jobs set skill='$skill' where id='$id';";
      $conn->query($sql);
    }
    if($payment !=""){
      $sql = "update jobs set payment='$payment' where id='$id';";
      $conn->query($sql);
    }
    if($deadline !=""){
      $sql = "update jobs set deadline='$deadline' where id='$id';";
      $conn->query($sql);
    }
  }
  } else{
    echo"<div class='alert alert-danger'>Log In first!</div>";
    echo"$email";
  }

  $sql = "select * from jobs where id='$id';";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
   ?>
  <h1>Modify job <?php echo$row["name"];?></h1>


  <form method ="post">

    <label>Name</label>
    <input type="text" class="form-control" name="name" />

    <label>Description</label>
    <input type="text" class="form-control" name="description" />

    <label>Skill requrement</label>
    <input type="text" class="form-control" name="skill" />

    <label>Payment</label>
    <input type="text" class="form-control" name="payment" />

    <label>Deadline</label>
    <input type="text" class="form-control" name="deadline" />


    <button type="submit" class="btn btn-default" >Modify</button>
  </form>

<?php include("footer.php");?>
</body>
</html>
