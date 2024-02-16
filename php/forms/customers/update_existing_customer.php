<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    $customer_id = $_POST['customer_id'];
    
    $sql = "SELECT * FROM 043_customers WHERE customer_id = $customer_id";

    $result = mysqli_query($conn, $sql);

    $customers = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<form action="../../actions/customers/customers_basic_update.php" method="POST" class="form">
    <h1>Update Single Form</h1>
    
    <label for="">customer_id</label>
    <input type="number" name="customer_id" value="<?php echo $customer_id?>" readonly>
    
    <label for="">customer_name</label>
    <input type="text" name="customer_name" value=<?php echo $customers[0]["customer_name"]?>>
    
    <label for="">customer_surname</label>
    <input type="text" name="customer_surname" value=<?php echo $customers[0]["customer_surname"]?>>
    
    <label for="">customer_dob</label>
    <input type="date" name="customer_dob" value=<?php echo $customers[0]["customer_dob"]?>>
    
    <label for="">phone_number</label>
    <input type="number" name="phone_number" value= <?php echo $customers[0]["phone_number"]?>>
    
    <label for="">email</label>
    <input type="email" name="email" value= <?php echo $customers[0]["email"]?>>
    
    <label for="">credit_card</label>
    <input type="text" name="credit_card" value= <?php echo $customers[0]["credit_card"]?>>
    
    <label for="">username</label>
    <input type="text" name="username" value= <?php echo $customers[0]["username"]?>>
    
    <label for="">password</label>
    <input type="password" name="password" value= <?php echo $customers[0]["password"]?>>
    
    <label for="">type</label>
    <input type="text" name="type" value= <?php echo $customers[0]["type"]?>>
    
    <input type="submit" name="submit" value="submit">
</form>
<?php
    mysqli_free_result($result);
    mysqli_close($conn);
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>
