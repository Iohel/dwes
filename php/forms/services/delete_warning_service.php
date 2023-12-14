<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    if(isset($_POST['submit'])){
        $service_id = $_POST['service_id'];
    }
    $sql = "SELECT * FROM 043_services WHERE service_id = $service_id;";

    $result = mysqli_query($conn, $sql);
    $services = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    
?>

<form action="../../actions/services/services_basic_delete.php" method="POST">
    <p>The room you have selected is about to be deleted do you want to do it?</p>
    <input type="text" name="service_id" value=<?php echo $service_id?> readonly>
    <input type="text" name="service_name" value=<?php echo $services[0]['service_name']?> readonly>
    <input type="submit" name="submit" value="submit">
</form>
<?php
    mysqli_free_result($result);
    mysqli_close($conn);
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>