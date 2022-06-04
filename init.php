<?php


//initialize variables
$server_name = "184.168.115.213";
$mysql_user = "suggest_car_user";
$mysql_pass = "3kr5tTYKTs?_";
$db_name = "suggest_car";

// connect to the database
$con = mysqli_connect($server_name, $mysql_user, $mysql_pass, $db_name);


//record error message if connection not succeed (error will recorded in error_log file at the same directory)
if(!$con){
    error_log("Unable to connect to the database.", 0);
}

?>