
<table class="table table-stripped">
    <thead>
        <tr>
            <th>Brand</th>
            <th>Code</th>
            <th>Season</th>
            <th>Price_low</th>
            <th>Price_high</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
<?php

foreach($items as $item){
    $brand = $item["brand"];
    $code = $item["code"];
    $season = $item["season"];
    $price_low = $item["price_low"];
    $price_high = $item["price_high"];
    echo"
    <tr>
        <td>$brand</td>
        <td>$code</td>
        <td>$season</td>
        <td>$price_low</td>
        <td>$price_high</td>
    </tr>";
}
    
    ?>
    </tbody>
</table>