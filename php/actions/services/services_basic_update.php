<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php
    //variable catching 
    if(isset($_POST['submit'])){
        $service_id = $_POST['service_id'];
        $service_name = $_POST['service_name'];
        $service_price = $_POST['service_price'];
    }
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    
    $sql = "UPDATE 043_services SET `service_name`='$service_name',service_price=$service_price WHERE service_id = $service_id";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>

