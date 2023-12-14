<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    if(isset($_POST['submit'])){
        $reservation_id = $_POST['reservation_id'];
    }
    $sql = "SELECT start_date,end_date FROM 043_reservations WHERE reservation_id = $reservation_id";
    
    $result = mysqli_query($conn, $sql);

    $reservation = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<form action="../../actions/reservations/reservations_basic_delete.php" method="POST">
    <p>The reservation you have selected is about to be deleted do you want to do it?</p>
    <input type="text" name="reservation_id" value=<?php echo $reservation_id?> readonly>
    <input type="date" name="start_date" value=<?php echo $reservation[0]["start_date"]?> readonly>
    <input type="date" name="end_date" value=<?php echo $reservation[0]["end_date"]?> readonly>
    <input type="submit" name="submit" value="submit">
</form>
<?php
    mysqli_free_result($result);
    mysqli_close($conn);
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>