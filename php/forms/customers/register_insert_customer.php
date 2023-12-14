<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<form action="../../actions/customers/user_customers_insert.php" method="POST"  class="row-cols-2">
    <h1>Register New</h1>
    <label>Customer Name</label>
    <input type="text" name="name">
    <label>Customer Surname</label>
    <input type="text" name="surname">
    <label>Customer DNI</label>
    <input type="text" name="dni">
    <label>Customer Birthday</label>
    <input type="date" name="dob">
    <label>Customer Email</label>
    <input type="text" name="email">
    <label>Customer Username</label>
    <input type="text" name="username">
    <label>Customer Password</label>
    <input type="password" name="password">
    <input type="submit" name="submit" value="submit">
</form>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>