
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php include($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/functions/validationFunctions.php')?>
<?php
    //variable catching 
    echo($_POST['submit']);
    print_r($_POST);
    if(isset($_POST['submit'])){
        
        $id = $_POST['id'];
        $option = validateInput($_POST['option']);


        $sql = "UPDATE 043_comments SET status = '$option' WHERE comment_id = '$id'";
        mysqli_query($conn, $sql);
        mysqli_close($conn);

      
        
    }

    header("Location: /student043/dwes/php/forms/comment/comment_edit_form.php"); 
?>