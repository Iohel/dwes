<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>

<?php
    //variable catching 
    $guest_name = $_POST['name'];
    $guest_surname = $_POST['surname'];
    $guest_dob = $_POST['dob'];
    $guest_nif = $_POST['nif'];
    
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php 
    $sql = "INSERT INTO 043_guests(guest_name, guest_surname, guest_dob, guest_nif) 
            VALUES ('$guest_name','$guest_surname','$guest_dob','$guest_nif')";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
?>

<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>
