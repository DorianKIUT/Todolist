<?php 
	require_once 'vendor/autoload.php';
	Mustache_Autoloader::register();
	// On met en variables les informations de connexion 
	$hote = '127.0.0.1'; // Adresse du serveur 
	$user = 'root'; // Login 
	$pass = 'lpdip:17'; // Mot de passe 
	$base = 'web-student'; // Base de données à utiliser 
	$info = ''; //message de retour utilisateur

try {

  	$dbh = new PDO('mysql:host=localhost;dbname=web-student', $user, $pass); //connexion à la base de donnée mysql
}
catch(PDOException $e)
{
  	echo $e->getMessage();
}

 //si le formulaire a été envoyé
 if (isset ($_POST['id']))
{
  		$taskdel = $_POST['id'];

  // Si l'un des champs est vide, lancer une erreur
  if (empty ($taskdel))
        $info = 'Veuillez renseigner le champ à supprimer';
  else
  {
    // Insertion dans la bdd
   		$query = ("DELETE FROM todo WHERE id=(:tododel)");
    //requête préparée
    	$stmt = $dbh->prepare($query);
    	$stmt->bindParam(':tododel', $taskdel);
  
    //affichage d'un message de retour en fonction du succès de la commande
    	if ($stmt->execute())
      		$info = 'Suppression réussi';
    	else
      		$info = 'Erreur lors de la suppréssion de la tâche';
      	header('Location: index.php');
  }
}
