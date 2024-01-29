<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>

<script>
    function showUser(){
        let weather = false;
       
        let http = new XMLHttpRequest();
        http.onreadystatechange = function(){
                
            if (this.readyState == 4 && this.status == 200) {
                if(weather !== true){
                    let response = this.responseText;
                    console.log(typeof response);
                    document.getElementById("output").innerHTML = response;
                    //Upload to project
                    weather = true
                    http.open("GET","./weather_action.php?response="+response,true);
                
                    http.send();
                }
            }
        }
        if(weather !== true){

            http.open("GET","http://dataservice.accuweather.com/currentconditions/v1/305540?apikey=oDJk7lSgfYUShTJlneknjMpG4MH2Eujm&language=es-es&details=true",true);
            
            http.send();
        }
            
    }
    
        
</script>
<form action="./weather_test.php">
    
    <input type="button" value="Click" onclick="showUser()">
</form>
<div id="output"></div>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>