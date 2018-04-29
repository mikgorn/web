<h1>Item <?php echo($item["brand"] . " " . $item["code"]);  if(isset($shop_name)){ echo " from " . $shop_name;}?> </h1>

<p>Season <?php echo($item["season"]); ?></p>
<p>Price low <?php echo($item["price_low"]); ?></p>
<p>Price high <?php echo($item["price_high"]); ?></p>


<?php if($user_data["company"] == $item["company"]){
    $id = $item["id"];
    echo"
<form method='post'>";
    
    echo"
    <label>Action</label>
    <select class='form-control' name='destination'>";
    if(isset($shop_id)){
        echo"<option value='sell'>Sell</option>";
        echo"<option value='outside'>Drop</option>";
    }
    $shops = $company["shops"];
    foreach ($shops as $shop){
        $shop_id_tmp = $shop["id"];
        $shop_name_tmp = $shop["name"];
        if(isset($shop_id)){
            if($shop_id!=$shop_id_tmp){
                echo"<option value='$shop_id_tmp'>Send to $shop_name_tmp</option>";
            }   
        } else{
        echo"<option value='$shop_id_tmp'>Send to $shop_name_tmp</option>";
        }
    }
    
    
    echo"</select>";
    
    
        echo"<div class=\"btn-group btn-group-justified\">";
    for ($i = 19; $i <= 29; $i++) {
        echo"<p id =\"button$i\" class=\"btn btn-default\">$i</p>";
        if(array_key_exists($i,$sizes)){
            if($sizes[$i]>0){
            $amount = $sizes[$i];
      echo "<script>
      var x$i = 0;
      var max$i = $amount;
      $(document).ready(function(){
            
            $('#input$i').change(function(){
                if(document.getElementById('input$i').value>max$i){
                    document.getElementById('input$i').value = max$i;
                    alert('Not enough items on storage');
                }
                if(document.getElementById('input$i').value<0){
                    document.getElementById('input$i').value = 0;
                    alert('Cannot be negative');
                }
            });
            
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
      ";
            } else{
                echo"<script> document.getElementById('button$i').setAttribute(\"disabled\", \"disabled\");</script>";
            }
    } else{
            echo"<script> document.getElementById('button$i').setAttribute(\"disabled\", \"disabled\");
            </script>
            ";
        }
        
    }
    echo"
    </div>
    </br>";

    echo"<div class=\"btn-group btn-group-justified\">";
    for ($i = 30; $i <= 40; $i++) {
        echo"<p id =\"button$i\" class=\"btn btn-default\">$i</p>";
     if(array_key_exists($i,$sizes)){
      echo "<script>
      var x$i = 0;
      var max$i = $amount;
      $(document).ready(function(){
            
            $('#input$i').change(function(){
                if(document.getElementById('input$i').value>max$i){
                    document.getElementById('input$i').value = max$i;
                    alert('Not enough items on storage');
                }
                if(document.getElementById('input$i').value<0){
                    document.getElementById('input$i').value = 0;
                    alert('Cannot be negative');
                }
            });
            
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
      ";
    } else{
            echo"<script> document.getElementById('button$i').setAttribute(\"disabled\", \"disabled\");
            </script>
            ";
        }
        
    
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
    
    
    
    if(isset($shop_id)){echo"<input type='hidden' value='$shop_id' name = 'source'/> <input type='hidden' name='shop' value='$shop_id'/>";  } else{echo"<input type='hidden' value='outside' name = 'source'/>"; }
    
    echo"
<input type='hidden' value='$id' name = 'item'/>
<input type='submit' class='btn btn-primary' value='Send' name = 'send'/>
</form>
";
} ?>