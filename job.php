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
  $new=$_GET["new"];



  session_start();
  $email=$_SESSION["email"];
  session_write_close();



  include("server.php");

  $conn = new mysqli($servername,$username,$password,$database);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "select * from jobs where id='$id';";
  $result = $conn->query($sql);
  if(mysqli_num_rows($result)>0){
    $row = $result->fetch_assoc();
    if($new=="true"){
      echo"<div class='alert alert-success'>Job successfully added!</div>";
    }
      $id=$row["id"];
      $name = $row["name"];
      $description = $row["description"];
      $skill = $row["skill"];
      $payment = $row["payment"];
      $deadline = $row["deadline"];
      $owner = $row["email"];


    }else {
      echo"<div class='alert alert-danger'>Such job does not exist!</div>";
    }

    $text=$_POST["text"];
    if($text!=""){
      if($email==""){
        echo"<div class='alert alert-danger'>Please log in first!</div>";
      } else{
        $comment_id=uniqid();
        $sql = "insert into comments(id,job,user,text,chosen) values('$comment_id','$id','$email','$text',0);";
        $conn->query($sql);
        echo"<div class='alert alert-success'>Comment successfully added!</div>";
      }
    }
?>

<label>Name</label>
<p><?php echo"$name"?></p>
<br />

<label>Description</label>
<p><?php echo"$description"?></p>
<br />

<label>Skill requirement</label>
<p><?php echo"$skill"?></p>
<br />

<label>Payment</label>
<p><?php echo"$payment"?></p>
<br />

<label>Deadline</label>
<p><?php echo"$deadline"?></p>
<br />

<table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Text</th>
      </tr>
    </thead>
    <tbody>

<?php

$sql = "select * from comments where job='$id';";
$result = $conn->query($sql);
if(mysqli_num_rows($result)>0){
  while($row = $result->fetch_assoc()) {
    $sql = "select * from users where email='" . $row["user"]. "';";
    $user_result= $conn->query($sql);
    $username = $user_result->fetch_assoc();
      echo "<tr ";
      if($username["chosen"]==1){
        echo"class='success'";
      }
      echo">
      <td>".$username["name"]."</td>
      <td>".$row["text"]."</td>

      </tr>";
  }

  }else {
    echo"<div class='alert alert-danger'>No comments.</div>";
  }

?>
</tbody>
</table>

<form method ="post">

  <label>Apply for this Job:</label>
  <input type="text" class="form-control" name="text" />

  <button type="submit" class="btn btn-default" >Apply</button>
</form>
<?php
if($email==$owner){
  echo"<button type='submit' class='btn btn-default' onclick=\"window.location.href='modify-job.php?id=$id'\">Modify Job</button>";
}?>
<?php include("footer.php");?>
</body>
</html>
