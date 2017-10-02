<?php
session_save_path("sessiones");
session_start();
session_destroy();
echo'<META HTTP-EQUIV="Refresh" CONTENT="0;URL= index.php">';
?>

