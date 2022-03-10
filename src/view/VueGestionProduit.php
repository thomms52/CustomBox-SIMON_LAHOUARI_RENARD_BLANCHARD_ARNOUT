<?php
declare(strict_types=1);


namespace custombox\view;

use Slim\Container;
use custombox\modele\Produit;
use \Illuminate\Database\Eloquent\Collection;

class VueGestionProduit
{

    // ATTRIBUTS
    private $container;

    // CONSTRUCTEUR
    public function __construct(Container $c)
    {
        $this->container = $c;
    }


    private function htmlAfficherProduit($args1)
    {
        $html = <<<END
                        <h2 class="text-info">Modification des informations d'une liste</h2>


END;
        return $html;

    }

    public function render(int $selecteur, $arg1 = null, $arg2 = null): string
    {
        $content = "";
        switch ($selecteur) {
            case 1:
            {

                $content = $this->htmlAfficherProduit($arg1);
                break;
            }
        }
        $vue = new VueRender($this->container);
        return $vue->render($content);


    }

}

