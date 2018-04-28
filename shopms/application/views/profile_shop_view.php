<h1>Shop <?php echo($shop["name"]);?></h1>
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
        </tr>
    </thead>
    <tbody>
<?php
$items = $shop["items"];

foreach($items as $item){
    $id = $item["item"];
    $name = $item["brand"] . " " . $item["code"];
    $season = $item["season"];
    $price_high = $item["price_high"];
    $size = $item["size"];
    echo"
    <tr>
        <td>$name</td>
        <td>$price_high</td>
        <td>$season</td>
        <td>$size</td>
        
    </tr>";
}
    
    ?>
    </tbody>
</table>