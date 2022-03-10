<?php
declare(strict_types=1);

namespace custombox\controleur;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Container;
use custombox\view\VueCommande;

class ControleurCreerProduit{
	// ATTRIBUTS
    private $container;

    // CONSTRUCTEUR
    public function __construct(Container $container) {
        $this->container = $container;
    }

    public function AffichageCreerProduit(Request $rq, Response $rs,$args): Response {
        $vue = new VueCreerProduit($this->container);
		$html = $vue->render();
        $rs->getBody()->write($html);     
        return $rs;
    }
}