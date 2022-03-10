<?php
declare(strict_types=1);

namespace custombox\controleur;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Container;
use custombox\view\VueCreerProduit;

class ControleurCreerProduit{
	// ATTRIBUTS
    private $container;

    // CONSTRUCTEUR
    public function __construct(Container $container) {
        $this->container = $container;
    }

    public function AffichageCreerProduit(Request $rq, Response $rs,$args): Response {
        if($rq->isPost()){

            $p = new Produit();
            $p->nom = filter_var($args['nom'],FILTER_SANITIZE_STRING);
            $p->poids = filter_var($args['poids'],FILTER_SANITIZE_FLOAT);
            $p->description = filter_var($args['description'],FILTER_SANITIZE_STRING);
            $p->save();

        }
        $vue = new VueCreerProduit($this->container);
		$html = $vue->render(1);
        $rs->getBody()->write($html);     
        return $rs;
    }
}