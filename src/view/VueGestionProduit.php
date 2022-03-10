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


    private function htmlAfficherProduit($produits) : string
    {

        $res="";
        foreach ($produits as $produitsCurr) {

            $urlImg ="{$this->container->router->pathFor('accueil')}images/produits/{$produitsCurr->id}.jpg";


            echo $urlImg."<br>";


            $res .= <<<END
                <div class="row align-items-center">
            
                <h3>{$produitsCurr->id}. {$produitsCurr->titre}</h3>
                
                <div class="col-md-6Img"><img class="img-thumbnail imgItem" src="$urlImg"/></div>
            <div class="col-md-6Texte">
               
                <div class="getting-started-info">
                    <p>{$produitsCurr->description}</p>
                </div>
                <p>{$produitsCurr->poids}</p>
            </div>
        </div>
END;


        }

        $html = <<<END
                        <h2 class="text-info">Liste des produits</h2>


                        $res

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

