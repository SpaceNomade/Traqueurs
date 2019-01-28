<?php
session_start();

$bdd =new PDO('mysql:host=localhost; dbname=traqueurs; charset=utf8','root','');

$reponse = $bdd->query('SELECT arme.classification, arme.valeur_ph, arme.valeur_mg, arme.portee, arme.dot, arme.special FROM arme');

while ($donnees = $reponse->fetch())

{

?>

    <p>
    <strong>Arme</strong> : <?php echo $donnees['classification']; ?><br />
    Cette arme est un(e) <?php echo $donnees['classification']; ?>, elle inflige <?php echo $donnees['valeur_ph']; ?> de dégâts physique ainsi que <?php echo $donnees['valeur_mg']; ?> !<br />
    Soit c'est une arme de corps à corps soit elle a  <?php echo $donnees['portee'] ?> mètre de portée. Elle inflige <?php echo $donnees['dot']; ?> de dégâts sur le temps. <br />
    Avec cette arme, vous pouvez <?php echo $donnees['special']; ?>. </em>
   </p>


<?php
}
?>