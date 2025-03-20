<?php
include("dbcon.php");
session_start();
if (!isset($_SESSION["admin_arr"])) {
    header("location: login.php");

}
