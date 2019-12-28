
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
            if (isset($_POST['delete_btn'])){
                $sql = "DELETE FROM comments WHERE id = {$_POST['delete_btn']} ";
                $statement = $connection->prepare($sql);
                $statement->execute();
            }
        ?>           

    <?php
        if (isset($_GET['id'])) {
            $sql = "SELECT id, author, text FROM comments WHERE post_id = {$_GET['id']} ORDER BY id DESC";
            $statement = $connection->prepare($sql);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $comments = $statement->fetchAll();
            }
    ?>
            <button class='btn' onclick="toggle_visibility('comments'); ">Hide Comments</button> 

    <div class="comments" id= "comments">
        <h3>comments</h3>
            <?php
                foreach ($comments as $comment) {
            ?>
                <ul>
                    <li><?php echo $comment['text'].'<br>'.'by: '.$comment['author'];?></li>
                        <form action= "" method = "post">
                            <input type="hidden" name="delete_btn" value="<?php echo $comment['id']; ?>"/>
                            <input type="submit" name="delete" value="Delete this comment"class="btn btn-link"/>
                        </form>
                        <hr>    
                </ul>   
            <?php
                }
            ?>

    </div>


    <script type="text/javascript">
        document.querySelector('button').addEventListener('click', toggle)

        function toggle(event) {
            if (document.getElementById('comments').style.display == 'none') {
                event.target.innerText = 'Hide Comments'
                document.getElementById('comments').style.display = ''
            } else {
                event.target.innerText = 'Show comments'
                document.getElementById('comments').style.display = 'none'
                }
            }
    </script>

