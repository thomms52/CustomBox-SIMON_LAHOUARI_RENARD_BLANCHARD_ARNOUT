<?php
declare(strict_types=1);

namespace custombox\view;

use Slim\Container;


class VueRacine
{
    // ATTRIBUTS
    private $container;

    // CONSTRUCTEUR
    public function __construct(Container $c)
    {
        $this->container = $c;
    }

    private function htmlAfficherAccueil() : string
    {
        $res="";
            $res .= <<<END
        <br><br><br><br><br><br><br><br>
                <h1>Accueil</h1>

        <p>Projet du groupe La Diete</p>

        <p>Membres du groupe : 
            - Renard Guillaume
            - Blanchard Loïc
            - Simon Thomas
            - Lahouary Hilel
            - Arnout Fabrice</p>
        END;
        return $res;
    }

    public function render(int $selecteur, $arg1 = null, $arg2 = null): string
    {
        $content = "";
        switch ($selecteur) {
            case 1:
            {
                $content = $this->htmlAfficherAccueil();
                break;
            }
        }
        $vue = new VueRender($this->container);
        return $vue->render($content);
    }
}

