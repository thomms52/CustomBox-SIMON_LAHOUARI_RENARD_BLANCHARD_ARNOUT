<?php
declare(strict_types=1);

# Chargement de l'autoload
require_once __DIR__ . '/vendor/autoload.php';
//require_once __DIR__ . '/src/conf/dbconfig.ini';
//require_once __DIR__ . '/src/controleur/ControleurProduit.php';
//require_once __DIR__ . '/src/view/VueGestionProduit.php';


use custombox\controleur\ControleurCommande;
use custombox\controleur\ControleurProduit;
use custombox\view\VueGestionProduit;
use custombox\view\VueCommande;
use custombox\view\VueCreerProduit;
use custombox\view\ControleurCreerProduit;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Capsule\Manager as DB;
use Slim\App;
use Slim\Container;

# Installation de la configuration erreur de Slim
$config = ['settings' => ['displayErrorDetails' => true, 'dbconf' => __DIR__.'/src/conf/dbconfig.ini']];

# Connection a la base de donnees MYSQL
# Chargement du module Eloquent
$db = new DB();
$db->addConnection(parse_ini_file(__DIR__.'/src/conf/dbconfig.ini'));
$db->setAsGlobal();
$db->bootEloquent();

$container = new Container($config);
$app = new App($container);



########    LES ROUTES  #######


//acceuil

$app->get('/', function (Request $rq, Response $rs, array $args) use ($container): Response {
    $controleur = new ControlerRacine($container);
    return $controleur->racine($rq, $rs, $args);
})->setName('accueil');



//Fonction 1, liste des produits

$app->get('/', function (Request $rq, Response $rs, array $args) use ($container): Response {
    $controleur1 = new ControleurProduit($container);
    return $controleur1->affichageListeProduit($rq, $rs, $args);
})->setName('afficherListe');



$app->get('/listeProduit[/]', function (Request $rq, Response $rs, array $args) use ($container): Response {
    $controleur1 = new ControleurProduit($container);
    return $controleur1->affichageListeProduit($rq, $rs, $args);
})->setName('afficherListe');


//Fonction 2, liste commandes

$app->get('/commandes[/]', function (Request $rq, Response $rs, array $args) use ($container): Response {
    $controleur1 = new ControleurCommande($container);
    return $controleur1->AffichagePanier($rq, $rs, $args, false);
})->setName('afficherCommande');

//Fonction 5, Création d'un produit 

$app->get('/CreerProduit[/]', function (Request $rq, Response $rs, array $args) use ($container): Response{
    $container = new ControleurCreerProduit($container);
    return $container->AffichageCreerProduit($rq,$rs,$args, false);

})->setName('afficherFormulaire');


# On lance l'app

$app->run();
