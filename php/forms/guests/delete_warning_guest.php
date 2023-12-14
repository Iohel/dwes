<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    if(isset($_POST['submit'])){
        $guest_id = $_POST['guest_id'];
    }
    $sql = "SELECT guest_name,guest_surname FROM 043_guests WHERE guest_id = $guest_id";

    $result = mysqli_query($conn, $sql);

    $guest = mysqli_fetch_all($result, MYSQLI_ASSOC);

    
?>

<form action="../../actions/guests/guests_basic_delete.php" method="POST">
    <p>The guest you have selected is about to be deleted do you want to do it?</p>
    <input type="text" name="guest_id" value=<?php echo $guest_id?> readonly>
    <input type="text" name="name" value=<?php echo $guest[0]["guest_name"]?> readonly>
    <input type="text" name="surname" value=<?php echo $guest[0]["guest_surname"]?> readonly>
    <input type="submit" name="submit" value="submit">
</form>
<?php
    mysqli_free_result($result);
    mysqli_close($conn);
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>