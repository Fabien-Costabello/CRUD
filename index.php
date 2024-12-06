<?php

include("./controller/indexControl.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="assets/style/index.css">
</head>
<body>
    <section>
        <?php getUsers(); ?>
        <form class ="addUser" method="POST">
            <input type="text" id="name" name="name" placeholder="Nom">
            <input type="text" id="firstName" name="firstName" placeholder="Prénom">
            <input type="email" id="mail" name="mail" placeholder="Mail">
            <input type="text" id="postalCode" name="postalCode" placeholder="Code Postal">
            <button class="add" name="add">Ajouter utilisateur</button>
        </form>
    </section>
</body>

</html>