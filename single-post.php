 
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

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 <link href="styles/blog.css" rel="stylesheet">


<?php include "header.php"; ?>

<?php
    if (isset($_GET['id'])) {

    // pripremamo upit
    $sql = "SELECT id, title, body, author, DATE_FORMAT(created_at, '%e %b %Y') AS fmt_created_at FROM posts WHERE id = {$_GET['id']}";
    $statement = $connection->prepare($sql);

    // izvrsavamo upit
    $statement->execute();

    // zelimo da se rezultat vrati kao asocijativni niz.
    // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
    $statement->setFetchMode(PDO::FETCH_ASSOC);

    // punimo promenjivu sa rezultatom upita
    $singlePost = $statement->fetch();

    }
?>
<main role="main" class="container">

<div class="row">
        <div class="col-sm-8 blog-main">


        <div class="blog-post">
                    <h2 class="blog-post-title"><?php echo $singlePost['title']; ?></h2>
                    
                    <p class="blog-post-meta"><?php echo $singlePost['fmt_created_at']; ?> by <a href="#"><?php echo $singlePost['author']?></a></p>

                    <p><?php echo $singlePost['body']; ?></p>
        </div><!-- /.blog-post -->

    <?php include "comments.php"; ?>
        </div>
<?php include "sidebar.php"; ?>
</div>
</main>
<?php include "footer.php"; ?>
