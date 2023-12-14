
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    
    //SQL query
    $reservation_id = $_POST['reservation_id'];
    $sql = 'SELECT * from 043_services';

    $result = mysqli_query($conn, $sql);

    $services = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo ("<table>
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Insert</th>
    </tr>");

    foreach($services as $service){
    echo (
        "<tr>
            <td>" . $service['service_name'] . "</td>
            <td>" . $service['service_price'] . "</td>   
            <td>
                <form action='../../actions/insert_reservation_service.php' method='POST'>
                    <input type='text' value='$service[service_id]' name=service_id hidden>
                    <input type='text' value='$reservation_id' name=reservation_id hidden>
                    <input type='submit' name='submit' value='Insert'>
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
