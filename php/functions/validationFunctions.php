<?php 
    function validateInput($string){
        return htmlspecialchars($string,ENT_HTML5,"UTF-8");
    }
?>