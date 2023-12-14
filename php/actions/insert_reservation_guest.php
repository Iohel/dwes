<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php
    //variable catching 
    $reservation_id = $_POST['reservation_id'];
    $guest_id = $_POST['guest_id']; 
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php 
    
    $sql = "INSERT INTO 043_guest_reservation(guest_id,reservation_id, input_date) VALUES ('$guest_id','$reservation_id',CURDATE())";

    $result = mysqli_query($conn, $sql);


    
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>
