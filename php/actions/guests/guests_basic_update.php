<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php
    //variable catching 
    if(isset($_POST['submit'])){
        $guest_id = $_POST['guest_id'];
        $guest_name = $_POST['guest_name'];
        $guest_surname = $_POST['guest_surname'];
        $guest_dob = $_POST['guest_dob'];
        $guest_nif = $_POST['guest_nif'];
        
        
    }
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    
    $sql = "UPDATE 043_guests SET guest_name='$guest_name', guest_surname='$guest_surname', guest_nif = '$guest_nif',guest_dob='$guest_dob' WHERE guest_id = $guest_id";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>

