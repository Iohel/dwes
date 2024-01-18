<script>
    function showUser(str){
        /* let str = document.getElementById("fname").value;
         */
        if (str == "") {
            
            document.getElementById("output").innerHTML = "";
        } else {
            let http = new XMLHttpRequest();
            http.onreadystatechange = function(){
                
                if (this.readyState == 4 && this.status == 200) {
                    
                    document.getElementById("output").innerHTML = this.responseText;
                }
            }
            
            http.open("GET","./test_database.php?q="+str,true);
            
            http.send();
            
        }
    }
        
</script>
<form action="">
    <label for="fname">Write Here.</label>
    <input type="text" id="fname" name="fname" onkeyup="showUser(this.value)">
</form>
<div id="output"></div>

