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

  <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Description</th>
          <th>Skill</th>
          <th>Payment</th>
          <th>Deadline</th>
          <th>Apply</th>
        </tr>
      </thead>
      <tbody>

<?php
  include("server.php");

  $conn = new mysqli($servername,$username,$password,$database);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "select * from jobs;";
  $result = $conn->query($sql);
  if(mysqli_num_rows($result)>0){
    while($row = $result->fetch_assoc()) {
      $id=$row["id"];
        echo "<tr>
        <td>".$row["name"]."</td>
        <td>".substr($row["description"],0,50)."</td>
        <td>".$row["skill"]."</td>
        <td>".$row["payment"]."</td>
        <td>".$row["deadline"]."</td>
        <td>
          <button type='submit' class='btn btn-default' onclick=\"window.location.href='job.php?id=$id'\">More</button>
        </td>
        </tr>";
    }

    }else {
      echo"<div class='alert alert-danger'>No results!</div>";
    }

?>
</tbody>
</table>




</body>
</html>
