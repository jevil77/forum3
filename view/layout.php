<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?= $meta_description ?>">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://cdn.tiny.cloud/1/zg3mwraazn1b2ezih16je1tc6z7gwp5yd4pod06ae5uai8pa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
        <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=home" />
        <style>
.navbar a {
    color: white !important;
}
</style>

        <title>FORUM</title>
    </head>
    <body>
        <div id="wrapper"> 

        
 <!-- <?php

var_dump($_SESSION['utilisateur']);
 
?>  -->
           <?php if (isset($_SESSION["message"])) {
            echo "<p>" . $_SESSION["message"] . "</p>";} ?>

            <div id="mainpage">
                <!-- c'est ici que les messages (erreur ou succès) s'affichent-->
                <h3 class="message" style="color: red"><?= App\Session::getFlash("error") ?></h3>
                <h3 class="message" style="color: green"><?= App\Session::getFlash("success") ?></h3>
                <header>
                    <nav class="navbar a">
                        <div id="nav-left">
                            <a href="/">Accueil</a>
                            <?php
                            if(App\Session::isAdmin()){
                                ?>
                                <a href="index.php?ctrl=home&action=users">Voir la liste des gens</a>
                            <?php } ?>
                        </div>
                        <div id="nav-right">
                        <?php
                            // si l'utilisateur est connecté 
                            if(App\Session::getUtilisateur()){
                                ?>
                                <a href="index.php?ctrl=security&action=profile"><span class="fas fa-user"></span>&nbsp;<?= App\Session::getUtilisateur()?></a>
                                <a href="index.php?ctrl=security&action=logout">Déconnexion</a>
                                
                                <?php
                            }
                            else{
                                ?>
                                <a href="index.php?ctrl=security&action=loginForm">Connexion</a>
                                <a href="index.php?ctrl=security&action=registerForm">Inscription</a>
                                <a href="index.php?ctrl=forum&action=index">Catégories</a>
                               

                               
                            <?php
                            }
                        ?>
                        </div>
                        <a href="index.php?ctrl=forum&action=listUtilisateurs">Liste des utilisateurs</a>
                        <a href="index.php?action=homePage"><span class="material-symbols-outlined" style="color:white;">home</span></a>


                   
                    </nav>
                    

                </header>
                
                <main id="forum">
                    <?= $page ?>
                </main>
            </div>
            <footer>
                <div class="footer">
                   <p>&copy; <?= date_create("now")->format("Y") ?> - <a href="#">Règlement du forum</a> - <a href="#">Mentions légales</a></p>
                   <div class="footer-icons"><p>Suivez-nous</p><i class="fa-brands fa-facebook fa-lg" style="color: #a7a8aa;"></i>
                   <i class="fa-brands fa-instagram fa-lg" style="color: #a7a8aa;"></i></div>
                </div>
                
            </footer>
        </div>
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
        </script>
        <script>
            $(document).ready(function(){
                $(".message").each(function(){
                    if($(this).text().length > 0){
                        $(this).slideDown(500, function(){
                            $(this).delay(3000).slideUp(500)
                        })
                    }
                })
                $(".delete-btn").on("click", function(){
                    return confirm("Etes-vous sûr de vouloir supprimer?")
                })
                tinymce.init({
                    selector: '.post',
                    menubar: false,
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table paste code help wordcount'
                    ],
                    toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                    content_css: '//www.tiny.cloud/css/codepen.min.css'
                });
            })
        </script>
        <script src="<?= PUBLIC_DIR ?>/js/script.js"></script>
    </body>
</html>