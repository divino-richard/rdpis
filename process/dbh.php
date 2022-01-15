<?php
/**
 * DATABASE CONNECTION USING MYSQLI
 */
function db_connect(){
    $con = mysqli_connect("localhost", "root", "", "rdpis");

    if(!$con) die("Failed to connect to the Database: " . mysqli_connect_error());

    return $con;
}