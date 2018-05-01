<h1>Shop <?php echo($shop["name"]);?></h1>
<h2>Cash <?php echo $cash; ?></h2>
<h2>Card <?php echo $card; ?></h2>
<h2>Debt <?php echo $debt; ?></h2>
<p>Address <?php echo($shop["address"]);?></p>
<p>Phone 1 <?php echo($shop["phone1"]);?></p>
<p>Phone 2 <?php echo($shop["phone2"]);?></p>



<table class="table table-stripped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Season</th>
            <th>Size</th>
            <th>Amount</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
<?php
$items = $shop["items"];
$shop_id = $shop["id"];
foreach($items as $item){
    $id = $item["item"];
    $name = $item["brand"] . " " . $item["code"];
    $season = $item["season"];
    $price_high = $item["price_high"];
    $size = $item["size"];
    $amount = $item["amount"];
    echo"
    <tr>
        <td>$name</td>
        <td>$price_high</td>
        <td>$season</td>
        <td>$size</td>
        <td>$amount</td>
        <td>
        <form method='post' action='/web/shopms/profile/item/$id'>
            <input type='hidden' name='shop' value='$shop_id'/>
            <input type='submit' class='btn btn-default' value='More'/>
        </form></td>
        
    </tr>";
}
    
    ?>
    </tbody>
</table>