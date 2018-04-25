
<h1>Profile of <?php echo $profile["name"]; ?></h1>
<p>Login <?php echo $profile["login"];?></p>
<p>Phone <?php echo $profile["phone"];?></p>
<?php
if(($profile["company"]=="") && (($role=="1") ||($role=="2")  )){
    echo"<a class='btn btn-primary' href='/web/shopms/company/create'>Create new company</a>";
}
    ?>