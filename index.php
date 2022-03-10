<?php
declare(strict_types=1);

# Chargement de l'autoload
require_once __DIR__ . '/vendor/autoload.php';


use custombox\controleur\ControlerGestionProduit;
use custombox\view\VueGestionProduit;


use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Capsule\Manager as DB;
use Slim\App;
use Slim\Container;

# Installation de la configuration erreur de Slim
$config = ['settings' => ['displayErrorDetails' => true, 'dbconf' => __DIR__.'/src/config/dbconfig.ini']];

# Connection a la base de donnees MYSQL
# Chargement du module Eloquent
$db = new DB();
$db->addConnection(parse_ini_file(__DIR__.'/src/conf/dbconfig.ini'));
$db->setAsGlobal();
$db->bootEloquent();

$container = new Container($config);
$app = new App($container);



########    LES ROUTES  #######

//Fonction 1, liste des produits

$app->get('/listeProduit/[/]', function (Request $rq, Response $rs, array $args) use ($container): Response {
    $controleur = new ControlerGestionProduit($container);
    return $controleur->AffichageListe($rq, $rs, $args, false);
})->setName('afficherListe');

//Fonction 2, liste commandes

$app->get('/commandes/[/]', function (Request $rq, Response $rs, array $args) use ($container): Response {
    $controleur = new ControlerCommande($container);
    return $controleur->AffichagePanier($rq, $rs, $args, false);
})->setName('afficherCommande');

$app->get('/CreerProduit/[/]', function (Request $rq, Response $rs, array $args) use ($view): Response{
    $view = new VueCreerProduit($view);
    return $view->CreationFormulaire($rq,$rs,$args, false);
})->setName('afficherFormulaire');
