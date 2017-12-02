<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="styles_joblist.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script>
  $(document).ready(function(){
      $("#hide").click(function(){
        $("#hid").hide(500);

      });
       $("#show").click(function(){
        $("#hid").show(500);
      });
      $("#hide2").click(function(){
        $("#hid2").hide(500);
        $("#hide").hide(500);
      });
       $("#show2").click(function(){
        $("#hid2").show(300);
      });
  });
  </script>

</head>


<body>
<header class = "container-fluid">
    <div class = "row">
      <nav class = "col-lg-2 col-xs-2  text-left" >
         <p ><a class="menu" href="job-list.php">MAIN</a></p>
      </nav>
      <nav class="col-lg-2 "></nav>
      <nav class="col-lg-8 col-xs-10 text-right">
        <p ><a class="menu" href="login.php">LOG IN</a></p>
        <p><a class="menu" href="signup.php">SIGN UP</a></p>
      	<p>CONTACT</p>
      </nav>
    </div>
</header>

<div class="container mrg">
  <div class="container main" align="center">

    <div class = "col-sm-12 desc">
        <h3 style = "color: #439889;">Job Title #1</h3>

        <h5 id ="show" style="color:darkcyan; text-align:right; right:20px;">More...</h5>

        <div id = "hid" style="display:none">
            <h4 style = "margin-top: 1%;">Description:</h4>
            <p class = "description">
            This job is super easy. You just have to sit in the office for some time and pretend to be a programmer. You have look like a programmer, act like a programmer and if somebody comes, open your code (provided by the company)</p>
            <h4 style = "margin-top: 1%;">Required Skills:</h4>
            <p class = "description">
            HTML, CSS, JavaScript, Bootstrap, Some Other Funny Words</p>
            <div class="col-sm-5 col-md-2 col-sm-offset-0" style="display:inline-block;">
                <h4>Payment:</h4>
                <p class = "noline">150$</p>
            </div>
            <div class= "col-sm-5 col-md-2" style="display:inline-block;">
                <h4>Deadline:</h4>
                <p class = "noline">29.10.2018</p>
            </div>
            <h5 id = "hide"  style="color:darkcyan; text-align:right; right:20px;">Hide</h5>
            <p class="edit">E</p>
            <p class="delete">X</p>
            <p class="comment">Comment</p>
            <p class="apply">Apply</p>

         </div>
     </div>
  </div>
</div>

<div class="container mrg">
  <div class="container main" align="center">

    <div class = "col-sm-12 desc">
        <h3 style = "color: #439889;">Job Title #2</h3>
        <button class="btn btn-primary" id ="show2">More</button>
        <div id = "hid2" style="display:none">
        <div class="col-sm-12  col-sm-offset-0" style="display:inline-block;">
          <h4 style = "margin-top: 1%;">Description:</h4>
          <p class = "description"> This job is super easy. </p>
        </div>
        <div class="col-sm-12  col-sm-offset-0" style="display:inline-block;">
          <h4 style = "margin-top: 1%;">Required Skills:</h4>
          <p class = "description">HTML, CSS, JavaScript, Bootstrap, Some Other Funny Words</p>
        </div>

        <div class="col-sm-6 col-md-6 col-sm-offset-0" style="display:inline-block;">
            <h4>Payment:</h4>
            <p class = "noline">150$</p>
        </div>
        <div class= "col-sm-6 col-md-6" style="display:inline-block;">
            <h4>Deadline:</h4>
            <p class = "noline">29.10.2018</p>
        </div>


       <button class="btn btn-primary" id = "hide2">Hide</button>

        <p class="edit">E</p>
        <p class="delete">X</p>
        <p class="comment">Comment</p>
        <p class="apply">Apply</p>
        </div>
     </div>
  </div>
</div>

 <footer class="container">
  <div class="row">
    <div class = "col-sm-8">
    </div>
    <p class="col-sm-4">&copy; AKCorporation. All rights reserved.</p>
  </div>
</footer>
</body>
</html>
