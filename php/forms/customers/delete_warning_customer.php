<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    if(isset($_POST['submit'])){
        $customer_id = $_POST['customer_id'];
    }
    $sql = "SELECT customer_name,customer_surname FROM 043_customers WHERE customer_id = $customer_id";

    $result = mysqli_query($conn, $sql);

    $customer = mysqli_fetch_all($result, MYSQLI_ASSOC);

    
?>

<form action="../../actions/customers/customers_basic_delete.php" method="POST">
    <p>The customer you have selected is about to be deleted do you want to do it?</p>
    <input type="text" name="customer_id" value=<?php echo $customer_id?> readonly>
    <input type="text" name="name" value=<?php echo $customer[0]["customer_name"]?> readonly>
    <input type="text" name="surname" value=<?php echo $customer[0]["customer_surname"]?> readonly>
    <input type="submit" name="submit" value="submit">
</form>
<?php
    mysqli_free_result($result);
    mysqli_close($conn);
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>