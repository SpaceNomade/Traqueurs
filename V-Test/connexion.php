<?php
session_start();

 $bdd =new PDO('mysql:host=localhost; dbname=traqueurs; charset=utf8','root','');
 if(!$bdd){
    echo "Erreur de connexion à la base de données.";
}

else {

   if(!empty($_POST['emailconnect']) AND !empty($_POST['mdpconnect'])) {

   $emailconnect = htmlspecialchars($_POST['emailconnect']);
   $mdpc = htmlspecialchars($_POST['mdpconnect']);
   $mdpconnect = password_hash($mdpc,PASSWORD_DEFAULT);
      $requser = $bdd->prepare("SELECT utilisateur.email,utilisateur.mdp FROM utilisateur WHERE email = :emailconnect AND mdp = :mdpconnect");
      $requser->bindParam(":emailconnect",$emailconnect,PDO::PARAM_STR);
      $requser->bindParam(":mdpconnect",$mdpconnect,PDO::PARAM_STR);
      $requser->execute();
      $reqpwd = $bdd->prepare("SELECT mdp FROM utilisateur WHERE email = :emailconnect");
      $tabuser = $reqpwd->fetch();
      $hash = $tabuser['mdp'];
      $verifmdp = password_verify($mdpconnect,$hash);
      $userexist = $requser->rowCount();
      if($verifmdp && $userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['nom'] = $userinfo['nom'];
         $_SESSION['email'] = $userinfo['email'];
         header("Location: profil.php?id=".$_SESSION['id']);
      } else {
         $erreur = "Mauvais mail ou mot de passe !";
      }
   } else {
      $erreur = "Tous les champs doivent être remplis !";
   }
}

?>
<html>
   <head>
      <title>Traqueurs</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div align="center">
         <h2>Connexion</h2>
         <br /><br />
         <form method="POST" action="profil.php">
            <input type="email" name="emailconnect" placeholder="Mail" />
            <input type="password" name="mdpconnect" placeholder="Mot de passe" />
            <br /><br />
            <input type="submit" name="formconnexion" value="Se connecter !" />
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>
   </body>
</html>