<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php
    //variable catching 
    if(isset($_POST['submit'])){
        $reservation_id = $_POST['reservation_id'];
    }
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    
    $sql = "DELETE FROM 043_reservations WHERE reservation_id = $reservation_id";
    
    if(mysqli_query($conn, $sql)){
        echo"<p>'La reserva ha sido borrada'</p>";
    };

    mysqli_close($conn);
    
?>

<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>
