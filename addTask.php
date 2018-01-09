<?php 
	require_once 'vendor/autoload.php';
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

if (isset ($_POST['ajouter']))
{
  	 $task = $_POST['params'];

  // Si l'un des champs est vide, lancer une erreur
  if (empty ($task))
     $info = 'Veuillez renseigner le champ tâche';
  else
  {
    // Insertion dans la bdd
	 $query = ("INSERT INTO todo (action) VALUES(:newtask)");
     echo $info;

     $stmt = $dbh->prepare($query);
     $stmt->bindParam(':newtask', $task);
 
    if ($stmt->execute())
    {
    	$info = 'La tâche a été créé avec succès';
    }
      
    else
    {
      $info = 'Erreur lors de la création de la tâche';
    }
    header('Location: index.php');
    mysqli_stmt_close($stmt);
    
  }
}