
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    
    //SQL query
    $reservation_id = $_POST['reservation_id'];
    $sql = 'SELECT * from 043_services';

    $result = mysqli_query($conn, $sql);

    $services = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo ("<form class='form' action='./services_assign_action.php' method='POST'>");
    
    foreach($services as $service){
        echo (
            "<div>".
            "<input type='text' value=".$service['service_id']."name='service_id' hidden=''>".
            "<input type='text' value='$reservation_id' name='reservation_id' hidden=''>".
            "<span>".$service['service_price']."</span>".
            "<span>".$service['service_name']."</span>".
            "<input type='checkbox' value=".$service['service_id']." name='extras[]' id=''>".
            "</div>"
        );   
    }
    echo ("<input type='submit' name='submit' value='Insert'>"."</form>");
    mysqli_free_result($result);
    
    //Disconnect Database
    mysqli_close($conn);
    
?>

<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>
