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
                <label>Brand</label>
                <input type="text" class="form-control" name="brand"/>
            </div>
            <div class="form-group">
                <label>Code</label>
                <input type="text" class="form-control" name="code"/>
            </div>
            <div class="form-group">
                <label>Season</label>
                <input type="text" class="form-control" name="season"/>
            </div>
            <div class="form-group">
                <label>Price low</label>
                <input type="number" class="form-control" name="price_low"/>
            </div>
            <div class="form-group">
                <label>Price high</label>
                <input type="number" class="form-control" name="price_high"/>
            </div>
            <input type="submit" value = "Create" name = "create"/>
        </form>
    </div>
</div>