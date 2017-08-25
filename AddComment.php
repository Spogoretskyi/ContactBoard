<?php require_once "header.php" ?>
<div class="container">
    <form method="post" class="form-signin">
        <h2 class="form-signin-heading">Your comment</h2>
        <p>
        <h2>Name:</h2><input type="text" id="username" name="username" class="form-control" placeholder="name"
                             value="<?php if (isset($_POST['username'])) {
                                 echo $_POST['username'];
                             } ?>"
                             maxlength="50">

        <p>
        <h2>Comment:</h2><textarea style="resize: none;" id="text" name="text" class="form-control" placeholder="text"
                                   maxlength="350" rows="10"> <?php if (isset($_POST['text'])) {
                echo $_POST['text'];
            } ?></textarea>
        </p>
        <p>
            <button class="btn btn-lg btn-primary" id="submit" name="submit" type="submit">submit</button>
        </p>
    </form>
</div>
<br>
<br>
<br>

</body>
</html>