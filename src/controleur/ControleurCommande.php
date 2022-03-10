<?php
declare(strict_types=1);


namespace custombox\controleur;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Container;
use custombox\view\VueCommande;


class ControleurCommande
{
	// ATTRIBUTS
    private $container;

    // CONSTRUCTEUR
    public function __construct(Container $container) {
        $this->container = $container;
    }


    public function AffichagePanier(Request $rq, Response $rs, array $args): Response {
        
            $vue = new VueCommande($this->container);

           
        

        
        return $rs;
    }

}