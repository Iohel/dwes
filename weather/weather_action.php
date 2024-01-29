<?php

    $output = $_GET['response'];

    if(true){
        /* $output = json_encode($output); */
        $file = "weather.json";
        $handle = fopen($file, 'w+');
        fwrite($handle,$output);
        fclose($handle);
    }

?>