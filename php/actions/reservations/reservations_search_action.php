<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    
    //SQL query
    $nameDni = $_POST["value"];

    $sql_reservations = "SELECT * from 043_reservations $nameDni";
    $sql_rooms = 'SELECT * from 043_rooms';
    $sql_customers = "SELECT * from 043_customers";

    $result1 = mysqli_query($conn, $sql_reservations);
    $result2 = mysqli_query($conn, $sql_rooms);
    $result3 = mysqli_query($conn, $sql_customers);

    $reservations = mysqli_fetch_all($result1, MYSQLI_ASSOC);
    $rooms = mysqli_fetch_all($result2, MYSQLI_ASSOC);
    $customers = mysqli_fetch_all($result3, MYSQLI_ASSOC);

    echo ("<table>
    <tr>
        <th>Room_Number</th>
        <th>Customer Name</th>
        <th>Customer DNI</th>
        <th>Start_Date</th>
        <th>End_Date</th>
        <th>Number_Guests</th>
        <th>Reservation_Status</th>
        <th>Update</th>
        <th>Delete</th>
        <th>Services</th>
        <th>Guests</th>
        <th>Check Out</th>
    </tr>");
    foreach($reservations as $reservation){
        foreach ($customers as $customer) {
            
            if ($customer["customer_id"]==$reservation['customer_id']) {
                $customer_name = $customer["customer_name"]; 
                $customer_dni = $customer["customer_dni"]; 
            }
        }
        
        echo (
        "<tr>
            <td>" . $rooms[$reservation['room_id']-1]['hotel_number'] . "</td>       
            <td>" . $customer_name . "</td>
            <td>" . $customer_dni . "</td>
            <td>" . $reservation['start_date'] . "</td>     
            <td>" . $reservation['end_date'] . "</td>     
            <td>" . $reservation['number_guests'] . "</td>     
            <td>" . $reservation['reservation_status'] . "</td>     
            <td>
                <form action='../../forms/reservations/update_existing_reservation.php' method='POST'>
                    <input type='text' value='$reservation[reservation_id]' name=reservation_id hidden>
                    <input type='submit' name='submit' value='Update'>
                </form>
            </td> 
            <td>
                <form action='../../forms/reservations/delete_warning_reservation.php' method='POST'>
                    <input type='text' value='$reservation[reservation_id]' name=reservation_id hidden>
                    <input type='submit' name='submit' value='Delete'>
                </form>
            </td>
            <td>
                <form action='../../actions/services/services_assign_select.php' method='POST'>
                    <input type='text' value='$reservation[reservation_id]' name=reservation_id hidden>
                    <input type='submit' name='submit' value='Services'>
                </form>
            </td>
            <td>
                <form action='../../forms/guests/guests_search_form.php' method='POST'>
                    <input type='text' value='$reservation[reservation_id]' name=reservation_id hidden>
                    <input type='submit' name='submit' value='Guests'>
                </form>
            </td>
            <td>
                <form action='../../actions/check_out.php' method='POST'>
                    <input type='text' value='$reservation[reservation_id]' name=reservation_id hidden>
                    <input type='submit' name='submit' value='Check_Out'>
                </form>
            </td>
            
        </tr>"
        );
    }

    mysqli_free_result($result1);
    mysqli_free_result($result2);
    mysqli_free_result($result3);
    
    //Disconnect Database
    mysqli_close($conn);
    
?>

<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>