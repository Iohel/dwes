<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php
    //variable catching 
    if(isset($_POST['submit'])){
        $room_id = $_POST['room_id'];
    }
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    
    $sql = "DELETE FROM 043_rooms WHERE room_id = $room_id";
    
    if(mysqli_query($conn, $sql)){
        echo"<p>'The room has been deleted.'</p>";
    };

    mysqli_close($conn);
    
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>
