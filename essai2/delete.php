<?php
header('Location:read.php');

// Connexion à la base de données
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=crud2;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$req = $bdd->prepare('DELETE FROM vehicules WHERE id=?');
$req->execute(array($_GET['id']));
?>
