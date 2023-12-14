<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>

<?php
    //variable catching 
    $service_name = $_POST['service_name'];
    $service_price = $_POST['service_price']; 
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php 
    $sql = "INSERT INTO 043_services(`service_name`, `service_price`) 
            VALUES ('$service_name','$service_price')";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
?>

<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>
