<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategorieManager;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;
use Model\Managers\UtilisateurManager;

class ForumController extends AbstractController implements ControllerInterface{

    public function index() {
        
        // créer une nouvelle instance de CategoryManager
        $categorieManager = new CategorieManager();
        // récupérer la liste de toutes les catégories grâce à la méthode findAll de Manager.php (triés par nom)
        $categories = $categorieManager->findAll(["nomCategorie", "DESC"]);

        // le controller communique avec la vue "listCategories" (view) pour lui envoyer la liste des catégories (data)
        return [
            "view" => VIEW_DIR."forum/listCategories.php",
            "meta_description" => "Liste des catégories du forum",
            "data" => [
                "categories" => $categories
            ]
        ];
    }

    public function listTopicsByCategory($id) {

        $topicManager = new TopicManager();
        $categorieManager = new CategorieManager();
        $categorie = $categorieManager->findOneById($id);
        $topics = $topicManager->findTopicsByCategory($id);

        return [
            "view" => VIEW_DIR."forum/listTopics.php",
            "meta_description" => "Liste des topics par catégorie : ".$categorie,
            "data" => [
                "categorie" => $categorie,
                "topics" => $topics
            ]
        ];
    }


    public function listPostsByTopics($id) {

            $postManager = new PostManager();
            $topicManager = new TopicManager();
            $posts = $postManager->findPostsByTopics($id);
            $topics = $topicManager->findOneById($id);
            
    
            
           
    
            return [
                "view" => VIEW_DIR."forum/listPostsByTopics.php",
                "meta_description" => "Liste des posts par topic : ".$topics,
                "data" => [
                    "topics" => $topics,
                    "posts" => $posts
                ]
            ];
            var_dump($post);
        }



    // public function listUtilisateurForm(){

    //     return [
    //         "view" => VIEW_DIR."forum/form/listUtilisateurForm.php",
    //         "meta_description" => "Liste des utilisateurs du forum",
         
    //     ];

        



    // }


     public function listUtilisateurs() {

        $utilisateurManager = new utilisateurManager();
        $utilisateurs = $utilisateurManager->findAll();

        return [
            "view" => VIEW_DIR."forum/listUtilisateurs.php",
            "meta_description" => "Liste des utilisateurs :",
            "data" => [
                
                "utilisateurs" => $utilisateurs,
                
            ]
        ];

  }




    // public function infosUtilisateur($id){


    //     $utilisateurManager = new utilisateurManager();
    //     $utilisateurs = $utilisateurManager->findAll();


    //     return [
    //         "view" => VIEW_DIR."forum/infosUtilisateurs.php",
    //         "meta_description" => " Infos Utilisateurs:",
    //         "data" => [
                
    //             "utilisateurs" => $utilisateurs,
                
    //         ]
    //     ];
    // }


    public function infosUtilisateurs($id){
        
        $utilisateurManager = new utilisateurManager();
        $utilisateur = $utilisateurManager->findOneById($id);
  
        return [
            "view" => VIEW_DIR."forum/infosUtilisateurs.php",
            "meta_description" => " Infos Utilisateurs:",
            "data" => [
                
                "utilisateur" => $utilisateur,
            
            ]
        ];
    }

    public function addCategorieForm(){

        return [
            "view" => VIEW_DIR."forum/form/addCategorieForm.php",
            "meta_description" => "Liste des catégories du forum",
         
        ];


    }

            // $categorieManager = new CategorieManager();

            
      public function addCategorie(){

        if(isset($_POST['submit'])) {
                  
            $categorieManager = new CategorieManager();
               $categorie = $categorieManager->findAll(["nomCategorie"]);


               $nomCategorie = filter_input(INPUT_POST, "nomCategorie", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               
               $data = ['nomCategorie'=> $nomCategorie];

               $categorieManager->add($data);
            
            }   
    
         header("Location: index.php?ctrl=forum&action=index");


    }        



   
     public function addTopicToCategorie($id){


        


        if(isset($_POST['submit'])){

             $topicManager = new TopicManager();
             $postManager = new PostManager();

            

            $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $topicPost = filter_input(INPUT_POST, "post", FILTER_SANITIZE_FULL_SPECIAL_CHARS);            
            

         
             if ($titre && $topicPost) {
            
            $data = [
                'titre' => $titre,
                'dateCreation' => date("Y-m-d H:i:s"),
                'categorie_id' => $id ,
                'utilisateur_id' => App\Session::getUtilisateur()
            ];
            //var_dump($id, $titre);
            
        
             $topicId = $topicManager->add($data); 

             if ($topicId) {
                $dataPost = [
                    'texte' => $topicPost,
                     'dateCreation' => date("Y-m-d H:i:s"),
                    'topic_id' => $topicId
                ];
                 $postManager->add($dataPost);    
                
                }
             
                // var_dump($id, $titre,$dataPost);
                // exit;

        }
        header("Location: index.php?ctrl=forum&action=listPostsByTopics&id=$id");
        
 //var_dump($id, $titre,$dataPost);
            
 }
}



public function addPostToTopic($id){



    if(isset($_POST['submit'])){
       
       
        
         $postManager = new PostManager();
        


         $texte = filter_input(INPUT_POST, "texte", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
         var_dump($texte);
         

         if($texte){
           
            $postManager->add([
                "texte" => $texte,
                'topic_id'=> $id,
                'utilisateur_id' => 1
                
            ]);
         }

         var_dump($id);
         

          header("Location: index.php?ctrl=forum&action=listPostsByTopics&id=$id");
          exit;



    }


}

 










}










    





    





