<?php

    $configs = require_once(__DIR__.'/../../config.php');

    //Get Server Configuration
    $db_servername = $configs->db_servername;
    $db_username = $configs->db_username;
    $db_userpass = $configs->db_userpass;
    $db_name = $configs->db_name;

    //Connect to Database
    try {
        $db_conn = new PDO("mysql:host=$db_servername;dbname=$db_name", $db_username, $db_userpass);
        $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connect to database successful";
    } catch (PDOException $e){
        //echo "Failed to connect database " . $err->getMessage();
        $e->getMessage();
    }

?>