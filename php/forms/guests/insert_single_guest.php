<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<form action="../../actions/guests/guests_basic_insert.php" method="POST"  class="row-cols-2">
    <h1>Insert guest Form</h1>
    <label>Name</label>
    <input type="text" name="name">
    <label>Surname</label>
    <input type="text" name="surname">
    <label>Birthday</label>
    <input type="date" name="dob">
    <label>DNI</label>
    <input type="text" name="nif">
    <input type="submit" name="submit" value="submit">
</form>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>