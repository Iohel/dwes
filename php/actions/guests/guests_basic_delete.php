<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php
    //variable catching 
    if(isset($_POST['submit'])){
        $guest_id = $_POST['guest_id'];
    }
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    
    $sql = "DELETE FROM 043_guests WHERE guest_id = $guest_id";
    
    if(mysqli_query($conn, $sql)){
        echo"<p>'The guest has been deleted.'</p>";
    };

    mysqli_close($conn);
    
?>

<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>
