<div class="row">
    <div class="col-lg-3"></div>
    
    <div class="col-lg-6">
        <?php 
        if (!$filled){
            echo"<p class='alert alert-danger'> Please enter all required fields!</p>";
        }
       
        if ($is_duplicate){
            echo"<p class='alert alert-danger'> This shop name is already in use!</p>";
        }
        if ($registered){
            echo"<p class='alert alert-success'> Successfully registered!</p>";
        }
        ?>
        <form method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name"/>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address"/>
            </div>
            <div class="form-group">
                <label>Phone 1</label>
                <input type="text" class="form-control" name="phone1"/>
            </div>
            <div class="form-group">
                <label>Phone 2</label>
                <input type="text" class="form-control" name="phone2"/>
            </div>
            <input type="submit" value = "Create" name = "create"/>
        </form>
    </div>
</div>