
<?php 
require 'vendor/mustache/mustache/src/Mustache/Autoloader.php';
Mustache_Autoloader::register();
// On met en variables les informations de connexion 
$hote = '127.0.0.1'; // Adresse du serveur 
$user = 'root'; // Login 
$pass = 'lpdip:17'; // Mot de passe 
$base = 'web-student'; // Base de données à utiliser 
$info = ''; //message de retour utilisateur
$dbh = new PDO('mysql:host=localhost;dbname=web-student', $user, $pass); //connexion à la base de donnée mysql

 //si le formulaire a été envoyé
 if (isset ($_POST['id']))
{
  $tododel = $_POST['id'];

  // Si l'un des champs est vide, lancer une erreur
  if (empty ($tododel))
        $info = 'Veuillez renseigner le champ à supprimer';
  else
  {
    // Insertion dans la bdd
    $query = ("DELETE FROM todo WHERE id=(:tododel)");
    //requête préparée
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':tododel', $tododel);
  
    //affichage d'un message de retour en fonction du succès de la commande
    if ($stmt->execute())
      $info = 'Suppression réussi';
    else
      $info = 'Erreur lors de la création de la tâche';
  }
}
    
    //reqête permettant de récupérer les données dans la base ( id et tâche )
    $resultats=$dbh ->query("SELECT * from todo");
    $resultats->setFetchMode(PDO::FETCH_OBJ);
   // Si le formulaire a été envoyé

if (isset ($_POST['ajouter']))
{
  $todo = $_POST['todolist'];

  // Si l'un des champs est vide, lancer une erreur
  if (empty ($todo))
        $info = 'Veuillez renseigner le champ tâche';
  else
  {
    // Insertion dans la bdd
    $query = ("INSERT INTO todo (action) VALUES(:todo)");
    echo $info;

    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':todo', $todo);
 
    if ($stmt->execute())
      $info = 'La news a été créé avec succès';
    else
      $info = 'Erreur lors de la création de la tâche';
    mysqli_stmt_close($stmt);
    header('Location: index.php');

  }
}
?>


<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Let's code</title>
  <link rel="stylesheet" href="style.css?">
</head>
<body>
  <div class="conteneur">
   <h1>Toutes vos Tâches</h1> 
  <ul>
<?php
$compteur = 1;

  //1- On affiche toutes les tâches avec l'aide d'une boucle while. On récupère l'id et la tâche
  //2- On créer un bouton supprimer dans un formulaire ( sous forme d'image ) avec un champ caché qui contient l'id de la tâche. 
  while( $resultat = $resultats->fetch() )
{
        echo "<li><form action='.' method='post'>Tâche ".$compteur.":  " .$resultat->action."<input id='img' type='image' name='supprimer' value='supp' src='img/del.png'/>
        <input type='HIDDEN' name='id' value=".$resultat->id."/></form></li>";
        $compteur++;
}
?>
  </ul>
  </div>
  <br>
<!--formulaire d'ajout-->
  <div class="conteneur">
    <form action="index.php" method="post" enctype="multipart/form-data">
    <label>Ajouter :</label> <input type="text" name="todolist"/>
    <input id="ajouter" name="ajouter" type="submit" value="Ajouter" />
    <br><br>
  </form>
<!--  affichage du message retour utilisateur-->
<?php
{
  echo "<p>". $info."</p>";
}
?>
  </div>
</body>
</html>
