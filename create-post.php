
<?php include "header.php"; ?>

<main role="main" class="container">
    <div class="row">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link href="styles/blog.css" rel="stylesheet">
        

            <form name="myform" method="post" action="create.php" onsubmit="return validateform()" >
            <?php if (isset($_REQUEST['is_valid']) && $_REQUEST['is_valid'] == false) { ?>
                <div class="alert alert-danger echo " role="alert" >
                Please fill in all required fields!
                </div>
                <?php } ?>
                <p><label for="title_post">Title:</label>
                    <input type="text" class="form-control" name="title_post" id="title_post" size="60" maxlenght="150" >
                </p>
                <p><label for="owner_post">Your Name:</label>
                    <input type="text" class="form-control" name="owner_post" id="owner_post" size="60" maxlenght="150" >
                </p>

                <p>
                    <label for="post_text">Text</label><br>
                    <textarea id="post_text" class="form-control" name="post_text" rows="6" cols="60"></textarea>
                </p>
                <input type="submit" class="btn btn-danger" name="submit"  value = "Add Post">
            </form>
        <?php include "sidebar.php"; ?>
    </div>
        <?php include "footer.php"; ?>

</main>