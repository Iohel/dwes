<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<form action="../../actions/services/services_basic_insert.php" method="POST"  class="row-cols-2">
    <h1>Insert Service Form</h1>
    <label>Service Name</label>
    <input type="text" name="service_name">
    <label>Service Price</label>
    <input type="number" name="service_price">
    <input type="submit" name="submit" value="submit">
    
</form>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>