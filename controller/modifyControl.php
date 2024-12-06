<?php
session_start();


function getUser()
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

    $sql = "SELECT * FROM users WHERE ID = {$_SESSION['users']['id']}";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<article>";
            echo "<h2>ID: " . $row['ID'] . "</h2>";
            echo "<p>Nom: <input type='text' name='name' value='" . $row['Nom'] . "'></p>";
            echo "<p>Prénom: <input type='text' name='firstName' value='" . $row['Prenom'] . "'></p>";
            echo "<p>Mail: <input type='email' name='mail' value='" . $row['Mail'] . "'></p>";
            echo "<p>Code Postal: <input type='text' name='postalCode' value='" . $row['CodePostal'] . "'></p>";
            echo "<button name='validate'> Valider </button>";
            echo "</article>";
        }
    }

}


////////////Valider modif
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['validate'])){
   echo $_SESSION['users']['id'];
   $host = 'localhost';
   $dbname = 'cours sql';
   $username = 'root';
   $password = '';
   $conn = new mysqli($host, $username, $password, $dbname);
   

   $sql = "UPDATE users SET Nom = '$_POST[name]', Prenom = '$_POST[firstName]', Mail = '$_POST[mail]', CodePostal = '$_POST[postalCode]' WHERE ID = '" . $_SESSION['users']['id'] . "'";
   $result = $conn->query($sql);
   header('Location: ../index.php');
}



?>
