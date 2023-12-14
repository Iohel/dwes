<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php
    //variable catching 
    if(isset($_POST['submit'])){
        $room_id = $_POST['room_id'];
        $type_id= $_POST['type_id'];
        $hotel_number = $_POST['hotel_number'];
        $status = $_POST['status'];
        $state = $_POST['state'];
    }
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    $sql = "UPDATE 043_rooms SET type_id=$type_id, hotel_number=$hotel_number, status=$status, state='$state' WHERE room_id = $room_id";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>
