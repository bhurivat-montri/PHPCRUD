<?php
    
    $configs = include('../../config.php');

    //Send App'information to Client-side script file. 
    echo json_encode($configs->app_info);

?>