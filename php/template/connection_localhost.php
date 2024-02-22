<?php
//Connect Database.
$conn = mysqli_connect('localhost','root','','047_hotel');

//Connection check
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}else{
    echo 'good conection';
    echo '<br>';
}
?>