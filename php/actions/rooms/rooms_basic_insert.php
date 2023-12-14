<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>

<?php
    //variable catching 
    $type_id = $_POST['type_id'];
    $hotel_number = $_POST['hotel_number'];
    
    if(isset($_POST['submit'])){
        echo "Type: " . $_POST['type_id'];
        echo '<br>';
        echo "Hotel Number: " . $_POST['hotel_number'];
        echo '<br>';
        
    }
    
    //
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php 
    $sql = "INSERT INTO 043_rooms(hotel_id, type_id, hotel_number) VALUES (1,$type_id,$hotel_number)";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
?>

<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>
