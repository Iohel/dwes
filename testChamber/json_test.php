<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>

<?php

    $reservation_id = $_POST['reservation_id'];
    $service_id = $_POST['service_id']; 

    $sql = "SELECT * from 043_reservations";
    $result = mysqli_query($conn, $sql);
    $reservations = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $json = file_get_contents($reservations[0]['extra_json']);
    $decoded_json = json_decode($json,true);
    $decoded_json = $decoded_json + [];

?>

<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>
