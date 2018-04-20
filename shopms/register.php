<!DOCTYPE html>
<html>
    <head>
        <title>Главная shopms.ru</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="styles.css" />
    </head>
    <body>
        <?php
        include("header.php");
        ?>
        <div >
            <form method="post">
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
                
                <div class="form-group">
                    <label for="image">Фото</label>
                    <input type="file" capture="camera" name="image" id="image" />
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