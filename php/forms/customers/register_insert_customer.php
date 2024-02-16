<link rel="stylesheet" href="/student043/dwes/css/form.css">
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    $name="";
    $surname="";
    $dni="";
    $email="";
    $username="";
    $password="";
    $date="";
    
    $errors = array('name'=>'', 'surname'=>'', 'dni'=>'', 'email'=>'', 'username'=>'', 'password'=>'');
    $invalid = false;
    if (isset($_POST["submit"])) {
        
        if (empty($_POST["name"])) {
            $errors["name"]="Input a name.";
            $invalid = true;
        }else {
            $name = $_POST["name"];
            if (!preg_match("/^[a-zA-Z]{0,20}$/",$name)) {
                $errors["name"]="Name not valid.";
                $invalid = true;
            }
        }

        if (empty($_POST["surname"])) {
            $errors["surname"]="Input a surname.";
            $invalid = true;
        }else {
            $surname = $_POST["surname"];
            if (!preg_match("/^[a-zA-Z]{0,20}$/",$surname)) {
                echo("error");
                $errors["surname"]="Surname not valid.";
                $invalid = true;
            }
        }

        if (empty($_POST["dni"])) {
            $errors["dni"]="Input a dni.";
            $invalid = true;
        }else {
            $dni = $_POST["dni"];
            if (!preg_match("/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/",$dni)) {
                $errors["dni"]="Dni not valid.";
                $invalid = true;
            }
        }

        if (empty($_POST["email"])) {
            $errors["email"]="Input an email.";
            $invalid = true;
        }else {
            $email = $_POST["email"];
            if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                $errors["email"]="Email not valid.";
                $invalid = true;
            }
        }

        if (empty($_POST["username"])) {
            $errors["username"]="Input a username.";
            $invalid = true;
        }else {
            $username = $_POST["username"];
            if (!preg_match("/^[a-zA-Z0-9_-]{3,15}$/",$username)) {
                $errors["username"]="Username not valid, minimum of 3 and max of 5.";
                $invalid = true;
            }
        }

        if (empty($_POST["password"])) {
            $errors["password"]="Input a password.";
            $invalid = true;
        }else {
            $password = $_POST["password"];
            if (!preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-_]).{8,}$/',$password)) {
                $errors["password"]="Invalid password. Minimum eight characters,one uppercase and one lowercase, a special characther and a number.";
                $invalid = true;
            }
        }
        $date = $_POST["dob"];
        
        if(!$invalid){
            
            $sql = "INSERT INTO 043_customers(customer_name, customer_surname, customer_dob, customer_dni, email, username, `password`, `type`) 
                VALUES ('$name','$surname','$date','$dni','$email','$username','$password', 'Customer');";
            mysqli_query($conn, $sql);
            mysqli_close($conn);
                
            header("Location: /student043/dwes/php/forms/login_form.php"); 
 
        }

    }
?>

<main>
    <form action="" method="POST"  class="form">
        <h1>Register New</h1>
        <div>
            <label>Customer Name</label>
            <p><?php echo($errors["name"])?></p>
            <input type="text" name="name" value="<?php echo($name)?>"> 
        </div>
        <div>
            <label>Customer Surname</label>
            <p><?php echo($errors["surname"])?></p>
            <input type="text" name="surname" value="<?php echo($surname)?>">
        </div>
        <div>
            <label>Customer DNI</label>
            <p><?php echo($errors["dni"])?></p>
            <input type="text" name="dni" value="<?php echo($dni)?>">
        </div>
        <div>
            <label>Customer Birthday</label>
            <input type="date" name="dob" value="<?php echo($date)?>">
        </div>
        <div>
            <label>Customer Email</label>
            <p><?php echo($errors["email"])?></p>
            <input type="text" name="email" value="<?php echo($email)?>">
        </div>
        <div>
            <label>Customer Username</label>
            <p><?php echo($errors["username"])?></p>
            <input type="text" name="username" value="<?php echo($username)?>">
        </div>
        <div>
            <label>Customer Password</label>
            <p><?php echo($errors["password"])?></p>
            <input type="password" name="password" value="<?php echo($password)?>">
        </div>
    
        <input type="submit" name="submit" value="submit">
    </form>
</main>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>