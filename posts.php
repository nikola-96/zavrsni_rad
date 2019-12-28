<?php include "header.php"; ?>
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
        $sql = "SELECT id, title, LEFT(body, 150) AS fmt_body, author, DATE_FORMAT(created_at, '%e %b %Y') AS fmt_created_at FROM posts ORDER BY created_at DESC";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $posts = $statement->fetchAll();
    ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<link href="styles/blog.css" rel="stylesheet">

<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
            <?php
                foreach ($posts as $post) {
            ?>
                <div class="blog-post">

                    <h2 class="blog-post-title"><?php echo($post['title']) ?></h2>
                    <p class="blog-post-meta"><?php echo($post['fmt_created_at']) ?> <?php echo($post['author']) ?></a></p>
                    <p><?php echo($post['fmt_body'])."..." ?></p>
                </div><!-- /.blog-post -->
            <?php 
                }
                ?>
        </div>
        <?php include "sidebar.php"; ?>
    </div>
</main>
            <?php include "footer.php"; ?>
