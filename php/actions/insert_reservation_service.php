<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php
    //variable catching 
    $reservation_id = $_POST['reservation_id'];
    $service_id = $_POST['service_id'];
    echo($reservation_id);
    echo($service_id);
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php 
    
    $sql = "INSERT INTO 043_services_reservation(service_id,reservation_id, input_date) VALUES ('$service_id','$reservation_id',CURDATE())";

    $result = mysqli_query($conn, $sql);


    
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>
