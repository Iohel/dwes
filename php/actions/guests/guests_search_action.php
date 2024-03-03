
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    
    //SQL query
    $value = $_POST['value'];
    $reservation_id = $_POST['reservation_id'] ?? $_COOKIE['reservation_id'];
    print_r($reservation_id);
    $sql = "SELECT * from 043_guests WHERE guest_name LIKE '$value%'";

    $result = mysqli_query($conn, $sql);

    $guests = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo ("<table>
    <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>DNI</th>
    </tr>");

    foreach($guests as $guest){
    echo (
        "<tr>
            <td>" . $guest['guest_name'] . "</td>
            <td>" . $guest['guest_surname'] . "</td>
            <td>" . $guest['guest_nif'] . "</td>     
            <td>
                <form action='../../actions/guests/insert_reservation_guest.php' method='POST'>
                    <input type='text' value='$guest[guest_id]' name=guest_id hidden>
                    <input type='text' value='$reservation_id' name=reservation_id hidden>
                    <input type='submit' name='submit' value='Assign'>
                </form>
            </td> 
            <td>
                <form action='../../forms/guests/update_existing_guest.php' method='POST'>

                    <input type='text' value='$guest[guest_id]' name=guest_id hidden>
                    <input type='text' value='assign' name=assign hidden>
                    <input type='text' value='$reservation_id' name=reservation_id hidden>
                    <input type='submit' name='submit' value='Update'>
                </form>
            </td> 
            
            
        </tr>"
    );   
    }
    echo ("</table>");
    mysqli_free_result($result);
    
    //Disconnect Database
    mysqli_close($conn);
    
?>

