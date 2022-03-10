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
class Categorie extends \Illuminate\Database\Eloquent\Model
{

    // ATTRIBUTS

    public $timestamps = false;
    protected $table = 'categorie';
    protected $primaryKey = 'id';
    

    // CONSTRUCTEUR

    public function items()
    {
        return $this->hasMany('\mywishlist\modele\Item', 'liste_id');
    }

}
