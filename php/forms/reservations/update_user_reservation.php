<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    $reservation_id = $_POST['reservation_id'];
    
    $sql = "SELECT room_id,customer_id,start_date,end_date,number_guests,reservation_status FROM 043_reservations WHERE reservation_id = $reservation_id;";

    $result = mysqli_query($conn, $sql);

    $reservation = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<main>
    <form action="../../actions/reservations/reservations_basic_update.php" method="POST" class="form">
        <h1>Update Single Form</h1>
        <div >
            <label hidden for="">reservation_id</label>
            <input hidden type="number" name="reservation_id" value="<?php echo $reservation_id?>" readonly> 
        </div>
        <div >
            <label hidden for="">room_id</label>
            <input hidden type="number" name="room_id" value="<?php echo $reservation[0]["room_id"]?>">
        </div>
        <div >
            <label hidden for="" hidden>customer_id</label>
            <input hidden type="number" name="customer_id" value=<?php echo $reservation[0]["customer_id"]?>>
        </div>
        <div>
            <label for="">start_date</label>
            <input type="date" name="start_date" value=<?php echo $reservation[0]["start_date"]?>>
        </div>
        <div>
            <label for="">end_date</label>
            <input type="date" name="end_date" value=<?php echo $reservation[0]["end_date"]?>>   
        </div>
        <div>
            <label for="">number_guests</label>
            <input type="number" name="number_guests" value=<?php echo $reservation[0]["number_guests"]?>>
        </div>
        <div>
            <label hidden for="">Input status of reservation.</label>
            <input hidden type="text" name="reservation_status" value=<?php echo $reservation[0]["reservation_status"]?>>
        </div>
        <input type="submit" name="submit" value="submit">
    </form>
</main>

<?php
    mysqli_free_result($result);
    mysqli_close($conn);
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>