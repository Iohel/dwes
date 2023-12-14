<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php
    //variable catching 
    if(isset($_POST['submit'])){
        $customer_id = $_POST['customer_id'];
        $customer_name = $_POST['customer_name'];
        $customer_surname = $_POST['customer_surname'];
        $customer_dob = $_POST['customer_dob'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        $credit_card = $_POST['credit_card'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = $_POST['type'];
    }
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    
    $sql = "UPDATE 043_customers SET customer_name='$customer_name',customer_surname='$customer_surname',customer_dob='$customer_dob',phone_number='$phone_number',email='$email',credit_card='$credit_card',username='$username',password='$password' WHERE customer_id = $customer_id";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>

