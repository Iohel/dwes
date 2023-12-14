<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php

    //variable catching 
    $customer_start_date = $_POST['start_date'];
    $customer_end_date = $_POST['end_date'];
    $guest_number = $_POST['guests'];
    
    if($customer_id == ""){
        $user_loged_in="../forms/login_form.php"; 
    }else{
        $user_loged_in='./reservations/reservations_insert_reservation.php';
    }
    $sql = "SELECT DATEDIFF('$customer_end_date','$customer_start_date') as date";
    $result_date = mysqli_query($conn, $sql);
    $date = mysqli_fetch_all($result_date, MYSQLI_ASSOC);
    
    //SQL querys
    $sql = 'Select * from 043_reservations';
    $result_reservations= mysqli_query($conn, $sql);
    $reservations = mysqli_fetch_all($result_reservations, MYSQLI_ASSOC);
    
    $sql = "Select * from 043_rooms
    WHERE type_id >= '$guest_number' AND room_id NOT IN (Select room_id from 043_reservations
                            WHERE '$customer_start_date'< end_date
                            AND '$customer_end_date' > start_date)
                            ";
    $result_rooms= mysqli_query($conn, $sql);
    $rooms = mysqli_fetch_all($result_rooms, MYSQLI_ASSOC);

    $sql = 'Select * from 043_room_types';
    $result_types = mysqli_query($conn, $sql);
    $types = mysqli_fetch_all($result_types, MYSQLI_ASSOC);

    echo ("<table>
            <tr>
                <th>Room Number</th>
                <th>Room Type</th>
                <th>Price</th>
                <th>Book</th>
            </tr>");

    foreach($rooms as $room){
    $price = $types[$room['type_id']-1]['price_night_person'] * $date[0]['date']*$guest_number;
        echo (
            "<tr>
                <td>" . $room['hotel_number'] . "</td>
                <td>" . $types[$room['type_id']-1]['type_name'] . "</td>
                <td>" . $price ."</td>     
                <td><form action='$user_loged_in' method='post'>
                <input type='text' value=$room[room_id] name='room_id' hidden>
                <input type='text' value=$customer_id name='customer_id' hidden>
                <input type='text' value=$customer_start_date name='start_date' hidden>
                <input type='text' value=$customer_end_date name='end_date' hidden>
                <input type='text' value=$guest_number name='number_guests' hidden>
                <input type='text' value=$price name='price' hidden>
                <input type='submit' value='Book'>
                </form></td>     
                </tr>"
        );   
    }
    echo ("</table>");
    mysqli_free_result($result_reservations);
    mysqli_free_result($result_rooms);
    mysqli_free_result($result_types);
    
    //Disconnect Database
    mysqli_close($conn);

    
    //Html show for testing
    
?>

<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>


