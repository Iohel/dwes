<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php

    $sql = "SELECT * from 043_comments WHERE status=1";

    $result = mysqli_query($conn, $sql);

    $comments = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach ($comments as $comment) {
        echo(
            "<div>".
                "<span>".$comment['comment']."</span>    ".
                "<h1>".$comment['score']."</h1>".
            "</div>"
        );
    }

?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>     