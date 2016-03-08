<?php
/* Jointure :
    AVEC WHERE
        SELECT proprietaires.nom AS nom, proprietaires.prenom AS prenom
        FROM proprietaires, vehicules
        WHERE vehicules.ID_proprietaire = proprietaires.ID

    AVEC JOIN
        SELECT proprietaires.nom, proprietaires.prenom
        FROM proprietaires
        INNER JOIN vehicules
        ON vehicules.ID_proprietaire = proprietaires.id
        ORDER BY ...
*/
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Propriétaires</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="style.css" rel="stylesheet"/>
</head>

<body>

<div class="container">
    <h1>Liste des propriétaires</h1>
    <p>
        <a class="menubtn" href="create.php"><strong>+ Ajouter un véhicule</strong></a>
        <a class="menubtn" href="read.php"><strong>Accueil</strong></a>
        <a class="menubtn" href="voitures.php"><strong>Voitures</strong></a>
        <a class="menubtn" href="motos.php"><strong>Motos</strong></a>
        <a class="menubtn" href="proprietaires.php"><strong>Propriétaire</strong></a>
        <a class="menubtn" href="immatriculation.php"><strong>Immatriculation</strong></a>
        <a class="menubtn" href="couleur.php"><strong>Couleur</strong></a>
    </p>

<?php
// On se connecte à la BDD
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=crud2;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

// On récupère les éléments
$reponse = $bdd->query('
    SELECT proprietaires.prenom AS prenom, proprietaires.nom AS nom, marque, modele, couleur, immatriculation, type_vehicule, vehicules.ID AS id
    FROM proprietaires, vehicules
    WHERE vehicules.ID_proprietaire = proprietaires.ID
    ORDER BY nom DESC
');
?>

    <table class="table">
        <thead>
        <tr>
            <th>Propriétaire</th>
            <th>Véhicule</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // On affiche les elements
        while ($donnees = $reponse->fetch())
        {
            ?>
            <tr>
                <td><?= $donnees['prenom'];?> <?= $donnees['nom'];?></td>
                <td><?= strtoupper($donnees['type_vehicule']);?> <?= $donnees['marque'];?> <?= $donnees['modele'];?> <?= $donnees['couleur'];?> <?= $donnees['immatriculation'];?></td>
            </tr>
            <?php
        }


        $reponse->closeCursor();

        ?>
        </tbody>
    </table>
</div>
</body>

</html>
