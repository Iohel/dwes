<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    session_start(); 
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
    $_SESSION['status'] = "Logout";
    $_SESSION['log_form'] = "index.php";

    header("Location: /student043/dwes/");
    
?>

<form action='../../index.php'>
    <input type="submit" value="index">
</form>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>