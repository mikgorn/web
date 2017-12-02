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

<section class = "container">
  <div class="col-sm-6 col-xs-12 col-sm-offset-3 form-wrap">

  <?php
  session_start();
  $email=$_SESSION["email"];
  session_write_close();
    $test=$_GET["test"];
    if($test=="duplicate"){
      echo"<div class='alert alert-danger'>Job with same name is already exists!</div>";
    }else{





    $name=$_POST["name"];
    $description=$_POST["description"];
    $skill = $_POST["skill"];
    $payment = $_POST["payment"];
    $deadline = $_POST["deadline"];

    $id=uniqid();

    include("server.php");

  if($email!=""){

    $conn = new mysqli($servername,$username,$password,$database);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "select * from jobs where name='$name';";
    $result = $conn->query($sql);

    echo "<br />";

    if($result->num_rows>0){
      header("Location: new-job.php?test=duplicate");
    } else{
      if($name!="" && $description!=""){
      $sql = "insert into jobs(id,name,email,description,skill,payment,deadline) values('$id','$name','$email','$description','$skill','$payment','$deadline');";
      $conn->query($sql);
      echo"<div class='alert alert-success'>Job added</div>";
      header("Location: job.php?new=true&id=$id");
    } else{
      if($name . $description!=""){
      echo"<div class='alert alert-danger'>Enter required fields!</div>";
    }
    }
    }
  } else{
    echo"<div class='alert alert-danger'>Please log in!</div>";
  }
}


   ?>
  <h1>Signup page of Burgerboss</h1>

  <form method ="post">

    <label>Name</label>
    <input type="text" class="form-control" name="name" />

    <label>Description</label>
    <textarea rows="5" type="text" class="form-control" name="description" ></textarea>

    <label>Skill requirement</label>
    <input type="text" class="form-control" name="skill" />

    <label>Payment</label>
    <input type="number" class="form-control" name="payment" />

    <label>Deadline</label>
    <input type="text" class="form-control" name="deadline" />

    <button type="submit" class="btn btn-default" >Create new Job</button>

  </form>
</div>
</section>
<?php include("footer.php");?>
</body>
</html>
