<?php

$conn = new mysqli("localhost", "root", "", "irms_db");

if($conn->connect_error){
    echo "Error: {$conn->connect_error}";
    die;
}

?>