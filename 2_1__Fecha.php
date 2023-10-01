<?php
    header('Content-Type: text');

    if (isset($_GET['format'])){
        $format = $_GET['format'];
    }else{
        $format = 'Y-m-d H:i:s';
    }
    
    $currentTime = date($format);

    echo $currentTime;

?>