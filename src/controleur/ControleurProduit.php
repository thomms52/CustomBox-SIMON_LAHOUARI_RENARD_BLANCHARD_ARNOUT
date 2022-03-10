<?php

namespace custombox\controleur;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Container;
use custombox\modele\Produit;
use custombox\view\VueGestionProduit;

class ControleurProduit
{

    // ATTRIBUTS
    private $container;

    // CONSTRUCTEUR
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function affichageListeProduit(Request $rq, Response $rs, array $args): Response
    {
        $vue = new VueGestionProduit($this->container);



        $produits= Produit::get();
        //var_dump($produits);

        $rs->getBody()->write($vue->render(1, $produits));

        return $rs;
    }

}








