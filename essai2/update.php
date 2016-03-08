<!doctype html>
<html>
<head>
  <meta charset="utf-8"/>
  <title>Update // CRUD</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="style.css" rel="stylesheet"/>
</head>

<body>
  <h1>Créer un nouvel article</h1>
  <p><a class="creer" href="read.php"><strong>< Voir tous les articles</strong></a></p>

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



            if(isset($_POST['marque']) && isset($_POST['modele']) && isset($_POST['type_vehicule']) && isset($_POST['couleur']) && isset($_POST['immatriculation']))
            {

                if(!empty($_POST['marque']) && !empty($_POST['modele']) && !empty($_POST['type_vehicule']) && !empty($_POST['couleur']) && !empty($_POST['immatriculation'])){
                  $req = $bdd->prepare('UPDATE vehicules SET marque=:marque, modele=:modele, type_vehicule=:type_vehicule, couleur=:couleur, immatriculation=:immatriculation WHERE id=:id');
                  $req->execute(array(
                    "marque"=>$_POST['marque'],
                    "modele"=>$_POST['modele'],
                    "type_vehicule"=>$_POST['type_vehicule'],
                    "couleur"=>$_POST['couleur'],
                    "immatriculation"=>$_POST['immatriculation'],
                    "id"=>$_GET['id']));
                }
                else
                {
                    echo ("<div class='erreur'>// Tu n'as pas tout rempli, merci de recommencer //</div>");
                }

            }
            $req = $bdd->prepare('SELECT * FROM vehicules WHERE id=?');
            $req->execute(array($_GET['id']));
            while($donnees = $req->fetch()){
  ?>

    <form id="formulaire" action="update.php?id=<?php echo $_GET['id'];?>" method="post">
      <p>
        <input value="<?php echo $donnees['marque'];?>" placeholder="Marque" type="text" name="marque" id="marque" />
        <br />
          <input value="<?php echo $donnees['modele'];?>" placeholder="Modèle" type="text" name="modele" id="modele" />
          <br />
          <input value="<?php echo $donnees['type_vehicule'];?>" placeholder="Type de véhicule" type="text" name="type_vehicule" id="type_vehicule" />
          <br />
          <input value="<?php echo $donnees['couleur'];?>" placeholder="Couleur" type="text" name="couleur" id="couleur" />
          <br />
          <input value="<?php echo $donnees['immatriculation'];?>" placeholder="Immatriculation" type="text" name="immatriculation" id="immatriculation" />
          <br />

        <input id="btn" type="submit" value="+ Modifier" />
      </p>
    </form>

<?php }

?>

</body>

</html>
