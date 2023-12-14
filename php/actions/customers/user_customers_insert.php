<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>

<?php
    //variable catching 
    $customer_name = $_POST['name'];
    $customer_surname = $_POST['surname'];
    $customer_dni = $_POST['dni'];
    $customer_dob = $_POST['dob'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php 
    $sql = "INSERT INTO 043_customers(customer_name, customer_surname, customer_dob, customer_dni, email, username, `password`, `type`) 
        VALUES ('$customer_name','$customer_surname','$customer_dob','$customer_dni','$email','$username','$password', 'Customer');";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    
    /* $_POST['userrname'] = $username;
    $_POST['password'] = $password;
    $_POST['submit'] ='';
    header("Location: ../action_login.php"); */
    header("Location: ../../forms/login_form.php"); 
    
?>
    
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>


