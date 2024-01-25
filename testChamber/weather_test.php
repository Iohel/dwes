<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<script>
    function showUser(){
        /* let str = document.getElementById("fname").value;
         */
       
        let http = new XMLHttpRequest();
        http.onreadystatechange = function(){
                
            if (this.readyState == 4 && this.status == 200) {
                    
                let response = this.responseText;
                console.log(response);
                document.getElementById("output").innerHTML = response;
                //Upload to project
                
            }
        }
            
        http.open("GET","http://dataservice.accuweather.com/currentconditions/v1/305540?apikey=oDJk7lSgfYUShTJlneknjMpG4MH2Eujm&language=es-es&details=true",true);
            
        http.send();
            
    }
    
        
</script>
<form action="">
    
    <input type="button" value="Click" onclick="showUser()">
</form>
<div id="output"></div>

<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>