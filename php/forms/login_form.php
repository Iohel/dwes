<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<form action="../actions/action_login.php" method="POST"  class="row">
    <label for="">Username</label>
    <input type="username" name="username">
    <label for="">Password</label>
    <input type="password" name="password">
    <input type="submit" name="submit" value="submit">
</form>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>