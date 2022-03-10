<?php
declare(strict_types=1);

// NAMESPACE
namespace custombox\modele;

use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Classe Categorie
 * Représente une liste au sein de la base de données
 * Hérite de la classe Modele du module Eloquent
 */
class Boite extends \Illuminate\Database\Eloquent\Model
{

    // ATTRIBUTS

    public $timestamps = false;
    protected $table = 'boite';
    protected $primaryKey = 'id';
    

    // CONSTRUCTEUR

    public function produit()
    {
        return $this->belongsTo('\custombox\modele\Produit', 'id');
    }

}
