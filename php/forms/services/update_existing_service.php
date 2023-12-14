<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    $service_id = $_POST['service_id'];
    
    $sql = "SELECT * FROM 043_services WHERE service_id = $service_id;";

    $result = mysqli_query($conn, $sql);

    $services = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<form action="../../actions/services/services_basic_update.php" method="POST">
    <h1>Update Single Form</h1>
    <label for="">service_id</label>
    <input type="number" name="service_id" value="<?php echo $service_id?>" readonly>
    <label for="">service_name</label>
    <input type="text" name="service_name" value=<?php echo $services[0]["service_name"]?>>
    <label for="">service_price</label>
    <input type="text" name="service_price" value=<?php echo $services[0]["service_price"]?>>
    <input type="submit" name="submit" value="submit">
</form>
<?php
    mysqli_free_result($result);
    mysqli_close($conn);
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>