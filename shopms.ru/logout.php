<?php
  session_start();
  $_SESSION["user"]="";
  $_SESSION["access"]="";
  $_SESSION["shop"]="";
  session_write_close();

    header('Location: login.php');

?>
