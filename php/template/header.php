<?php 
    session_start(); 
    if(isset($_POST['logout'])){
        session_unset();
        session_destroy();
       
    }
    
    $username = $_SESSION['username'] ?? 'Guest';
    $login = $_SESSION['login'] ?? 'login';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  

</head>
<body>
    <header class="navbar">
        <div class="dropdown">
            <a class="col btn" href='/student043/dwes/index.php'>Home</a>
            <div class="btn-group">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" <?php if($type == 'Guest'){echo 'hidden';}if($type == 'Customer'){echo 'hidden';}?>>
                    Rooms
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href='/student043/dwes/php/actions/rooms/rooms_basic_select.php'>Rooms Select</a></li>
                    <li><a class="dropdown-item" href='/student043/dwes/php/forms/rooms/insert_new_room.php'>Rooms Insert</a></li>
                    <li><a class="dropdown-item" href='/student043/dwes/php/forms/rooms/select_single_room_update.php'>Rooms Update</a></li>
                    <li <?php if($type == 'Admin'){echo 'hidden';}?>><a class="dropdown-item" href='/student043/dwes/php/forms/rooms/select_single_room_delete.php'>Rooms Delete</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" <?php if($type == 'Guest'){echo 'hidden';}?>>
                    Customer
                </button>
                <ul class="dropdown-menu">
                    <li <?php if($type == 'Customer'){echo 'hidden';}?>><a class="dropdown-item" href='/student043/dwes/php/actions/customers/customers_basic_select.php'>Customer Select</a></li>
                    <li <?php if($type == 'Customer'){echo 'hidden';}?>><a class="dropdown-item" href='/student043/dwes/php/forms/customers/customer_search_form.php'>Search Customer</a></li>
                    <li <?php if($type == 'Customer'){echo 'hidden';}?>><a class="dropdown-item" href='/student043/dwes/php/forms/customers/insert_single_customer.php'>Customer Insert</a></li>
                    <li <?php if($type == 'Customer'){echo 'hidden';}?>><a class="dropdown-item" href='/student043/dwes/php/forms/customers/select_single_customer_update.php'>Customer Update</a></li>
                    <li><a class="dropdown-item" href='/student043/dwes/php/forms/customers/update_logged_customer.php'>Update Profile</a></li>
                    <li <?php if($type == 'Admin'){echo 'hidden';}?>><a class="dropdown-item" href='/student043/dwes/php/forms/customers/select_single_customer_delete.php'>Customer Delete</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" <?php if($type == 'Guest'){echo 'hidden';}?>>
                    Reservation
                </button>
                <ul class="dropdown-menu">
                    <li <?php if($type == 'Customer'){echo 'hidden';}?>><a class="dropdown-item" href='/student043/dwes/php/actions/reservations/reservations_basic_select.php'>Reservation Select</a></li>
                    <li><a class="dropdown-item" href='/student043/dwes/php/actions/reservations/reservations_select_from_customer.php'>Reservation Customer Select</a></li>
                    <li <?php if($type == 'Customer'){echo 'hidden';}?>><a class="dropdown-item" href='/student043/dwes/php/forms/reservations/insert_new_reservation.php'>Reservation Insert</a></li>
                    <li><a class="dropdown-item" href='/student043/dwes/php/forms/reservations/select_single_reservation_update.php'>Reservation Update</a></li>
                    <li <?php if($type == 'Admin'){echo 'hidden';}?>><a class="dropdown-item" href='/student043/dwes/php/forms/reservations/select_single_reservation_delete.php'>Reservation Delete</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" <?php if($type == 'Guest'){echo 'hidden';}?>>
                    Services
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href='/student043/dwes/php/actions/services/services_basic_select.php'>Service Select</a></li>
                    <li><a class="dropdown-item" href='/student043/dwes/php/forms/services/insert_new_service.php'>Service Insert</a></li>
                    <li><a class="dropdown-item" href='/student043/dwes/php/forms/services/select_single_service_update.php'>Service Update</a></li>
                    <li><a class="dropdown-item" href='/student043/dwes/php/forms/services/select_single_service_delete.php'>Service Delete</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" <?php if($type == 'Guest'){echo 'hidden';}?>>
                    Guests
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href='/student043/dwes/php/actions/guests/guests_basic_select.php'>Guest Select</a></li>
                    <li><a class="dropdown-item" href='/student043/dwes/php/forms/guests/insert_single_guest.php'>Guest Insert</a></li>
                    <li><a class="dropdown-item" href='/student043/dwes/php/forms/guests/select_single_guest_update.php'>Guest Update</a></li>
                    <li><a class="dropdown-item" href='/student043/dwes/php/forms/guests/select_single_guest_delete.php'>Guest Delete</a></li>
                </ul>
            </div>
            <div class="btn-group">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" >
                    INFO
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href='/student043/dwes/php/actions/comments/comment_basic_select.php'>Weather</a></li>
                    <li><a class="dropdown-item" href='/student043/dwes/php/actions/comments/comment_basic_select.php'>Comments</a></li>
                </ul>
            </div>
            
        </div>
        <p><?php echo($username)?></p>
        <p><?php echo($type)?></p>
        <form action='/student043/dwes/php/forms/customers/register_insert_customer.php'>
            <input type="submit" name="register" value="register" <?php if($login == 'Logout'){echo '#hidden';}?>>
        </form>
        <form action=<?php echo($form)?> method="post">
            <input type="submit" name="logout" value="<?php echo $login;?>">
        </form>
    </header>