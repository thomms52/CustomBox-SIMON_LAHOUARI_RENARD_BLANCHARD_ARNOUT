<?php
namespace custombox\controleur;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Container;
use custombox\view\VueRacine;


class ControlerRacine
{
    // ATTRIBUTS
    private $container;

    // CONSTRUCTEUR
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function affichageRacine(Request $rq, Response $rs, array $args): Response
    {
        $vue = new VueRacine($this->container);
        $rs->getBody()->write($vue->render(1));
        return $rs;
    }

}