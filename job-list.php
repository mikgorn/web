<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="styles.css" />
  <link rel="stylesheet" type="text/css" href="styles_joblist.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


<body>
<?php include("header.php");?>
<!--
<section class = "container">
  <div class="col-sm-12 col-xs-12  form-wrap">

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

<php
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

>
</tbody>
</table>


</div>
</section>
-->

<?php
  include("server.php");

  $conn = new mysqli($servername,$username,$password,$database);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "select * from jobs;";
  $result = $conn->query($sql);
  if(mysqli_num_rows($result)>0){
    $i=0;
    while($row = $result->fetch_assoc()) {
      $i++;
      $id=$row["id"];
      $name=$row["name"];
      $description=$row["description"];
      $skill=$row["skill"];
      $payment=$row["payment"];
      $deadline=$row["deadline"];
      echo"<script>
      $(document).ready(function(){
          $('#show$i').click(function(){
            $('#show$i').hide(500);
            $('#info$i').show(500);
            $('#hide$i').show(500);
          });
           $('#hide$i').click(function(){
            $('#show$i').show(500);
            $('#info$i').hide(500);
            $('#hide$i').hide(500);
          });

      });
      </script>
      <div class='container mrg'>
        <div class='container main' align='center'>

          <div class = 'col-sm-12 desc'>
              <h3 style = 'color: #439889;'>$name</h3>

              <button class='btn btn-primary' id ='show$i'>More</button>

              <div id = 'info$i' style='display:none'>
                  <h4 style = 'margin-top: 1%;'>Description:</h4>
                  <p class = 'description'>
                  $description</p>
                  <h4 style = 'margin-top: 1%;'>Required Skills:</h4>
                  <p class = 'description'>
                  $skill</p>
                  <div class='col-sm-5 col-md-2 col-sm-offset-0' style='display:inline-block;'>
                      <h4>Payment:</h4>
                      <p class = 'noline'>$payment</p>
                  </div>
                  <div class= 'col-sm-5 col-md-2' style='display:inline-block;'>
                      <h4>Deadline:</h4>
                      <p class = 'noline'>$deadline</p>
                  </div>

                  <p class='edit'>E</p>
                  <p class='delete'>X</p>
                  <p class='apply' onclick=\"window.location.href='job.php?id=$id'\">Apply</p>

               </div>
               <button class='btn btn-primary' id = 'hide$i' style='display:none'>Hide</button>
           </div>
        </div>
      </div>";
    }

    }else {
      echo"<div class='alert alert-danger'>No results!</div>";
    }

?>
<?php include("footer.php");?>
</body>
</html>
