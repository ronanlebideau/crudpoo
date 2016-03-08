<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <title>Create // CRUD</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="style.css" rel="stylesheet"/>
</head>

<body>
<div class="container">
  <h1>Ajouter un véhicule</h1>
  <p>
    <a class="menubtn" href="create.php"><strong>+ Ajouter un véhicule</strong></a>
    <a class="menubtn" href="read.php"><strong>Accueil</strong></a>
    <a class="menubtn" href="voitures.php"><strong>Voitures</strong></a>
    <a class="menubtn" href="motos.php"><strong>Motos</strong></a>
    <a class="menubtn" href="proprietaires.php"><strong>Propriétaire</strong></a>
    <a class="menubtn" href="immatriculation.php"><strong>Immatriculation</strong></a>
    <a class="menubtn" href="couleur.php"><strong>Couleur</strong></a>
  </p>


  <table class="table">
    <thead>
    <tr>
      <th>Infos</th>
      <th>Champ</th>
    </tr>
    </thead>
    <tbody>
      <tr>
        <form id="formulaire" action="read.php" method="post">
            <td>Pénom</td>
            <td><input placeholder="Prenom" type="text" name="prenom" id="prenom" /></td>
      </tr>
      <tr>
          <td>Nom</td>
          <td><input placeholder="Nom" type="text" name="nom" id="nom" /></td></td>
      </tr>
      <tr>
          <td>Marque</td>
          <td><input placeholder="Marque" type="text" name="marque" id="marque" /></td>
      </tr>
      <tr>
          <td>Modèle</td>
          <td><input placeholder="Modèle" type="text" name="modele" id="modele" /></td>
      </tr>
      <tr>
          <td>Type</td>
          <td><input placeholder="Type" type="text" name="type_vehicule" id="type_vehicule" /></td>
      </tr>
      <tr>
          <td>Couleur</td>
          <td><input placeholder="Couleur" type="text" name="couleur" id="couleur" /></td>
      </tr>
      <tr>
          <td>Immatriculation</td>
          <td><input placeholder="Immatriculation" type="text" name="immatriculation" id="immatriculation" /></td>
      </tr>
      </tbody>
      </table>
    <input type="submit" value="+ Ajouter" class="submitbtn" />
        </form>
</div>

</body>

</html>
