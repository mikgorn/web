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

  <?php
    $test=$_GET["test"];
    if($test=="duplicate"){
      echo"<div class='alert alert-danger'>Job with same name is already exists!</div>";
    }else{

    $name=$_POST["name"];
    $email = $_POST["email"];
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
      $sql = "insert into jobs(id,name,email,description,skill,payment,deadline) values('$id','$name','$email','$description','$skill','$payment','$deadline');";
      $conn->query($sql);
      session_start();
      $_SESSION["email"]=$email;
      session_write_close();
      header("Location: job.php?new=true&id=$id");
    }
  }
}


   ?>
  <h1>Signup page of Burgerboss</h1>

  <form method ="post">

    <label>Name</label>
    <input type="text" class="form-control" name="name" />

    <label>E-mail</label>
    <input type="text" class="form-control" name="email" />

    <label>Description</label>
    <input type="text" class="form-control" name="description" />

    <label>Skill requirement</label>
    <input type="text" class="form-control" name="skill" />

    <label>Payment</label>
    <input type="text" class="form-control" name="payment" />

    <label>Deadline</label>
    <input type="text" class="form-control" name="deadline" />

    <button type="submit" class="btn btn-default" >Create new Job</button>

  </form>


</body>
</html>
