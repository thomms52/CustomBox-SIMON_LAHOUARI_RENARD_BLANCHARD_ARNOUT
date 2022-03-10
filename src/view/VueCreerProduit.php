<?php

namespace custombox\view;
//require_once 'src/modele/Produit.php';


use Slim\Container;
use custombox\modele\Produit;

class VueCreerProduit{
    
    public static function CreationFormulaire(Request $rq, Response $rs, $args):Response {
    $rs->getBody()->write(<<<END
    <form class="formulaire" method="post">
        <fieldset>
            <legend id="ajd">Création d'un produit.</legend>
        <p class = "nom">
            <label for="nom">Entrez le nom du produit : </label>
            <input type="text" name = "nom" id="nom" placeholder="nom" required>
        </p>
        <p class = "poids">
           <label for="poids>Entrez le poids du produit : " </label>
           <input type="text" name = "poids" id ="poids" placeholder="poids"  required>
        </p>
        <p class = "Description">
        <label for="description>Entrez la description du produit : " </label>
        <input type="text" name = "description" id ="description" placeholder="description"  required>
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
END);
        return $rs;
    }


}
