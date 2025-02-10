<?php
    $categorie = $result["data"]['categorie']; 
    $topics = $result["data"]['topics']; 
?>

<h1>Liste des topics dans la catégorie : <?= $categorie->getNomCategorie() ?></h1>


<?php 
if (empty($topics)) { ?>
   
<?php } else { ?>
   
<?php foreach($topics as $topic ){ ?>
    <p><a href="index.php?ctrl=forum&action=listPostsByTopics&id="><?= $topic ?></a> par <?= $topic->getUtilisateur() ?> le <?=(new DateTime($topic->getDateCreation()))->format('d/m/Y H:i')?></p>
<?php } ?>
<?php } ?>






<div class="form">
<form action="index.php?ctrl=forum&action=addTopicToCategorie&id=1" method="POST">

<label for="titre">Titre </label>
    <input type="text" id="titre" name="titre" placeholder="Titre" required>
    <br>

<label for="post">Topic : </label>
    <textarea id="post" name="post" placeholder="Sujet" required></textarea>
    <br>

    <button type="submit" name="submit">Ajouter le topic</button>


</form>