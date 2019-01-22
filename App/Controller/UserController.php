<?php
namespace App\Controller;

use App\Model\UserModel;

class UserController extends Controller {
  

public function verifier(){
    var_dump ($_POST);
    if(isset($_POST["user"]) && !empty($_POST["user"]) && isset($_POST["password"]) && !empty($_POST["password"])){
        $user = htmlspecialchars($_POST["user"], ENT_QUOTES, "ISO-8859-1");
        $password = htmlspecialchars($_POST["password"], ENT_QUOTES, "ISO-8859-1");
        header('Location: localhost/Projet_Traqueurs/public/profil');
        exit();
        }
    
    else{
        echo'Veuillez saisir vos identifiants car ils sont incorrects.';

    $user = UserModel::getUser($email);
}
}

public function form(){
    $this->render('connexion', []);
}


}