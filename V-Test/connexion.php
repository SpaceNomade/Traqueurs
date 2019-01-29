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

      die(var_dump($mdpconnect,$emailconnect));

      $requser = $bdd->prepare("SELECT utilisateur.email,utilisateur.mdp FROM utilisateur WHERE email = :emailconnect AND mdp = :mdpconnect");
      $requser->bindParam(":emailconnect",$emailconnect,PDO::PARAM_STR);
      $requser->bindParam(":mdpconnect",$mdpconnect,PDO::PARAM_STR);
      $requser->execute();
      $user = $requser->fetch(PDO::FETCH_ASSOC);

      // $reqpwd = $bdd->prepare("SELECT mdp FROM utilisateur WHERE email = :emailconnect");
      // $reqpwd->bindParam(":emailconnect",$emailconnect,PDO::PARAM_STR);
      // $reqpwd->execute();

      // $tabuser = $reqpwd->fetch();

      var_dump($user);
      $hash = $user['mdp'];
      $verifmdp = password_verify($mdpconnect,$hash);
      $userexist = $requser->rowCount();
      if($verifmdp && $userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['id'] = $userinfo['id'];
         $_SESSION['nom'] = $userinfo['nom'];
         $_SESSION['email'] = $userinfo['email'];
         header("Location: profil.php?id=".$userinfo['id']);
      } else {
         $erreur = "Mauvais mail ou mot de passe ! hkjhkh";
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
         <form method="POST" action="connexion.php">
            <input type="email" name="emailconnect" placeholder="Mail" />
            <input type="password" name="mdpconnect" placeholder="Mot de passe" />
            <br /><br />
            <button type="submit" name="formconnexion"> Se connecter</button>
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>
   </body>
</html>