<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php
    //variable catching 
    if(isset($_POST['submit'])){
        $reservation_id = $_POST['reservation_id'];
        $room_id = $_POST['room_id'];
        $customer_id = $_POST['customer_id'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $number_guests = $_POST['number_guests'];
        $reservation_status = $_POST['reservation_status'];
    }
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    $sql = "UPDATE 043_reservations SET room_id=$room_id, customer_id=$customer_id, start_date=$start_date, end_date=$end_date, number_guests=$number_guests, reservation_status='$reservation_status' WHERE reservation_id=$reservation_id";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>

