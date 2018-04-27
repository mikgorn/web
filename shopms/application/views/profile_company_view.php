<h1>Company <?php echo($company["name"]);?></h1>
<p>Owner <?php echo($company["owner"]);?></p>
<p>Phone 1 <?php echo($company["phone1"]);?></p>
<p>Phone 2 <?php echo($company["phone2"]);?></p>

<table class="table table-stripped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Phone 1</th>
            <th>Phone 2</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
<?php
$shops = $company["shops"];

foreach($shops as $shop){
    $id = $shop["id"];
    $name = $shop["name"];
    $address = $shop["address"];
    $phone1 = $shop["phone1"];
    $phone2 = $shop["phone2"];
    echo"
    <tr>
        <td>$name</td>
        <td>$address</td>
        <td>$phone1</td>
        <td>$phone2</td>
        <td><a class='btn btn-primary' href='/web/shopms/profile/shop/$id'>Info</a></td>
    </tr>";
}
    
    ?>
    </tbody>
</table>
    <?php
if($company["id"]==$user_data["company"] && $user_data["access"]==1){
    echo"<a class='btn btn-primary' href='/web/shopms/company/create_shop/'>Create shop</a>";
}
?>
