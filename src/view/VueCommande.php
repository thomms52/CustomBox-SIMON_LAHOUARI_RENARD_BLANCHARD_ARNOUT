<?php
declare(strict_types=1);

namespace custombox\view;

use Slim\Container;
use custombox\modele\Produit;

class VueCommande {
	
	private function CreationCommande(): String {
        $content = '';
        $content.='
		<p id="titre">Commandes</p>
		
		<div class="cartonGauche">
			<form class="formulaire" method="post">
				<img src="../images/box.svg">
			
				<input type="button" class="favorite styled" type="button"> Grand</button>
				<input type="button" class="favorite styled" type="button"> Moyen</button>
				<input type="button" class="favorite styled" type="button"> Petit</button>
			
			<fieldset>
				<div>
					<input type="color" id="Couleur" name="Couleur"
					value="#ffffff">
					<label for="head">Couleur</label>
				</div>
					
					<p>
						<label for="ameliorer">Quel est la description de la boite ?</label><br />
						<textarea name="ameliorer" id="ameliorer"></textarea>
					</p>
					
			   <input type="submit" value="Valider">
			   
			   
			   </fieldset>
			</form>
			
		</div>
		<div class="cartonDroite">
			<p>Carton mais à droite</p>
		</div>
		';
        return $content;
    }

	
	public function render() {
        $content = $this->CreationCommande();
		
		
        
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