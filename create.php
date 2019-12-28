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
    if($_POST['title_post']=="" ||  $_POST['post_text']=="" || $_POST['owner_post']==""){
        header('Location: create-post.php?is_valid=0');
    }else{
        $sql = ("INSERT INTO posts (title, body, author, created_at)
            VALUES ('".$_POST['title_post']."', '".$_POST['post_text']."', '".$_POST['owner_post'])."', now())";
                $statement = $connection->prepare($sql);
                $statement->execute();
                    header('Location: index.php');
    }
 ?>