<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<form action="../../actions/reservations/reservations_basic_insert.php" method="POST"  class="row-cols-2">
    <h1>Insert Reservation Form</h1>
    <label for="number">room_id</label>
    <input type="number" name="room_id">
    <label for="customer">customer_id</label>
    <input type="text" name="customer_id">
    <label>Date In</label>
    <input type="date" name="start_date">
    <label>Number Nights</label>
    <input type="date" name="end_date">
    <label>Number Guests</label>
    <input type="number" name="number_guests">
    <input type="submit" name="submit" value="submit">
</form>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>