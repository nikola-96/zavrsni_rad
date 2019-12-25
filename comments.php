
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
    if (isset($_GET['id'])) {

    // pripremamo upit
    $sql = "SELECT author, text FROM comments WHERE post_id = {$_GET['id']}";
    $statement = $connection->prepare($sql);

    // izvrsavamo upit
    $statement->execute();

    // zelimo da se rezultat vrati kao asocijativni niz.
    // ukoliko izostavimo ovu liniju, vratice nam se obican, numerisan niz
    $statement->setFetchMode(PDO::FETCH_ASSOC);

    // punimo promenjivu sa rezultatom upita
    $comments = $statement->fetchAll();

    }
?>

        <button class='btn' onclick="toggle_visibility('comments'); change_text()">Hide Comments</button> 
            

<div class="comments" id= "comments">
        <h3>comments</h3>
        <?php
            foreach ($comments as $comment) {
        ?>
        <ul>
            <li><?php echo $comment['text'].'<br>'.'by: '.$comment['author'];?></li>
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

