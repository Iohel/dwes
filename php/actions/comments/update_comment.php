<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php include($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/functions/validationFunctions.php')?>
<?php
    //variable catching 
    if(isset($_POST['submit'])){
        
        $reservation_id = $_POST['reservation'];
        $textarea = validateInput($_POST['textarea']);
        $score = validateInput($_POST['score']);
        
    }
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    $sql = "UPDATE `043_comments` SET `comment`='$textarea',`score`='$score' WHERE reservation_id = '$reservation_id";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>
