<?php

session_start(); 
ob_start();

$timezone = date_default_timezone_set("America/Los_Angeles");

$con = mysqli_connect("localhost", "root", "", "Spotify");

if(mysqli_connect_errno()){
    echo mysqli_connect_errno();
}


?>