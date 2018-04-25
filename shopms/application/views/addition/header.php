<a href="/web/shopms" class="btn btn-primary">Main</a>
<a href="/web/shopms/login" class="btn btn-primary">Login</a>
<?php
if($user!=""){
    echo"<p>Welcome, $user ($role)</p>";
}
?>