<?php
session_start();


function getUsers()
{
    $host = 'localhost';
    $dbname = 'cours sql';
    $username = 'root';
    $password = '';
    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erreur de connexion : " . $conn->connect_error);
    }
    // echo "Connexion réussie à la base de données ! <br>";
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {

       while ($row = $result->fetch_assoc()) {
   
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit']) && $_POST['user_id'] == $row['ID']) {
        echo "<article>";
        echo "<form method='POST'>";
        echo "<h2>ID: " . $row['ID'] . "</h2>";
        echo "<input type='hidden' name='user_id' value='" . $row['ID'] . "'>";
        echo "<p>Nom: <input type='text' name='Nom' value='" . $row['Nom'] . "'></p>";
        echo "<p>Prénom: <input type='text' name='Prenom' value='" . $row['Prenom'] . "'></p>";
        echo "<p>Mail: <input type='email' name='Mail' value='" . $row['Mail'] . "'></p>";
        echo "<p>Code Postal: <input type='text' name='CodePostal' value='" . $row['CodePostal']. "'></p>";
        echo "<button type='submit' name='save'>Enregistrer</button>";
        echo "<button type='submit' name='cancel'>Annuler</button>";
        echo "</form>";
        echo "</article>";
    } else {
        echo "<article>";
        echo "<h2>ID: " . $row['ID'] . "</h2>";
        echo "<p>Nom: " .$row['Nom'] . "</p>";
        echo "<p>Prénom: " .$row['Prenom']. "</p>";
        echo "<p>Mail: " . $row['Mail']. "</p>";
        echo "<p>Code Postal: " . $row['CodePostal']. "</p>";
        echo "<form method='POST'>";
        echo "<input type='hidden' name='user_id' value='" . $row['ID'] . "'>";
        echo "<button class='edit' name='edit'>Modifier utilisateur</button>";
        echo "<button class='delete' name='delete'>Supprimer</button>";
        echo "</form>";
        echo "</article>";
    }
}

}
}


///////Ajout utilisateur////////////
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $host = 'localhost';
    $dbname = 'cours sql';
    $username = 'root';
    $password = '';
    $conn = new mysqli($host, $username, $password, $dbname);
    
    $sql = "INSERT INTO users (Nom, Prenom, Mail, CodePostal) VALUES ('$_POST[name]', '$_POST[firstName]', '$_POST[mail]', '$_POST[postalCode]')";
    $result = $conn->query($sql);
}
;


///////Supprimer utilisateur////////////
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $host = 'localhost';
    $dbname = 'cours sql';
    $username = 'root';
    $password = '';
    $conn = new mysqli($host, $username, $password, $dbname);
    
    $sql = "DELETE FROM users WHERE ID = '$_POST[user_id]'";
    $result = $conn->query($sql);
}



///////Modifier utilisateur////////////
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])){
    $_SESSION['users']["id"] = $_POST['user_id'];
 //header("Location: ./pages/modify.php");
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancel'])){
header("Location: ../SQL/index.php");
}


//////valider modif ///////

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save'])){

    $host = 'localhost';
    $dbname = 'cours sql';
    $username = 'root';
    $password = '';
    $conn = new mysqli($host, $username, $password, $dbname);
    
 
    $sql = "UPDATE users SET Nom = '$_POST[Nom]', Prenom = '$_POST[Prenom]', Mail = '$_POST[Mail]', CodePostal = '$_POST[CodePostal]' WHERE ID = '" . $_SESSION['users']['id'] . "'";
    $result = $conn->query($sql);
    header('Location: ../SQL/index.php');
 }
 


?>