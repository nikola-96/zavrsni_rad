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
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 <link href="styles/blog.css" rel="stylesheet">

<?php include "header.php"; ?>

<?php
    if (isset($_REQUEST['id'])) {
    $sql = "SELECT id, title, body, author, DATE_FORMAT(created_at, '%e %b %Y') AS fmt_created_at FROM posts WHERE id = {$_REQUEST['id']}";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $singlePost = $statement->fetch();
    }
?>
        <?php
        if (isset($_POST['delete_btn_post'])){
            $sql = "DELETE FROM posts  WHERE id = {$_POST['delete_btn_post']} ";
            $statement = $connection->prepare($sql);
            $statement->execute();
            header("Location: index.php");
        }
        ?>           

<main role="main" class="container">
<div class="row">
        <div class="col-sm-8 blog-main">
        <div class="blog-post">
                    <h2 class="blog-post-title"><?php echo $singlePost['title']; ?></h2>
                    <p class="blog-post-meta"><?php echo $singlePost['fmt_created_at']; ?> by <a href="#"><?php echo $singlePost['author']?></a></p>
                    <p><?php echo $singlePost['body']; ?></p>
                    <form action= "" method = "post">
                            <input type="hidden" name="delete_btn_post" value="<?php echo $singlePost['id']; ?>"/>
                            <input type="submit" name="delete" value="Delete this post" class="btn btn-primary" onclick="return deleletconfig()" />
                    </form>
        </div>
        <?php if (isset($_REQUEST['is_valid']) && $_REQUEST['is_valid'] == false) { ?>
            <div class="alert alert-danger echo " role="alert" >
            Please fill in all required fields!
            </div>
        <?php } ?>
                        <form name="myform" method="post" action="create-comment.php" onsubmit="return validateform()" >
                            <p><label for="comment_owner">Your Name:</label></p>
                            <input type="text" class="form-control" name="comment_owner" id="comment_owner" size="60" maxlenght="150" ></p>

                            <p>
                                <label for="comment_text">Text</label><br>
                                <textarea id="comment_text" class="form-control" name="comment_text" rows="4" cols="60"></textarea>

                            </p>
                            <input type="hidden" name = "id" id="id" value = "<?php echo$_GET['id']; ?>">
                            <input type="submit" class="btn btn-danger" name="submit"  value = "Add Comment">

                        </form>

            <?php include "comments.php"; ?>
        </div>
        <?php include "sidebar.php"; ?>
</div>
</main>
    <?php include "footer.php"; ?>

            <script>
                    function deleletconfig(){
                    var del=confirm("Do you really want to delete this post?");
                        if (del){
                            }else{
                            alert("Post Not Deleted")
                            }
                            return del;
                        }
            </script>