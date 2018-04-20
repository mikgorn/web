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
        
        <div >
            <form method="post">
                <div class="form-group">
                    <label for="login">Login:</label>
                    <input type="text" class="form-control" name="login" id="login"/>
                </div>
                <div class="form-group">
                    <label for="pass">Password:</label>
                    <input type="password" class="form-control" name="pass" id="pass"/>
                </div>
                <input type="submit" class="btn btn-primary"value="Login"/>
                <p>Dont have account yet? <a href="register.php">Register</a></p>
            </form>
        </div>
        
        <?php
        include("footer.php");
        ?>
    </body>
</html>