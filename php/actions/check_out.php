<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    $reservation_id = $_POST['reservation_id'];
    
    $sql_reservations = "SELECT * from 043_reservations WHERE reservation_id = '$reservation_id'";
    $sql_guests = "SELECT COUNT(*) AS guests from 043_guest_reservation WHERE reservation_id = '$reservation_id'";
    
    $result1 = mysqli_query($conn, $sql_reservations);
    $result3 = mysqli_query($conn, $sql_guests);

    $reservations = mysqli_fetch_all($result1, MYSQLI_ASSOC);
    $guests = mysqli_fetch_all($result3,MYSQLI_ASSOC);

    $room_id = $reservations[0]['room_id'];
    $sql_rooms = "SELECT * from 043_rooms WHERE room_id = '$room_id'";
    $result4 = mysqli_query($conn, $sql_rooms);
    $rooms = mysqli_fetch_all($result4, MYSQLI_ASSOC);
    
    $type_id = $rooms[0]["type_id"];
    $sql_type = "SELECT * from 043_room_types WHERE type_id = '$type_id'";
    $result5 = mysqli_query($conn, $sql_type);
    $types = mysqli_fetch_all($result5, MYSQLI_ASSOC);
    
    $start_date = $reservations[0]['start_date'];
    $end_date = $reservations[0]['end_date'];
    $sql = "SELECT DATEDIFF('$end_date','$start_date') as date";
    $result_date = mysqli_query($conn, $sql);
    $dateArray = mysqli_fetch_all($result_date, MYSQLI_ASSOC);
    
    $price = 0;
    $string ="";
    $extras = json_decode($reservations[0]['extras_json'],true);
    if($extras != null){
        foreach ($extras as $extra) {
            $string = $string.$extra['Service_Name'].": ".$extra['Service_Price']."€<br/>";
            $price = $price + $extra['Service_Price'];
        }
    }
    
    
    $reservation_status = "CheckOut";
    $sql = "UPDATE 043_reservations SET reservation_status='$reservation_status' WHERE reservation_id=$reservation_id";
    mysqli_query($conn, $sql);

    $base = $types[0]['price_night_person'];
    $date = $dateArray[0]['date'];
    $person = $guests[0]['guests']+1;
    
    $room = $base*$date*$person;
    
    echo("<h2>Habitacion</h2>");
    echo("<h5>Room Base Price: ".$base."€</h5>");
    echo("<h5>Number of Days: ".$date."</h5>");
    echo("<h5>Amount of Customers: ".$person."</h5>");
    echo("<h5>Room Total: ".$room."€</h5>");
    echo("<h2>Extras</h2>");
    echo("<h5>$string</h5>");
    echo("<h5>Extra Total: ".$price."€</h5>");
    echo("<h1>Total</h1>");
    $total = $price+($base*$date*$person);
    echo("<h2>".$total."€</h2>")
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>
