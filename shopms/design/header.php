<div class="header row">
    <div class="col-lg-3">
        
    </div>
    <div class="col-lg-6 row">
        <div class="header-button col-lg-2">
            <a href="">Main</a>
        </div>
        <div class="header-button col-lg-2">
            <a href="">Profile</a>
        </div>
        <div class="header-button col-lg-2">
            <a href="">Company</a>
        </div>
        <div class="header-button col-lg-2">
            <a href="">Items</a>
        </div>
    </div>
    <div class="col-lg-3">
        
        <a href="/web/shopms/login" class="header-button-text">Login</a>
        
    </div>
</div>

<!-- <div class="header">


?php
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
-->