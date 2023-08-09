<?php
session_start();
session_destroy();
unset($_SESSION["serveurselecte"]);
  ?>
<meta http-equiv="refresh" content="0;url=../index.php">