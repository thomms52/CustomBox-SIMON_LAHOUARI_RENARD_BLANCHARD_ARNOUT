<?php
declare(strict_types=1);

// NAMESPACE
namespace custombox\modele;

use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Classe Commande
 * Représente une liste au sein de la base de données
 * Hérite de la classe Modele du module Eloquent
 */
class Commande extends \Illuminate\Database\Eloquent\Model
{

    // ATTRIBUTS

    public $timestamps = false;
    protected $table = 'commande';
    protected $primaryKey = 'idcommande';
    

    // CONSTRUCTEUR

    public function boite()
    {
        return $this->belongsTo('\custombox\modele\Boite', 'id');
    }

}
