<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<form action="./delete_warning_service.php" method="POST">
    <h1>Delete Single Form</h1>
    <label for="">Input the service_id to delete.</label>
    <input type="number" name="service_id">
    <input type="submit" name="submit" value="submit">
</form>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>
