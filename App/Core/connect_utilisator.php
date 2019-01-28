<?php

if(isset($_POST["user"]) && !empty($_POST["user"]) && isset($_POST["password"]) && !empty($_POST["password"])){
// On vérifie ici si les champs sont bien remplis, postés et on les sécurise
$user = htmlspecialchars($_POST["user"], ENT_QUOTES, "ISO-8859-1");
$password = htmlspecialchars($_POST["password"], ENT_QUOTES, "ISO-8859-1");
}
// Connection à la base de donnée
$pdo = new PDO("mysql:host=localhost; dbname=traqueurs; charset=utf8", "root", "");
// On vérifie que la connection fonctionne correctement
if(!$pdo){
    echo "Erreur lors de la connexion à la base de donnée.";
}

else{
    $stat = $pdo->prepare ("SELECT statut From user WHERE user.email = :user");
    $stat->bindParam(":user", $user, PDO::PARAM_STR);
    $stat->execute();
    $statu = $stat->fetch();
    $statut = $statu ["statut"];
// Ici, on encapsule différentes variables dans les autres, du coup, c'est pour quoi on trouve statut qui englobe statu et qui englobe stat. On reprends ici juste le mot statut que l'on coupe. 
    $req = $pdo->prepare("SELECT mdp FROM utilisateur WHERE user.email = :user");
    $req->bindParam("user", $user, PDO::PARAM_STR);
    $req->execute();
    $hash = $req->fetch();
    $texthash = $hash ["mdp"];
    $pwd = password_verify($password,$texthash);

    $nam = $pdo->prepare("SELECT nom FROM user WHERE user.email = :user");
    $nam->bindParam("user", $user, PDO::PARAM_STR);
    $nam->execute();
    $name = $nam->fetch();
    $nom = $name["nom"];    
}