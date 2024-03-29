<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    
    //SQL query
    
    $sql_reservations = "SELECT * from 043_reservations WHERE customer_id = '$customer_id'";
    $sql_rooms = 'SELECT * from 043_rooms';
    $sql_comments = "SELECT reservation_id FROM 043_comments";

    $result1 = mysqli_query($conn, $sql_reservations);
    $result2 = mysqli_query($conn, $sql_rooms);
    $result4 = mysqli_query($conn, $sql_comments);

    $reservations = mysqli_fetch_all($result1, MYSQLI_ASSOC);
    $rooms = mysqli_fetch_all($result2, MYSQLI_ASSOC);
    $comments = mysqli_fetch_all($result4, MYSQLI_ASSOC);
    $disable = false;
    echo ("<table>
    <tr>
        <th>Room_Number</th>
        <th>Start_Date</th>
        <th>End_Date</th>
        <th>Number_Guests</th>
        <th>Reservation_Status</th>
        <th>Update</th>
        <th>Delete</th>
        <th>Commentary</th>
    </tr>");
    foreach($reservations as $reservation){
        foreach ($comments as $id) {
            
            if($reservation['reservation_status'] != 'CheckOut' || $reservation['reservation_id'] == $id['reservation_id']){
                
                $disable = true;
                break;
            }else{
                $disable = false;
            }
        }

        if($disable){
            echo (
                "<tr>
                    <td>" . $rooms[$reservation['room_id']-1]['hotel_number'] . "</td>       
                
                    <td>" . $reservation['start_date'] . "</td>     
                    <td>" . $reservation['end_date'] . "</td>     
                    <td>" . $reservation['number_guests'] . "</td>     
                    <td>" . $reservation['reservation_status'] . "</td>     
                    <td>
                        <form action='../../forms/reservations/update_user_reservation.php' method='POST'>
                            <input type='text' value='$reservation[reservation_id]' name=reservation_id hidden>
                            <input type='submit' name='submit' value='Update'>
                        </form>
                    </td> 
                    <td>
                        <form action='../../forms/reservations/delete_warning_reservation.php' method='POST'>
                            <input type='text' value='$reservation[reservation_id]' name=reservation_id hidden>
                            <input type='submit' name='submit' value='Cancel'>
                        </form>
                    </td>
                    <td>
                        <form action='../../forms/comment/comment_insert_form' method='POST'>
                            <input type='text' value='$reservation[reservation_id]' name=reservation_id hidden>
                            <input type='submit' name='submit' value='Comments' disabled = true>
                        </form>
                    </td>
                    
                </tr>"
            ); 
        }else{
            echo (
                "<tr>
                    <td>" . $rooms[$reservation['room_id']-1]['hotel_number'] . "</td>  
                    <td>" . $reservation['start_date'] . "</td>     
                    <td>" . $reservation['end_date'] . "</td>     
                    <td>" . $reservation['number_guests'] . "</td>     
                    <td>" . $reservation['reservation_status'] . "</td>     
                    <td>
                        <form action='../../forms/reservations/update_user_reservation.php' method='POST'>
                            <input type='text' value='$reservation[reservation_id]' name=reservation_id hidden>
                            <input type='submit' name='submit' value='Update'>
                        </form>
                    </td> 
                    <td>
                        <form action='../../forms/reservations/delete_warning_reservation.php' method='POST'>
                            <input type='text' value='$reservation[reservation_id]' name=reservation_id hidden>
                            <input type='submit' name='submit' value='Cancel'>
                        </form>
                    </td>
                    <td>
                        <form action='../../forms/comment/comment_insert_form' method='POST'>
                            <input type='text' value='$reservation[reservation_id]' name=reservation_id hidden>
                            <input type='submit' name='submit' value='Comments'>
                        </form>
                    </td>
                    
                </tr>"
            );
        }
        
    }
    
    
    mysqli_free_result($result1);
    mysqli_free_result($result2);
    
    //Disconnect Database
    mysqli_close($conn);
    
?>

<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>
