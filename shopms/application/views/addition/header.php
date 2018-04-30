<div class="header">
<a href="/web/shopms" class="btn btn-primary">Main</a>
<a href="/web/shopms/login" class="btn btn-primary">Login</a>
<?php
if($user_data["id"]!=""){
    
    $user_id = $user_data["id"];
    $user_name = $user_data["name"];
    $user_access = $user_data["access"];
    $user_company = $user_data["company"];
    
    echo"<a href='/web/shopms/profile/user/$user_id' class='btn btn-primary'>My profile</a>";
    
    if($user_company!=""){
        
    echo"<a href='/web/shopms/profile/company/$user_company' class='btn btn-primary'>My company</a>";
        
        if($user_data["access"]=="1" || $user_data["access"]=="2"){
            echo"<a href='/web/shopms/company/create_item' class='btn btn-primary'>Create item</a>";
        }
    }
    
    echo"<p>Welcome, $user_name ($user_access)</p>";
}
?>
    
</div>