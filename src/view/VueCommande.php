<?php
declare(strict_types=1);

namespace custombox\view;

use Slim\Container;
use custombox\modele\Produit;

class VueCommande {
	
	private function CreationCommande(): String {
        $content = '';
        $content.='<h1>Commandes</h1>';
        return $content;
    }

	
	public function render() {
        $content = $this->CreationCommande();
        
        $html = <<<END
            <!DOCTYPE html>
            <html>
            <body><head>

            </head>
                $content
            </body>
            </html>
            END ;
        return $html;
    }
}