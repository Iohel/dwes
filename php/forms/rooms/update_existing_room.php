<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    $room_id = $_POST['room_id'];
    
    $sql = "SELECT type_id, hotel_number, status, state FROM 043_rooms WHERE room_id = $room_id;";

    $result = mysqli_query($conn, $sql);

    $rooms = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<form action="../../actions/rooms/rooms_basic_update.php" method="POST">
    <h1>Update Single Form</h1>
    <label for="">room_id</label>
    <input type="number" name="room_id" value="<?php echo $room_id?>" readonly>
    <label for="">type_id</label>
    <input type="number" name="type_id" value=<?php echo $rooms[0]["type_id"]?>>
    <label for="">hotel_number</label>
    <input type="number" name="hotel_number" value=<?php echo $rooms[0]["hotel_number"]?>>
    <label for="">status</label>
    <input type="number" name="status" value=<?php echo $rooms[0]["status"]?>>
    <label for="">Input either Dirty, Clean or Maintenance</label>
    <input type="text" name="state" value= <?php echo $rooms[0]["state"]?>>
    <input type="submit" name="submit" value="submit">
</form>
<?php
    mysqli_free_result($result);
    mysqli_close($conn);
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>