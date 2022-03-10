<?php


namespace custombox\view;

// IMPORTS
use Slim\Container;

class VueRender
{

    // ATTRIBUTS
    private $container;

    // CONSTRUCTEUR
    public function __construct(Container $c)
    {
        $this->container = $c;
    }



    public function render(string $content) :string
    {
        return <<<END
        <!DOCTYPE html>
        <html lang="fr">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
                <title>Home - Brand</title>
                <link rel="stylesheet" href="{$this->container->router->pathFor("accueil")}assets/bootstrap/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
                <link rel="stylesheet" href="{$this->container->router->pathFor("accueil")}assets/fonts/simple-line-icons.min.css">
                <link rel="stylesheet" href="{$this->container->router->pathFor("accueil")}assets/css/vanilla-zoom.min.css">
                <link rel="stylesheet" href="{$this->container->router->pathFor("accueil")}css/StyleCommande.css">

            </head>
            <body>
                <header>
                    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
                        <div class="container"><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                                <ul class="navbar-nav ms-auto">
                                  <li class="nav-item"><a class="nav-link" href="{$this->container->router->pathFor("accueil")}"><p class="textNav">Accueil</p></a></li>
                                    <li class="nav-item"><a class="nav-link" href="{$this->container->router->pathFor("afficherListe")}"><p class="textNav">Liste produit</p></a></li>
                                    <li class="nav-item"><a class="nav-link" href="{$this->container->router->pathFor("afficherCommande")}"><p class="textNav">Faire commande</p></a></li>
                                    <li class="nav-item"><a class="nav-link" href="{$this->container->router->pathFor("afficherFormulaire")}"><p class="textNav">Créer produit</p></a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </header>
                    <main class="page landing-page">
                        <section class="clean-block clean-info dark">
                            <div class="container">
                                $content
                            </div>
                        </section>
                    </main>
                
              
            </body>
        </html> 
END;
    }
}