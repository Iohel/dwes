<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<script>
    function showUser(str){
        /* let str = document.getElementById("fname").value;
         */
        document.getElementById("output").innerHTML = "";
            
            
        
        let http = new XMLHttpRequest();
        http.onreadystatechange = function(){
                
            if (this.readyState == 4 && this.status == 200) {
                    
                document.getElementById("output").innerHTML = this.responseText;
                console.log("test");
            }
        }
            
        http.open("POST","../../actions/reservations/reservations_search_action.php",true);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.send("value="+str);
            
        
    }
</script>
<form action="" onload="showUser('Booked')">
    
    <select name="" id="" onchange="showUser(this.value)">
        <option value="">Select a status</option>
        <option value="">All</option>
        <option value="WHERE reservation_status = 'Booked'">Booked</option>
        <option value="WHERE reservation_status = 'CheckIn'">CheckIn</option>
        <option value="WHERE reservation_status = 'CheckOut'">CheckOut</option>
    </select>
</form>
<div id="output"></div>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>
