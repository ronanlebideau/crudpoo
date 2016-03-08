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
  <title>Accueil</title>
  <link href="css/bootstrap.min.css" rel="stylesheet"/>
  <link href="style.css" rel="stylesheet"/>
</head>

<body>
  <?php
  // Connexion à la base de données
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=crud2;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }
  catch(Exception $e)
  {
          die('Erreur : '.$e->getMessage());
  }



  if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['marque']) && isset($_POST['modele']) && isset($_POST['type_vehicule']) && isset($_POST['couleur']) && isset($_POST['immatriculation']))
  {
      if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['marque']) && !empty($_POST['modele']) && !empty($_POST['type_vehicule']) && !empty($_POST['couleur']) && !empty($_POST['immatriculation'])){
          // Insertion du nouvel article (qui vient de create.php)
          $req = $bdd->prepare('
            INSERT INTO proprietaires (prenom, nom)
            VALUES (?,?)
          ');
          $req->execute(array($_POST['prenom'], $_POST['nom']));

          $lastId = $bdd->lastInsertId();

          $req = $bdd->prepare('
            INSERT INTO vehicules (marque, modele, type_vehicule, couleur, immatriculation, ID_proprietaire)
            VALUES(?,?,?,?,?,?)
          ');
          $req->execute(array($_POST['marque'], $_POST['modele'], $_POST['type_vehicule'], $_POST['couleur'], $_POST['immatriculation'], $lastId));



      }
      else
      {
          echo ("<div class='erreur'>// Tu n'as pas tout rempli, merci de recommencer //</div>");
      }
  }
  ?>
  <div class="container">
  <h1>Liste des véhicules</h1>
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
      // On récupère les éléments
      // $reponse = $bdd->query('SELECT marque, modele, type_vehicule, couleur, immatriculation, id FROM vehicules ORDER BY ID DESC');
        $reponse = $bdd->query(
            'SELECT proprietaires.nom AS nom, proprietaires.prenom AS prenom, marque, modele, type_vehicule, couleur, immatriculation, vehicules.ID AS id
            FROM proprietaires
            INNER JOIN vehicules
            ON vehicules.ID_proprietaire = proprietaires.id
            ORDER BY id DESC'
        );
    ?>


      <table class="table">
          <thead>
          <tr>
              <th>ID</th>
              <th>Marque</th>
              <th>Modèle</th>
              <th>Type</th>
              <th>Couleur</th>
              <th>Immatriculation</th>
              <th>Propriétaire</th>
          </tr>
          </thead>
          <tbody>
          <?php
          // On affiche les elements
          while ($donnees = $reponse->fetch())
          {
              ?>
              <tr>
                  <td><?= $donnees['id'];?></td>
                  <td><?= $donnees['marque'];?></td>
                  <td><?= $donnees['modele'];?></td>
                  <td><?= $donnees['type_vehicule'];?></td>
                  <td><?= $donnees['couleur'];?></td>
                  <td><?= $donnees['immatriculation'];?></td>
                  <td><?= $donnees['prenom'];?> <?= $donnees['nom'];?></td>
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