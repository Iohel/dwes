<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>

<?php
    //variable catching 
    $room_id = $_POST['room_id'];
    $customer_id = $_POST['customer_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $number_guests = $_POST['number_guests'];
    $price = $_POST['price'];

    //Session stuff later
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php 
    $sql = "INSERT INTO `043_reservations`(`room_id`,`customer_id`,`start_date`,`end_date`,`number_guests`,`reservation_price`) 
    VALUES ('$room_id','$customer_id','$start_date','$end_date','$number_guests','$price')";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
?>

<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>
