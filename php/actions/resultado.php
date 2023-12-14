
<?php require('./template/header.php');?>

<?php

    if(isset($_POST['submit'])){
        echo $_POST['entry_date'];
        echo $_POST['exit_date'];
        echo $_POST['guests'];
    }

?>

<?php require('./template/footer.php');?>
