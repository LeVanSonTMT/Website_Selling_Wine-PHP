<?php
    session_start();
    include_once("./quantri/conn.php");    
    session_destroy();
    echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
?>