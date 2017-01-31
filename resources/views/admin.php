<?php
session_start();
if(isset($_SESSION["login"])){?>
<h1>Welkom</h1>
        <form method="POST" enctype="multipart/form-data">
            woord-nl <input type="text" name="woord-nl"><br>
            woord-az <input type="text" name="woord-az"><br>
            foto <input type="file" name="uploadedfoto"><br><br>
            <input type="submit" value="submit" name="submit">
        </form>







<?php } else{?>
<h1>U bent niet ingelogd</h1>
<?php } ?>
