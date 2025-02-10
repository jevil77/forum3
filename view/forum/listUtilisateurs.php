




<?php
    $utilisateurs = $result["data"]['utilisateurs']; 
    //var_dump($utilisateurs);
    if (isset($_SESSION["message"])) {
        echo "<p>" . $_SESSION["message"] . "</p>";}
?>



<?php 
if (empty($utilisateurs)) { ?>
   
<?php } else { ?>

  


<?php foreach($utilisateurs as $utilisateur ){ ?>
    <p><a href="index.php?ctrl=forum&action=infosUtilisateurs&id=<?=$utilisateur->getId()?>"><?= $utilisateur->getPseudo()?></p>
<?php } ?>
<?php } ?>