<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php

    $output = $_GET['response'];
    
    
        
    $file = "weather.json";
    $handle = fopen($file, 'w+');
    fwrite($handle,$output);
    fclose($handle);

    $sql = "INSERT INTO 043_weather(weather_json,weather_timestamp) VALUES ('$output',NOW())";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    echo("weather updated correctly");
    

    

?>