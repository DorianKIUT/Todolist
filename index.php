
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
    $req = " CREATE TABLE IF NOT EXISTS `todo` (`id` int(11) NOT NULL,
                            `action` varchar(100) NOT NULL)
        ENGINE=MyISAM  DEFAULT CHARSET=latin1 ;";
    $taches = $dbh->query($req);
    //reqête permettant de récupérer les données dans la base ( id et tâche )
    $taches=$dbh ->query("SELECT * from todo ORDER BY id");
    $taches->setFetchMode(PDO::FETCH_OBJ);

    $m = new Mustache_Engine(array(
      'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/views'),
    ));
    echo $m->render("liste_taches", array('taches'=> $taches));

