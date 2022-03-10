<?php
declare(strict_types=1);

namespace custombox\controleur;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Container;
use custombox\view\VueCommande;
use custombox\modele\Commande;
use custombox\modele\Produit;
use custombox\view\VueGestionProduit;

class ControleurCommande{
	// ATTRIBUTS
    private $container;

    // CONSTRUCTEUR
    public function __construct(Container $container) {
        $this->container = $container;
    }

    public function AffichagePanier(Request $rq, Response $rs, array $args): Response {
		if($rq->isPost()) {			
			$c = new Commande();
			$c->descr = $args['description'];
			$c->couleur = $args['Couleur'];
			$c->idboite = $args['taille'];
			$c->save();
		}
		
		$produits= Produit::get();
		
        $vue = new VueCommande($this->container);
		$html = $vue->render($produits);
        $rs->getBody()->write($html);     
        return $rs;
    }

}