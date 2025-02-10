<?php
    $utilisateur = $result["data"]['utilisateur']; 
    // var_dump('hello');
    var_dump($result["data"]['utilisateur']);
?>




<?php  { ?>




    <p><a href="index.php?ctrl=forum&action=infosUtilisateurs&id"><?= ($utilisateur->getId()."".$utilisateur->getNom()."   ". $utilisateur->getPrenom()."  ". $utilisateur->getMail()."  ".$utilisateur->getPseudo()."  ".$utilisateur->getRole())?></a></p>

<?php } ?>