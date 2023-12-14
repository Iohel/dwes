<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php
    //variable catching 
    if(isset($_POST['submit'])){
        $service_id = $_POST['service_id'];
    }
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    
    $sql = "DELETE FROM 043_services WHERE service_id = $service_id";
    
    if(mysqli_query($conn, $sql)){
        echo"<p>'The service has been deleted.'</p>";
    };
    
    mysqli_close($conn);
    
?>

<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>
