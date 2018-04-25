
<h1>Profile of <?php echo $profile["name"]; ?></h1>
<p>Login <?php echo $profile["login"];?></p>
<p>Phone <?php echo $profile["phone"];?></p>
<?php
if($is_mine &&($profile["company"]=="") && (($role=="1") ||($role=="2")  )){
    echo"<a class='btn btn-primary' href='/web/shopms/company/create'>Create new company</a>";
}

if($company["name"]!=""){
    $company_id = $company["id"];
    $company_name = $company["name"];
    
    echo"<p>Company <a href='/web/shopms/profile/company/$company_id'>$company_name</a></p>";
}
    ?>