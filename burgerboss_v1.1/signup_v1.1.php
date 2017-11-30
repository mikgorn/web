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
<header class = "container">
    <div class = "row">
      <h2 class = "col-sm-4">Main</h2>
      <nav class="col-sm-8 text-right">
        <p>Help</p>
        <p>Contact</p>
      </nav>
    </div>
</header>
 

<section class = "container">
  <div class="col-sm-6 col-sm-offset-3 form-wrap">
    <h3 align="center">Sign Up page of Burgerboss</h3>
    <form method ="post">
          <div class="row" style="margin:10px; margin-top: 30px;">
            <label class="col-xs-6">Name:</label>
            <input class="col-xs-6" type="form-control" id="name" name="name" value=""><br />
          </div>

          <div class="row" style="margin:10px;">
            <label class="col-xs-6">E-mail:</label>
            <input class="col-xs-6" type="form-control" id="email" name="email" value=""><br />
          </div>

          <div class="row" style="margin:10px;">

            <label class="col-xs-6">Password:</label>
            <input class="col-xs-6" type="password" id="pass" name="pass"><br />
          </div>

          <div class="row" style="margin:10px;">

            <label class="col-xs-6">Repeat password:</label>
            <input class="col-xs-6" type="password" id="repass" name="repass"><br />
          </div>

          <div class="row" align="center" style="margin:20px; margin-top: 30px;">
            <input  type="submit" class="btn btn-default"value = "Sign Up"/>
          </div>
      </form>
    </div>
</section>
    

<footer class="container">
  <div class="row">
    <div class = "col-sm-8">
    </div>  
    <p class="col-sm-4">&copy; AKCorporation. All rights reserved.</p> 
  </div>
</footer>

</body>
</html>

