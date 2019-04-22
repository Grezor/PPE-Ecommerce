<?php

include '../db.php';
session_start();
session_unset();
session_destroy();
session_start();
//insert information for register

//$obj = (object) array('1' => 'foo');
/* DEBUT VERIFICATION DE LA RECEPTION DE FORMULAIRE */
if (isset($_POST['infos'])) // CAS OU ON RECOIT LE FORMULAIRE
{
    $data = json_decode($_POST['infos']);
    $username = addslashes($data->nom); // VOIR index.php
    $passwd = $data->password; // stockage du MDP em md5

    $reqUsr = 'SELECT * FROM users WHERE username = "' . $username . '"'; // PREPARATION DE LA REQ

    if ($resultatReq = $bdd->query($reqUsr)) // SI LA REQUETE A FONCTIONNE
    {
        if ($usr = $resultatReq->fetch()) // SI J'ARRIVE A EXTRAIRE UN RESULTAT
        {
            // On verifie le mot de passeword avec la bdd
            if (password_verify($passwd, $usr->password)) {
                $_SESSION['id'] = $usr->id;
                $_SESSION['username'] = $usr->username;
                $_SESSION['mail'] = $usr->email;
                $_SESSION['password'] = $usr->password;
                $_SESSION['confirmation_token'] = $usr->confirmation_token;
                $_SESSION['confirmed_at'] = $usr->confirmed_at;
                $_SESSION['reset_token'] = $usr->reset_token;
                $_SESSION['roles'] = $usr->roles;

                // $_SESSION['role_id'] = $usr->role_id;

                echo "connected";
            } else {
                echo "Mot de passe incorrect";
            }
        } else {
            echo 'Utilisateur inconnu';
        }
    } else {
        echo "erreur dans la requete";
    }
}

/* FIN VERIFICATION DE LA RECEPTION DE FORMULAIRE */
?>
