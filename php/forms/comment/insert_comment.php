<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    
    $reservation_id = $_POST['reservation_id'];
    
    $sql = "INSERT INTO 043_comments(`reservation_id`,`customer_id`,`timestamp`,) 
    VALUES ('$reservation_id','$customer_id',CURDATE())";
    mysqli_query($conn, $sql);
    mysqli_close($conn);

?>
<form action="../../actions/guests/guests_basic_insert.php" method="POST"  class="row-cols-2">
    <h1>Insert Commentary Form</h1>
    
    <input name="reservation" type="text" value="<?php $reservation_id?>" hidden>
    <label>Comment</label>
    <textarea name="textarea"></textarea>
    <label>Score</label>
    <input type="number" name="score">
    
    <input type="submit" name="submit" value="submit">
</form>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>
