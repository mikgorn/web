<a href="/web/shopms" class="btn btn-primary">Main</a>
<a href="/web/shopms/login" class="btn btn-primary">Login</a>
<?php
session_start();
if($user_data["name"]!=""){
    
    $user_id = $user_data["id"];
    $user_name = $user_data["name"];
    $user_access = $user_data["access"];
    echo"<a href='/web/shopms/profile/user/$user_id' class='btn btn-primary'>My profile</a>";
    echo"<p>Welcome, $user_name ($user_access)</p>";
}
?>