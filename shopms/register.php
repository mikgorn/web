<?php

    include("server.php");    
    $conn = new mysqli($servername,$username,$password,$database);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
    $error="";
    $registered = "";


    if($_POST){
        $name=$_POST["name"];
        $login=$_POST["login"];
        $pass=$_POST["pass"];
        $repass=$_POST["repass"];
        
        $uploaddir = $_SERVER['DOCUMENT_ROOT'] . "/shopms.ru/images/";
        
        
        
        
        $required = array("name", "login", "pass", "repass");
        foreach($required as $field){
            if(empty($_POST[$field])){
                $error = "required"; 
            }
        }
        
        if ($error==""){
            
            $sql = "select * from users where login='$login';";
            $result = $conn->query($sql);
            if(mysqli_num_rows($result)>0){
                $error="duplicate";
            } else{
                $id=uniqid();
                $sql="insert into users(id,name,login,pass) values('$id','$name','$login','$pass');";
                
                $result = $conn->query($sql);
                echo $conn->error;
                $registered = "registered";
            }
        }
        
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Главная shopms.ru</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="styles.css" />
    </head>
    <body>
        <?php
        include("header.php");
        ?>
        <?php
            if($error=="required"){
                echo"<div class='alert alert-danger'>Fill all required fields!</div>";
            }
            if($error=="duplicate"){
                echo"<div class='alert alert-danger'>This name is taken!</div>";
            }
            if($registered=="registered"){
                echo"<div class='alert alert-success'>Successfully registered!</div>";
            }
        ?>
        <div >
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" id="name"/>
                </div>
                
                <div class="form-group">
                    <label for="login">Login:</label>
                    <input type="text" class="form-control" name="login" id="login"/>
                </div>
                <div class="form-group">
                    <label for="pass">Password:</label>
                    <input type="password" class="form-control" name="pass" id="pass"/>
                </div>
                <div class="form-group">
                    <label for="repass">Repeat password:</label>
                    <input type="password" class="form-control" name="repass" id="repass"/>
                </div>
                
                
                
                <input type="submit" class="btn btn-primary"value="Register"/>
                <p>Already have an account? <a href="login.php">Login</a></p>
            </form>
        </div>
        
        <?php
        include("footer.php");
        ?>
    </body>
</html>