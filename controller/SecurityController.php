<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UtilisateurManager;

class SecurityController extends AbstractController{
    // contiendra les méthodes liées à l'authentification : register, login et logout



    public function registerForm(){

        return [
            "view" => VIEW_DIR."security/register.php",
            "meta_description" => "Formulaire d'inscription"
         
        ];


    }



    public function register () {

        
        
        if(isset($_POST["submit"])) {
            
        
               $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               $mail = filter_input(INPUT_POST, "mail", FILTER_VALIDATE_EMAIL);
               $pseudo = filter_input(INPUT_POST, "pseudo", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               $password_confirm = filter_input(INPUT_POST, "password_confirm", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
               $role = filter_input(INPUT_POST, "role", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        
        
        
            if($nom && $prenom && $mail && $pseudo && $password && $password_confirm && $role) {
            
     
               $utilisateurManager = new UtilisateurManager();
            
               $utilisateur = $utilisateurManager->findOneByEmail($mail);
       
            
            
             
                if ($utilisateur) {
                    //echo "Un compte avec cet email existe déjà.";

                    $this->redirectTo("security", "loginForm");
                    exit;
                
                } else {
                    
                    if($password == $password_confirm && strlen($password) >= 5) {
                    
                
                
                    $utilisateurManager->add([
                        "nom" => $nom,
                        "prenom" => $prenom,
                        "mail" => $mail,
                        "pseudo" => $pseudo,
                        "password" => password_hash($password, PASSWORD_DEFAULT),
                        "role" => $role
                     ]);
                    
                

                    
                    
                    
                    }
                     $this->redirectTo("security", "loginForm");
                     exit;

                        
        
                }

                         
            }

        }

    }               
            
    public function loginForm() {

            return [
            "view" => VIEW_DIR."security/login.php",
            "meta_description" => "Page de connexion"
         
            ];

        }


            public function login(){

                if(isset($_POST["submit"])) {
               

                        $utilisateurManager = new UtilisateurManager();
                        //var_dump("hello"); die;
                        $mail = filter_input(INPUT_POST, "email", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                        // var_dump($mail,$password);die;


                        if($mail && $password) {

                           $utilisateur = $utilisateurManager->findOneByEmail($mail);
                    
                           if($utilisateur){
                        
                                $hash = $utilisateur->getPassword();
                    

                    

                                if(password_verify($password, $hash)){
 
                                 $_SESSION["utilisateur"] = $utilisateur;
                                 $_SESSION["message"] = "Bienvenue ! ";
                                 // $_SESSION["utilisateur"] = $utilisateur;
                                 $this->redirectTo( "home","listUtilisateurs");
                                 var_dump($_SESSION);
                                 
                                
                                
                          
                                       
                                }   else {

                                        echo "Un problème est survenu";
                                        // $this->redirectTo("security", "login");
                                         
                                }    
                            
                            
                            }
                        
                        
                        }
                    
                
    
               



                }



            

       
            }





    public function logout () {

            unset($_SESSION["utilisateur"]);

            $this->redirectTo("home");

         
    }

}
    
        






    
    
 