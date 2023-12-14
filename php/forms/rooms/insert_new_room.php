<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<form action="../../actions/rooms/rooms_basic_insert.php" method="POST"  class="row-cols-2">
    <h1>Insert Room Form</h1>
    <label>Room Type</label>
    <input type="number" name="type_id">
    <label>Hotel Number</label>
    <input type="number" name="hotel_number">
    <input type="submit" name="submit" value="submit">
    
</form>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>