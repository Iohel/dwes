<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/header.php');?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/connection.php');?>
<?php
    $sql = "SELECT * FROM 043_comments WHERE status = 0";
    $result = mysqli_query($conn, $sql);
    $comments = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo("<main>");
    foreach ($comments as $comment) {
        echo(
            
            "<form class='form' action='../../actions/comments_basic_edit.php'>".
                "<div>".
                "<span>".$comment['comment']."</span>".
                "<span>".$comment['score']."</span>".
                "<select name='' id=''>".
                    "<option value=''>Select an option</option>".
                    "<option value=''>Publish</option>".
                    "<option value=''>Ban</option>".
                "</select>".
                "<button type='submit'>Edit</button>".
                "</div>".
            "</form>"
            
        );
    }
    echo("</main>");
?>
<?php require($_SERVER['DOCUMENT_ROOT']. '/student043/dwes/php/template/footer.php');?>    