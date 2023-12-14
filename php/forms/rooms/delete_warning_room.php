<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    if(isset($_POST['submit'])){
        $room_id = $_POST['room_id'];
    }
    $sql = "SELECT hotel_number FROM 043_rooms WHERE room_id = $room_id;";

    $result = mysqli_query($conn, $sql);
    $rooms = mysqli_fetch_all($result, MYSQLI_ASSOC);

    
?>

<form action="../../actions/rooms/rooms_basic_delete.php" method="POST">
    <p>The room you have selected is about to be deleted do you want to do it?</p>
    <input type="text" name="room_id" value=<?php echo $room_id?> readonly>
    <input type="number" name="hotel_number" value=<?php echo $rooms[0]["hotel_number"]?> readonly>
    <input type="submit" name="submit" value="submit">
</form>
<?php
    mysqli_free_result($result);
    mysqli_close($conn);
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>