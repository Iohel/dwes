
<?php
    //variable catching 
    if(isset($_POST['submit'])){
        
        $guest_id = $_POST['guest_id'];
        $guest_name = $_POST['guest_name'];
        $guest_surname = $_POST['guest_surname'];
        $guest_dob = $_POST['guest_dob'];
        $guest_nif = $_POST['guest_nif'];
        $control = $_POST["assign"];
        
    }
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    
    $sql = "UPDATE 043_guests SET guest_name='$guest_name', guest_surname='$guest_surname', guest_nif = '$guest_nif',guest_dob='$guest_dob' WHERE guest_id = $guest_id";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    if ($control != "") {
        header("Location: /student043/dwes/php/forms/guests/guests_search_form.php");
    }else{
        header("Location: /student043/dwes/php/forms/reservations/reservations_search_from.php");
    }

?>


