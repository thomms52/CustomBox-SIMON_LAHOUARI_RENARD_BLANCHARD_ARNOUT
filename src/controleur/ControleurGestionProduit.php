<?php
declare(strict_types=1);


namespace custombox\controleur;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Container;
use custombox\modele\Produit;



class ContrloleurGestionProduit
{

// ATTRIBUTS
    private $container;

    // CONSTRUCTEUR
    public function __construct(Container $container) {
        $this->container = $container;
    }


    public function affichageListeProduit(Request $rq, Response $rs, array $args): Response {
        try {
            $vue = new VueGestionProduit($this->container);

            //on cherche la liste
            $edition = false;
            $liste = $this->recupererListeLecture($args['token']);
            if ($liste == null) {//si elle n'est pas trouvé
            $liste = $this->recupererListeEdition($args['token']);
            $edition = true;
        }

        if ($liste != null) {

            $rs->getBody()->write($vue->render(3, $liste, $edition));

        } else {
            $vue = new VueRender($this->container);
            $rs->getBody()->write($vue->render($vue->htmlErreur("<br><br><div class='block-heading'><h2>Erreur dans le token de la liste...</h2></div><br>")));
        }
        } catch (\Exception $e) {
            $vue = new VueRender($this->container);
            $rs->getBody()->write($vue->render($vue->htmlErreur("<br><br><div class='block-heading'><h2>Erreur dans l'affichage de la liste...</h2></div><br>".$e->getMessage()."<br>".$e->getTrace())));
        }
        return $rs;
    }
}
