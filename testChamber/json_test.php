<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>

<?php
    $checkbox[]=$_Post['checkbox'];
    print_r($checkbox);
    $reservation_id = $_POST['reservation_id'] ?? 10;
    $service_id = $_POST['service_id'] ?? 4; 

    $sql = "SELECT * from 043_reservations WHERE reservation_id = $reservation_id";
    $result = mysqli_query($conn, $sql);
    $reservations = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $sql = "SELECT * from 043_services WHERE service_id = $service_id";
    $result = mysqli_query($conn,$sql);
    $services = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $json = $reservations[0]['extras_json'];
    $name = $services[0]['service_name'];
    $price = $services[0]['service_price'];
    $decoded_json = json_decode($json,true);
    $data = array("Service_Name"=>$name,"Service_Price"=>$price);
    if($decoded_json == null){
        $decoded_json = [$data];
    }else{
        array_push($decoded_json,$data);
    }
    
    
    //jsonappenarray
    /* echo($name);
    echo($price); */
    $json = json_encode($decoded_json);
    echo($json);
    $sql = "UPDATE 043_reservations SET extras_json = '$json' WHERE reservation_id = $reservation_id";
    $result = mysqli_query($conn, $sql);
    

?>

<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>
