<?php
    $categories = $result["data"]['categories']; 
?>

<h1>Liste des catégories</h1>

<?php
foreach($categories as $categorie){ ?>
    <p><a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $categorie->getId() ?>"><?= $categorie->getNomCategorie() ?></a></p>
<?php } ?>


<a href="index.php?ctrl=forum&action=addCategorieForm">Ajouter une Catégorie</a>
    