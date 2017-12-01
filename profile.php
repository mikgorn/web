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
  $email=$_GET["email"];

  session_start();
  $user=$_SESSION["email"];
  session_write_close();

  include("server.php");

  $conn = new mysqli($servername,$username,$password,$database);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "select * from users where email='$email';";
  $result = $conn->query($sql);
  if(mysqli_num_rows($result)>0){
    $row = $result->fetch_assoc();
    if($user==$email){
      echo"<div class='alert alert-success'>It's your account!</div>";
      $name = $row["name"];

    }

    }else {
      echo"<div class='alert alert-danger'>No user with such e-mail!</div>";
    }

?>
<section class = "container">
  <div class="col-sm-6 col-xs-12 col-sm-offset-3 form-wrap">

<label>Name</label>
<p><?php echo"$name"?></p>
<br />

<label>Email</label>
<p><?php echo"$email"?></p>

<form action="new-job.php">
  <button type="submit" class="btn btn-default">Create new Job</button>
</form>

<form action="job-list.php">
  <button type="submit" class="btn btn-default">Go to Job list</button>
</form>

<form action="modify-profile.php">
  <button type="submit" class="btn btn-default">Modify profile</button>
</form>

</div>
</section>
<?php include("footer.php");?>
</body>
</html>
