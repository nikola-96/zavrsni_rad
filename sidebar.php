
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
$sql = "SELECT id, title FROM posts ORDER BY created_at DESC LIMIT 5";
$statement = $connection->prepare($sql);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);
$post_title = $statement->fetchAll();
?>

<aside class="col-sm-3 ml-sm-auto blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>Latest posts</h4>
                <?php
                    foreach ($post_title as $post_title_sing) {
                ?>
                <ol class="list-unstyled">
                    <li><a href="single-post.php?id=<?php echo($post_title_sing['id']) ?>"><?php echo $post_title_sing['title']; ?></a></li>
                </ol>
                <?php
                    }
                ?>
            </div>
            <div class="sidebar-module">
                <ol class="list-unstyled">
                    <li><a href="https://github.com">GitHub</a></li>
                    <li><a href="https://twitter.com">Twitter</a></li>
                    <li><a href="https://www.facebook.com">Facebook</a></li>
                </ol>
            </div>
</aside>