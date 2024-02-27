<?php 
    session_start(); 
    if(isset($_POST['logout'])){
        session_unset();
        session_destroy();
       
    }
    if (isset($_POST['start_date'])) {
        setcookie("start_date",$_POST['start_date'],time() + 86400);
        setcookie("end_date",$_POST['end_date'],time() + 86400);
    }
    $username = $_SESSION['username'] ?? 'Guest';
    $login = $_SESSION['status'] ?? 'Login';
    $form = $_SESSION['log_form'] ?? '/student043/dwes/php/forms/login_form.php';
    $type = $_SESSION['type'] ?? 'Guest';
    $customer_id = $_SESSION['customer_id'] ?? '';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placeholder Hotel</title>
    <link rel="stylesheet" href="/student043/dwes/css/header.css">
    <link rel="stylesheet" href="/student043/dwes/css/form.css">
</head>
<body>
    <header class="navbar">
        <div class="dropdown">
            <button class="dropbtn" type="button">
                <a class="" href='/student043/dwes/index.php'>Home</a>
            </button>
        </div>
            
        <div class="dropdown">
            <button class="dropbtn" type="button" data-bs-toggle="dropdown" aria-expanded="false" <?php if($type == 'Guest'){echo 'hidden';}if($type == 'Customer'){echo 'hidden';}?>>
                Rooms
            </button>
            <div class="dropdown-content">
                <li><a class="dropdown-item" href='/student043/dwes/php/actions/rooms/rooms_basic_select.php'>Rooms Select</a></li>
                <li><a class="dropdown-item" href='/student043/dwes/php/forms/rooms/insert_new_room.php'>Rooms Insert</a></li>
                <li><a class="dropdown-item" href='/student043/dwes/php/forms/rooms/select_single_room_update.php'>Rooms Update</a></li>
                <li <?php if($type == 'Admin'){echo 'hidden';}?>><a class="dropdown-item" href='/student043/dwes/php/forms/rooms/select_single_room_delete.php'>Rooms Delete</a></li>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn" type="button" data-bs-toggle="dropdown" aria-expanded="false" <?php if($type == 'Guest'){echo 'hidden';}?>>
                Customer
            </button>
            <div class="dropdown-content">
                <li <?php if($type == 'Customer'){echo 'hidden';}?>><a class="dropdown-item" href='/student043/dwes/php/actions/customers/customers_basic_select.php'>Customer Select</a></li>
                <li <?php if($type == 'Customer'){echo 'hidden';}?>><a class="dropdown-item" href='/student043/dwes/php/forms/customers/customer_search_form.php'>Search Customer</a></li>
                <li <?php if($type == 'Customer'){echo 'hidden';}?>><a class="dropdown-item" href='/student043/dwes/php/forms/customers/insert_single_customer.php'>Customer Insert</a></li>
                <li <?php if($type == 'Customer'){echo 'hidden';}?>><a class="dropdown-item" href='/student043/dwes/php/forms/customers/select_single_customer_update.php'>Customer Update</a></li>
                <li><a class="dropdown-item" href='/student043/dwes/php/forms/customers/update_logged_customer.php'>Update Profile</a></li>
                <li <?php if($type == 'Admin'){echo 'hidden';}?>><a class="dropdown-item" href='/student043/dwes/php/forms/customers/select_single_customer_delete.php'>Customer Delete</a></li>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn" type="button" data-bs-toggle="dropdown" aria-expanded="false" <?php if($type == 'Guest'){echo 'hidden';}?>>
                Reservation
            </button>
            <div class="dropdown-content">
                <li <?php if($type == 'Customer'){echo 'hidden';}?>><a class="dropdown-item" href='/student043/dwes/php/actions/reservations/reservations_basic_select.php'>Reservation Select</a></li>
                <li><a class="dropdown-item" href='/student043/dwes/php/actions/reservations/reservations_select_from_customer.php'>Reservation Customer Select</a></li>
                <li <?php if($type == 'Customer'){echo 'hidden';}?>><a class="dropdown-item" href='/student043/dwes/php/forms/reservations/insert_new_reservation.php'>Reservation Insert</a></li>
                <li><a class="dropdown-item" href='/student043/dwes/php/forms/reservations/select_single_reservation_update.php'>Reservation Update</a></li>
                <li <?php if($type == 'Admin'){echo 'hidden';}?>><a class="dropdown-item" href='/student043/dwes/php/forms/reservations/select_single_reservation_delete.php'>Reservation Delete</a></li>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn" type="button" data-bs-toggle="dropdown" aria-expanded="false" <?php if($type == 'Guest'){echo 'hidden';}?>>
                Services
            </button>
            <div class="dropdown-content">
                <li><a class="dropdown-item" href='/student043/dwes/php/actions/services/services_basic_select.php'>Service Select</a></li>
                <li><a class="dropdown-item" href='/student043/dwes/php/forms/services/insert_new_service.php'>Service Insert</a></li>
                <li><a class="dropdown-item" href='/student043/dwes/php/forms/services/select_single_service_update.php'>Service Update</a></li>
                <li><a class="dropdown-item" href='/student043/dwes/php/forms/services/select_single_service_delete.php'>Service Delete</a></li>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn" type="button" data-bs-toggle="dropdown" aria-expanded="false" <?php if($type == 'Guest'){echo 'hidden';}?>>
                Guests
            </button>
            <div class="dropdown-content">
                <li><a class="dropdown-item" href='/student043/dwes/php/actions/guests/guests_basic_select.php'>Guest Select</a></li>
                <li><a class="dropdown-item" href='/student043/dwes/php/forms/guests/insert_single_guest.php'>Guest Insert</a></li>
                <li><a class="dropdown-item" href='/student043/dwes/php/forms/guests/select_single_guest_update.php'>Guest Update</a></li>
                <li><a class="dropdown-item" href='/student043/dwes/php/forms/guests/select_single_guest_delete.php'>Guest Delete</a></li>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn" type="button" data-bs-toggle="dropdown" aria-expanded="false" >
                INFO
            </button>
            <div class="dropdown-content">
                <li><a class="dropdown-item" href='/student043/dwes/weather/weather_select_output.php'>Weather</a></li>
                <li><a class="dropdown-item" href='/student043/dwes/php/actions/comments/comment_basic_select.php'>Comments</a></li>
            </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn"><?php echo($username)?></button>
        </div>        
        <div class="dropdown">
            <button class="dropbtn"><?php echo($type)?></button>
        </div>
        <form class="dropdown" action='/student043/dwes/php/forms/customers/register_insert_customer.php'>
            
            <button class="dropbtn" type="submit" name="register" value="" <?php if($login == 'Logout'){echo 'hidden';}?>>Register</button>
        </form>
        <form class="dropdown" action=<?php echo($form)?> method="post">
            <button class="dropbtn" type="submit" name="logout" value=""><?php echo $login;?></button>
        </form>
    </header>