<?php

include '../db.php';
//insert information for register
    
    //$_POST['infos'] = (object) array('prenom'  => 'bonjour' , 'email' => 'coucou2@gmail.com' , "password" => "coucou" , "confirmPwd" => "coucou");
    //$obj = (object) array('1' => 'foo');
    if(isset($_POST['infos'])){

        $infos = json_decode($_POST['infos']);

        $username = $infos->nom;
        //$lname = $infos->nom;
        //$address = $infos->adresse;
        //$city = $infos->ville;
        //$pin = $_POST["pin"];
        $email = $infos->email;
        $password = $infos->password;

        $confirm = $infos->confirmPwd;

        if ($password == $confirm) {

            $password = md5($password);

            $req = "
INSERT INTO `users` (`id`, `username`, `email`, `password`, `confirmation_token`, `confirmed_at`, `reset_token`, `reset_at`, `roles` , `role_id`) VALUES (NULL, '".$username."', '".$email."', '".$password."', NULL, NULL, NULL, NULL, 'menber' ,'1');";

            if($bdd->query
                ($req)){
                echo "vous êtes maintenant enregistré";
            }else{
                echo "une erreur est survenue2";
                echo "<br>".$req;
            }
        }


    }else {

        echo "Une erreur est survenue";
    }


?>
