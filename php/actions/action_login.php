<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    if(isset($_POST['submit'])){
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        
    }
    echo $_POST['password'];
    $sql = "SELECT * from 043_customers where username = '$username' AND `password` = '$password'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    $_SESSION['customer_id'] = $user[0]["customer_id"];
    $_SESSION['username'] = $user[0]["username"];
    $_SESSION['type'] = $user[0]["type"];
    $_SESSION['login'] = "Logout";
    $_SESSION['log_form'] = "index.php";

    header("Location: ../../index.php")
?>

<form action='../../index.php'>
    <input type="submit" value="index">
</form>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>