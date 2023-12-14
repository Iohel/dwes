<?php
//Connect Database.
$conn = mysqli_connect('dwesdatabase','dwess1234','test1234','dwesdatabase');

//Connection check
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}else{
    echo 'good conection';
    echo '<br>';
}
?>