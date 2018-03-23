<div class="header">
  <div class="row">



<div class="user-info col-xs-6">


<?php

echo"<p>Здравствуйте, $user    </p>";
echo"<p>Магазин: $shop</p>";
echo"</br>";
?>
</div>
<script>
var menu_show = 0;
$(document).ready(function(){
    $('#menu_button').click(function(){
      if(menu_show==0){
        menu_show=1;
        $('#menu_items').show(500);
      } else{
        menu_show=0;
        $('#menu_items').hide(500);
      }
    });

});
</script>
<div class="col-xs-3">

</div>
<div class="menu-buttons col-xs-3">


<button id = "menu_button" class="btn btn-default menu-main-button" style="display:block">Меню</button>

</div>
</br>
</div>


<div id = "menu_items" class="btn-group btn-group-vertical menu-items" style="display:none">
  <a type="button" href="index.php" class="btn btn-default menu-item" style="display:block">Главная</a>
  <a type="button" href="add_item.php" class="btn btn-default menu-item" style="display:block">Добавить</a>
  <a type="button" href="list_item.php" class="btn btn-default menu-item" style="display:block">Склад</a>
  <a type="button" href="search.php" class="btn btn-default menu-item" style="display:block">Поиск</a>
  <a type="button" href="stats.php" class="btn btn-default menu-item" style="display:block">Статистика</a>
</div>
  </div>
