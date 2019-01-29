<html>
   <head>
      <title>Traqueurs</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div align="center">
         <h2>Inscription</h2>
         <br /><br />
         <form method="POST" action="inscription.php">
            <table>
               <tr>
                  <td align="right">
                     <label for="nom">Insérer votre pseudo :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre pseudo" id="nom" name="nom" value="" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="email">Insérer votre email:</label>
                  </td>
                  <td>
                     <input type="email" placeholder="Votre mail" id="email" name="email" value=" " />
                  </td>
               </tr>
               <!-- <tr> -->
                  <!-- <td align="right"> -->
                     <!-- <label for="email2">Confirmation de votre email :</label> -->
                  <!-- </td> -->
                  <!-- <td> -->
                     <!-- <input type="email" placeholder="Confirmez votre mail" id="email2" name="email2" value=" " /> -->
                  <!-- </td> -->
               <!-- </tr> -->
               <tr>
                  <td align="right">
                     <label for="mdp"> Insérer votre mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="mdp2">Confirmation de votre mot de passe :</label>
                  </td>
                  <td>
                     <input type="password" placeholder="Confirmez votre mdp" id="mdp2" name="mdp2" />
                  </td>
               </tr>
               <tr>
                  <td></td>
                  <td align="center">
                     <br />
                     <input type="submit" name="forminscription" value="Je m'inscris" />
                  </td>
               </tr>
            </table>
         </form>
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
      </div>
   </body>
</html>