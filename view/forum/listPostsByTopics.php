<?php
    $topic = $result["data"]['topics']; 
    $posts = $result["data"]['posts']; 
?>



<h1>Liste des posts par topics</h1>


<?php 
if (empty($posts)) { ?>
    <p>Aucun post dans ce topic !</p>
<?php } else { ?>

<?php foreach($posts as $post ){ ?>
    <p><a href="#"><?= $post->getTexte()?></a> par <?= $post->getUtilisateur() ?> le <?=(new DateTime($post->getDateCreation()))->format('d/m/Y H:i')?></p>
<?php } ?>
<?php } ?>







<div class="form">
<form action="index.php?ctrl=forum&action=addPostToTopic&id=<?= $topic->getId() ?>" method="POST">


    <label for="post">Post :</label>
    <textarea id="texte" name="texte" placeholder="Commentaires" required></textarea>
    <br>

    <button type="submit" name="submit">Ajouter le Commentaire</button>
</form>
 



