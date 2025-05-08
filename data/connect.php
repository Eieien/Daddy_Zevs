<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "bakerydb";

$conn = new mysqli($host, $user, $pass, $dbname);

if($conn->connect_error){
    echo "Error: ".$conn->connect_error;
}
?>