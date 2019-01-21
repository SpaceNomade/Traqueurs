<?php
namespace App\Model;

use App\Core\App;

class PersonnageModel {

    /**
     * @return Array Un tableau d'objet de la table personnages 
     */
    public static function getPersos(){
        $sql = "SELECT Personnages.id, Personnages.nom, Personnages.classe, Personnages.vie, Personnages.attaque, Personnages.img_src, Personnages.armure, Personnages.description FROM Personnages";
        $persos = App::getDatabase()->query($sql, true);
        
        return $persos;
    }

    /**
     * @param Id Entier
     * @return Object Retourne une ligne de la table personnages en fonction de l'id en paramètre 
     */
    public static function getPersoById(Int $id){
        $sql = "SELECT Personnages.id, Personnages.nom, Personnages.classe, Personnages.vie, Personnages.attaque, Personnages.img_src, Personnages.armure, Personnages.description FROM Personnages WHERE Personnages.id = :id";
        $perso = App::getDatabase()->query($sql, false, $id);

        return $perso;
    }
}