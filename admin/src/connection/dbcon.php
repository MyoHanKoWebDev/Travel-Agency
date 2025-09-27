<?php
    $dbname="localhost";
    $username="root";
    $password="";
    $database="travel_agency"; 

    $con=mysqli_connect($dbname,$username,$password,$database);
    if(!$con){
        die("Can't Connect To Database :". mysqli_connect_error($con));
    }
?>