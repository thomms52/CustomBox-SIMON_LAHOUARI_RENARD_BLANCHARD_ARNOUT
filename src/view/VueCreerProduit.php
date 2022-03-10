<?php

namespace custombox\view;
//require_once 'src/modele/Produit.php';


use Slim\Container;
use custombox\modele\Produit;

class VueCreerProduit{

    // ATTRIBUTS
    private $container;

    // CONSTRUCTEUR
    public function __construct(Container $c)
    {
        $this->container = $c;
    }


    
    public function CreationFormulaire():string {
    $rs= <<<END
    <form class="formulaire" method="post">
        <fieldset>
            <legend id="ajd">Création d'un produit.</legend>
        <p class = "nom">
            <label for="nom">Entrez le nom du produit : </label>
            <input type="text" name ="nom" id="nom" placeholder="nom" required>
        </p>
        <p class = "poids">
           <label for="poids>Entrez le poids du produit : " </label>
           <input type="text" name ="poids" id ="poids" placeholder="poids"  required>
        </p>
           <input type="submit" value="Valider">
           </fieldset>
        </form>

        <style>
        body{
        background-color: lightgray;
        background-size: cover;
    }
    
    .reussite{
        color:white;
        width: 50%;
        background-color: green;
        border: 0.2em ridge white;
        margin-left: 25%;
        height: 2em;
    }
    form{
        width: 50%;
        grid-column: 2;
        background-color: rgb(22, 31, 41);
        border: 0.2em ridge white;
        margin-left: 25%;
        height: 15em;
        font-size: 1.1em;
    }
    form > fieldset > p{
        color: white;
        margin-bottom: 1.2em;
    }
    legend{
        color: white;
    }
    </style>
</body>
</html>
END;
        return $rs;
    }

    public function render(int $selecteur, $arg1 = null, $arg2 = null): string
    {
        $content = "";
        switch ($selecteur) {
            case 1:
            {

                $content = $this->CreationFormulaire();
                break;
            }
        }
        $vue = new VueRender($this->container);
        return $vue->render($content);


    }


}
