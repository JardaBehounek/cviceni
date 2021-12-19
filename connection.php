<?php
    $connection = mysqli_connect('localhost','root','','db_kniha');
    if(!($connection)){
        echo "Spojení s databází nebylo navázáno";
    }
?>