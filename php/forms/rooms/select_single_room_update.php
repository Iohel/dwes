<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<form action="./update_existing_room.php" method="POST">
    <h1>Select Single Form</h1>
    <label for="">Input the room_id to update.</label>
    <input type="number" name="room_id">
    <input type="submit" name="submit" value="submit">
</form>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>