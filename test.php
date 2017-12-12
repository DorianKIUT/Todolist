<?php
require 'vendor/autoload.php';
Mustache_Autoloader::register();
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
$m = new Mustache_Engine;
echo $m->render('Hello, {{planet}}!', array('planet' => 'World')); // "Hello, world!"
?>
  </ul>
  </div>

</body>
</html>