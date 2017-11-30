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
        <p>Profile</p>
        <p>Log out</p>
      	<p>Help</p>
      </nav>
    </div>
</header>  

<section class = "container">
  <div class="col-sm-6 col-sm-offset-3 form-wrap">
    <div class='alert alert-success'>It's your account!</div>
      
    <div class="row" style="margin:10px; margin-top: 30px;">    
        <label class = "names">Name:</label>
        <label class = "values">Anny</label>
    </div>    
    
    <div class="row" style="margin:10px; ">    
      <label  class = "names">Email:</label>
      <label class = "values">any.klim@mail.ru</label>
    </div>
    <div  class="col-sm-12" style="display: inline-block; padding:10px;" align="center">  
        <form action="new-job.php">
          <button type="submit" class="btn btn-default" style="alignment: center; margin-bottom">Create new Job</button>
        </form>

        <form action="job-list.php">
          <button type="submit" class="btn btn-default">Go to Job list</button>
        </form>

        <form action="modify-profile.php">
          <button type="submit" class="btn btn-default">Modify profile</button>
        </form>
    </div>
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
