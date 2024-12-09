<?php
namespace App\Controllers;

use App\Core\User as U;
use App\Core\View;
use App\Core\SQL;

class User
{
    public function register(): void
    {
        $error = [];

        $firstname = isset($_POST["firstname"]) ? $_POST["firstname"] : "";
        $lastname = isset($_POST["lastname"]) ? $_POST["lastname"] : "";
        $email = isset($_POST["email"]) ? $_POST["email"] : "";
        $password = isset($_POST["password"]) ? $_POST["password"] : "";
        $passwordConfirm = isset($_POST["passwordConfirm"]) ? $_POST["passwordConfirm"] : "";
        $country = isset($_POST["country"]) ? $_POST["country"] : "";

        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])){

            $firstname = ucwords(strtolower(trim($_POST["firstname"])));

            if(empty($firstname)){
                $error["firstname"] = "Le prénom est obligatoire";
            } else {
                $len = strlen($firstname);
                if($len < 2 || $len > 30){
                    $error["firstname"] = "Le prénom doit contenir entre 2 et 30 caractères";
                }
            }

            $lastname = strtoupper(trim($_POST["lastname"]));

            if(empty($lastname)){
                $error["lastname"] = "Le nom est obligatoire";
            } else {
                $len = strlen($lastname);
                if($len < 2 || $len > 30){
                    $error["lastname"] = "Le nom doit contenir entre 2 et 30 caractères";
                }
            }

            $email = strtolower(trim($_POST["email"]));

            if(empty($email)){
                $error["email"] = "L'email est obligatoire";
            } else {
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $error["email"] = "L'email n'est pas valide";
                } else {
                    $len = strlen($email);
                    if($len > 255){
                        $error["email"] = "L'email est trop longue";
                    }
                }
            }

            $password = $_POST["password"];

            if(empty($password)){
                $error["password"] = "Le mot de passe est obligatoire";
            }

            $passwordConfirm = $_POST["passwordConfirm"];

            if(empty($passwordConfirm)){
                $error["passwordConfirm"] = "La confirmation du mot de passe est obligatoire";
            } else {
                if($password != $passwordConfirm){
                    $error["passwordConfirm"] = "Les mots de passe ne correspondent pas";
                }
            }

            $country = $_POST["country"];

            if(empty($country)){
                $error["country"] = "Le pays est obligatoire";
            }

            if(empty($error)){
                $sql = new SQL;
                $userExist = $sql->getUserByEmail($email);

                if($userExist){
                    $error["email"] = "Cet email est déjà utilisé";
                } else {
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $sql->insertUser($firstname, $lastname, $email, $password, $country);
                    header("Location: /");
                }
            }
        }

        $view = new View("User/register.php", "front.php");
        $view->addData("title", 'Inscription');
        $view->addData("description", "Page d'inscription' de mon site");
        $view->addData("error", $error);
        $view->addData("credentials", [
            "firstname" => $firstname,
            "lastname" => $lastname,
            "email" => $email,
            "country" => $country
        ]);
    }

    public function login(): void
    {
        $view = new View("User/login.php", "front.php");
        //echo $view;
    }


    public function logout(): void
    {
        $user = new U;
        $user->logout();
        //header("Location: /");
    }



}

