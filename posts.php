<?php include "header.php"; ?>


<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "blog";
    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }

?>

    
<?php

        // pripremamo upit
        $sql = "SELECT id, title, body, author, DATE_FORMAT(created_at, '%e %b %Y') AS fmt_created_at FROM posts ORDER BY created_at DESC";
        $statement = $connection->prepare($sql);

        // izvrsavamo upit
        $statement->execute();

        // zelimo da se rezultat vrati kao asocijativni niz.
        $statement->setFetchMode(PDO::FETCH_ASSOC);

        // punimo promenjivu sa rezultatom upita
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
        <p class="blog-post-meta"><?php echo($post['fmt_created_at']) ?> <a href="#"><?php echo($post['author']) ?></a></p>

        <p><?php echo($post['body']) ?></p>
    </div><!-- /.blog-post -->
<?php 
    }
    ?>
        </div>
        <?php include "sidebar.php"; ?>

    </div>
</main>
            <?php include "footer.php"; ?>

    <!-- <div class="blog-post">
        <h2 class="blog-post-title">New feature</h2>
        <p class="blog-post-meta">December 14, 2013 by <a href="#">Chris</a></p>

        <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <ul>
            <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
            <li>Donec id elit non mi porta gravida at eget metus.</li>
            <li>Nulla vitae elit libero, a pharetra augue.</li>
        </ul>
        <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
        <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
    </div>/.blog-post -->
