<?php
namespace App\Model;

use App\Core\App;

class UserModel {


    public static function getUser($email){
        $sql = "SELECT statut From user WHERE user.email = :email";
        
        App::getDatabase()->query;
    
    }
}