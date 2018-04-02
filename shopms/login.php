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
        <div class="row">
            <div class="col-lg-5 col-sm-4"></div>
            <form class="col-lg-2 col-sm-4 block">
                <div class="form-group">
                <label for="pass">Имя пользователя</label>
                <input type="text" class="form-control" name="login" id="login"/>
                </div>
                
                <div class="form-group">
                <label for="pass">Пароль</label>
                <input type="text" class="form-control" name="pass" id="pass"/>
                </div>
                <input type="submit" class="btn btn-primary" value="Войти"/>
                <p class="text-restore">Забыли пароль?  <a href="restore.php">Восстановление пароля</a></p>
                
            </form>
        </div>
    </body>
</html>