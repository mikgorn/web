<div class="row">
    <div class="col-lg-3"></div>
    
    <div class="col-lg-6">
        <?php 
        if (!$filled){
            echo"<p class='alert alert-danger'> Please enter all fields!</p>";
        }
        if (!$r_pass){
            echo"<p class='alert alert-danger'> Passwords are not the same!</p>";
        }
        if ($is_duplicate){
            echo"<p class='alert alert-danger'> This login is already in use!</p>";
        }
        if ($registered){
            echo"<p class='alert alert-success'> Successfully registered!</p>";
        }
        ?>
        <form method="post">
            <div class="form-group">
                <label>Login</label>
                <input type="text" class="form-control" name="login"/>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password"/>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="re_password"/>
            </div>
            <input type="submit" value = "Register" name = "register"/>
            <p>Already have account? <a href="/web/shopms/login">Log In</a></p>
        </form>
    </div>
</div>