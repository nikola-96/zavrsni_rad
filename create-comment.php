<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "blog";
    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
?>
<?php
if( $_POST['comment_owner']==="" ||  $_POST['comment_text']=="" || $_POST['id']==""){
 header('Location: single-post.php?id=' . $_POST['id'] . "&is_valid=0");
} else {
    $sql = ("INSERT INTO comments(author, text, post_id) VALUES ('".$_POST['comment_owner']."', '".$_POST['comment_text']."', '".$_POST['id'])."')";
    $statement = $connection->prepare($sql);
    $statement->execute();
        header('Location: single-post.php?id=' . $_POST['id']);
        }
    ?>
