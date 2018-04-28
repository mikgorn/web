
<table class="table table-stripped">
    <thead>
        <tr>
            <th>Brand</th>
            <th>Code</th>
            <th>Season</th>
            <th>Send</th>
        </tr>
    </thead>
    <tbody>
<?php

foreach($items as $item){
    $id = $item["id"];
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
        <td><a class='btn btn-primary' href='/web/shopms/profile/item/$id'>More</a></td>
    </tr>";
}
    
    ?>
    </tbody>
</table>