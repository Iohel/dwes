
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    
    //SQL query
    $reservation_id = $_POST['reservation_id'];
    $sql = 'SELECT * from 043_guests';

    $result = mysqli_query($conn, $sql);

    $guests = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo ("<table>
    <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>DOB</th>
        <th>DNI</th>
    </tr>");

    foreach($guests as $guest){
    echo (
        "<tr>
            <td>" . $guest['guest_name'] . "</td>
            <td>" . $guest['guest_surname'] . "</td>
            <td>" . $guest['guest_dob'] . "</td>
            <td>" . $guest['guest_nif'] . "</td>     
            <td>
                <form action='../insert_reservation_guest.php' method='POST'>
                    <input type='text' value='$guest[guest_id]' name=guest_id hidden>
                    <input type='text' value='$reservation_id' name=reservation_id hidden>
                    <input type='submit' name='submit' value='Assign'>
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

<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>
