<?php 

session_start();

$connection = mysqli_connect("localhost","root","","book_shop_db");

function query($sql){
    global $connection ;
    return mysqli_query($connection,$sql);
}

require_once ("function.php");

?>