<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    $guest_id = $_POST['guest_id'];
    
    $sql = "SELECT * FROM 043_guests WHERE guest_id = $guest_id";

    $result = mysqli_query($conn, $sql);

    $guests = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<form action="../../actions/guests/guests_basic_update.php" method="POST">
    <h1>Update Single Form</h1>
    
    <label for="">guest_id</label>
    <input type="number" name="guest_id" value="<?php echo $guest_id?>" readonly>
    
    <label for="">guest_name</label>
    <input type="text" name="guest_name" value=<?php echo $guests[0]["guest_name"]?>>
    
    <label for="">guest_surname</label>
    <input type="text" name="guest_surname" value=<?php echo $guests[0]["guest_surname"]?>>
    
    <label for="">guest_dob</label>
    <input type="date" name="guest_dob" value=<?php echo $guests[0]["guest_dob"]?>>
    
    <label for="">guest_nif</label>
    <input type="text" name="guest_nif" value= <?php echo $guests[0]["guest_nif"]?>>
    
    <input type="submit" name="submit" value="submit">
</form>
<?php
    mysqli_free_result($result);
    mysqli_close($conn);
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>
