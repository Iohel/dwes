<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    $sql = "SELECT weather_json from 043_weather LIMIT 10";

    $result = mysqli_query($conn, $sql);

    $weathers = mysqli_fetch_all($result, MYSQLI_ASSOC);

    for ($i=sizeof($weathers)-1; $i > 0; $i--) { 
        $json = json_decode($weathers[$i]['weather_json'],true);
        $temperature = ($json[0]["Temperature"])["Metric"];
        $epoch = $json[0]["EpochTime"];
        $dt = new DateTime("@$epoch");  // convert UNIX timestamp to PHP DateTime
       
        echo($json[0]["WeatherText"]." || ".
             $temperature["Value"].
             $temperature["Unit"]." || ".
             $dt->format('Y-m-d H:i:s')
        );
        echo("<br/>");
    }
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>   