<?php

include("../controller/modifyControl.php");

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier utilisateurs</title>
</head>

<body>
    <section>
        <section>
       <form method="POST">
        <?php 
        getUser();
        ?>
       </form>
        </section>
    </section>
</body>

</html>