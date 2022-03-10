<?php
declare(strict_types=1);

namespace custombox\view;

use Slim\Container;
use custombox\modele\Produit;

class VueCommande {
	
	private function CreationCommande($produits): String {
		$urlImg ="{$this->container->router->pathFor('accueil')}images/produits/{$produitsCurr->id}.jpg";

        $content = '';
        $content.='
		<p id="titre">Commandes</p>
		
		<div class="cartonGauche">
			<form class="formulaire" method="post">
				<img src="../images/box.svg">

				<label for="listePublic" class="form-label">Taille de la boite</label><br>
				
                <label for="taille" class="form-label">Grande</label>
                <input type="radio" value="3" class="form-control" name="taille" placeholder="" required $p_grande>
				
                <label for="taille" class="form-label">Moyenne</label>
                <input type="radio" value="2" class="form-control" name="taille" placeholder="" required $p_moyenne>
				
				<label for="taille" class="form-label">Petite</label>
                <input type="radio" value="1" class="form-control" name="taille" placeholder="" required $p_petite>
			
			<fieldset>
				<div>
					<input type="color" id="Couleur" name="Couleur">
					<label for="head">Couleur</label>
				</div>
					
					<p>
						<label for="ameliorer">Quel est la description de la boite ?</label><br />
						<textarea name="description" id="description"></textarea>
					</p>
					
			   <input type="submit" value="Valider">
			   
			   </fieldset>
			</form>
			
		</div>
		';

        foreach ($produits as $produitsCurr) {

            $urlImg ="{$this->container->router->pathFor('accueil')}images/produits/{$produitsCurr->id}.jpg";

            echo $urlImg."<br>";

            $content .='
			<div class="cartonDroite">
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
			</div>';
        return $content;
    }

	
	public function render($args) {
        $content = $this->CreationCommande($args);

        $html = <<<END
            <!DOCTYPE html>
            <html>
            <body><head><link rel="stylesheet" href="../css/StyleCommande.css">
            </head>
                $content
            </body>
            </html>
            END ;
        return $html;
    }
}