<?php


$bdd =new PDO('mysql:host=localhost; dbname=traqueurs; charset=utf8','root','');

//on vérifie que la connexion s'effectue correctement
if(!$bdd){
    echo "Erreur de connexion à la base de données.";
} 
else {

if(isset($_POST['forminscription'])) {
   $nom = htmlspecialchars($_POST['nom']);
   $email = htmlspecialchars($_POST['email']);
   // $email2 = htmlspecialchars($_POST['email2']);
   $mdp = htmlspecialchars($_POST['mdp']);
   $mdp2 = htmlspecialchars($_POST['mdp2']);
   $hash = password_hash($mdp,PASSWORD_DEFAULT);
   $hash2 =password_hash($mdp2,PASSWORD_DEFAULT);
   if(!empty($_POST['nom']) AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
      $pseudolength = strlen($nom);
      if($pseudolength <= 40) {
         if($email == $email2) {
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
               $reqmail = $bdd->prepare("SELECT * FROM utilisateur WHERE email = ?");
               $reqmail->execute(array($email));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
                  if($mdp == $mdp2) {
                     $insertmbr = $bdd->prepare("INSERT INTO utilisateur(nom, email, mdp) VALUES(:nom, :email, :mdp)");
                     $insertmbr->bindParam(":nom",$nom,PDO::PARAM_STR);
                     $insertmbr->bindParam(":email",$email,PDO::PARAM_STR);
                     $insertmbr->bindParam(":mdp",$hash,PDO::PARAM_STR);
                     $insertmbr->execute();
                     $lastId = $bdd->lastInsertId();
                     $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                     header('Location: profil.php?id='.$lastId);
                  } else {
                     echo ($erreur = "Vos mots de passes ne correspondent pas !");
                  }
               } else {
                 echo ($erreur = "Adresse mail déjà utilisée !");
               }
            } else {
              echo ($erreur = "Votre adresse mail n'est pas valide !");
            }
         } else {
           echo ($erreur = "Vos adresses mail ne correspondent pas !");
         }
      } else {
        echo ($erreur = "Votre pseudo ne doit pas dépasser 255 caractères !");
      }
   } else {
     echo ($erreur = "Tous les champs doivent être complétés !");
   }
}
}
?>