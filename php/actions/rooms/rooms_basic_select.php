<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    
    //SQL query

    $sql_rooms = 'SELECT * from 043_rooms';
    $sql_type = 'SELECT * from 043_room_types';

    $result1 = mysqli_query($conn, $sql_rooms);
    $result2 = mysqli_query($conn, $sql_type);

    $rooms = mysqli_fetch_all($result1, MYSQLI_ASSOC);
    $types = mysqli_fetch_all($result2, MYSQLI_ASSOC);

    echo ("<table>
    <tr>
        <th>Room Number</th>
        <th>Type</th>
        <th>Status</th>
        <th>State</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>");
    foreach($rooms as $room){
        
        echo (
        "<tr>
            <td>" . $room['hotel_number'] . "</td>       
            <td>" . $types[$room['type_id']-1]['type_name'] . "</td>
            <td>" . $room['status'] . "</td>     
            <td>" . $room['state'] . "</td>         
            <td>
                <form action='../../forms/rooms/update_existing_room.php' method='POST'>
                    <input type='text' value=$room[room_id] name=room_id hidden>
                    <input type='submit' name='submit' value='Update'>
                </form>
            </td> 
            <td>
                <form action='../../forms/rooms//delete_warning_room.php' method='POST'>
                    <input type='text' value='$room[room_id]' name=room_id hidden>
                    <input type='submit' name='submit' value='Delete'>
                </form>
            </td>
            
        </tr>"
        );
    }
    

    mysqli_free_result($result1);
    mysqli_free_result($result2);
    
    //Disconnect Database
    mysqli_close($conn);
    
?>

<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>
