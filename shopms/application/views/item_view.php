<h1>Item <?php echo($item["brand"] . " " . $item["code"]);?></h1>

<p>Season <?php echo($item["season"]); ?></p>
<p>Price low <?php echo($item["price_low"]); ?></p>
<p>Price high <?php echo($item["price_high"]); ?></p>

<?php if($user_data["company"] == $item["company"]){
    $id = $item["id"];
    
    echo"
<form method='post'>";
    echo"
    <label>Shop</label>
    <select class='form-control' name='destination'>";
    
    $shops = $company["shops"];
    foreach ($shops as $shop){
        $shop_id = $shop["id"];
        $shop_name = $shop["name"];
        echo"<option value='$shop_id'>$shop_name</option>";
    }
    
    echo"</select>";
        echo"<div class=\"btn-group btn-group-justified\">";
    for ($i = 19; $i <= 29; $i++) {
      echo "<script>
      var x$i = 0;
      $(document).ready(function(){
          $('#button$i').click(function(){
            if(x$i==0){
              x$i=1;
              $('#form$i').show(500);
              document.getElementById('button$i').style.background='darkgray';
              document.getElementById('input$i').value=\"1\";
            } else{
              x$i=0;
              $('#form$i').hide(500);
              document.getElementById('button$i').style.background='white';
              document.getElementById('input$i').value=\"\";
            }
          });

      });
      </script>
      <p id =\"button$i\" class=\"btn btn-default\">$i</p>";
    }
    echo"</div>
    </br>";

    echo"<div class=\"btn-group btn-group-justified\">";
    for ($i = 30; $i <= 40; $i++) {
      echo "<script>
      var x$i = 0;
      $(document).ready(function(){
          $('#button$i').click(function(){
            if(x$i==0){
              x$i=1;
              $('#form$i').show(500);
              document.getElementById('button$i').style.background='darkgray';
              document.getElementById('input$i').value=\"1\";
            } else{
              x$i=0;
              $('#form$i').hide(500);
              document.getElementById('button$i').style.background='white';
              document.getElementById('input$i').value=\"\";
            }
          });

      });
      </script>
      <p id =\"button$i\" class=\"btn btn-default\">$i</p>";
    }
    echo"</div>";

    for ($i = 19; $i <= 40; $i++) {
      echo"<div id=\"form$i\" class=\"row\" style=\"display:none\">
      <div class=\"col-xs-4\">

      <label>$i</label>
      </div>
      <div class=\"col-xs-8\">
      <input id='input$i' type=\"number\" class=\"form-control\" name=\"$i\"/>
      </div>
      </div>
      ";
    }
    
    
    echo"
<input type='hidden' value='outside' name = 'source'/>
<input type='hidden' value='$id' name = 'item'/>
<input type='submit' class='btn btn-primary' value='Send' name = 'send'/>
</form>
";
} ?>