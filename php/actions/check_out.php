<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    $reservation_id = $_POST['reservation_id'];
    
    $sql_reservations = "SELECT * from 043_reservations WHERE reservation_id = '$reservation_id'";
    $sql_extras = "SELECT * from 043_services_reservation WHERE reservation_id = '$reservation_id'";
    $sql_guests = "SELECT COUNT(*) AS guests from 043_guest_reservation WHERE reservation_id = '$reservation_id'";
    
    $result1 = mysqli_query($conn, $sql_reservations);
    $result2 = mysqli_query($conn, $sql_extras);
    $result3 = mysqli_query($conn, $sql_guests);

    $reservations = mysqli_fetch_all($result1, MYSQLI_ASSOC);
    $extras = mysqli_fetch_all($result2, MYSQLI_ASSOC);
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
    $sql_services = "SELECT * FROM 043_services";
    $result6 = mysqli_query($conn, $sql_services);
    $services = mysqli_fetch_all($result6,MYSQLI_ASSOC);
    foreach ($extras as $extra) {
        foreach ($services as $service) {
            if($service['service_id']==$extra['service_id']){
                $price = $price + $service['service_price'];
            }
        }
    }
    
    $base = $types[0]['price_night_person'];
    $date = $dateArray[0]['date'];
    $person = $guests[0]['guests']+1;
    
    $room = $base*$date*$person;
    echo("<div>Habitacion</div>");
    echo("<div>$room</div>");
    echo("<div>Extras</div>");
    echo("<div>$price</div>");
    echo("<div>Total</div>");
    $total = $price+($base*$date*$person);
    echo("<div>$total</div>")
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>
