<?php

function getPdo()
{
//    $vcap_services = json_decode($_ENV['VCAP_SERVICES'], true);
//    $uri = $vcap_services['compose-for-mysql'][0]['credentials']['uri'];
//    $db_creds = parse_url($uri);
//    $dbname = "id9727338_ppe1719";
//
//    $dsn = "mysql:host=" . $db_creds['host'] . ";port=" . $db_creds['port'] . ";dbname=" . $dbname;
//    $dbh = new PDO($dsn, $db_creds['user'], $db_creds['pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
//    return $dbh;


    $serveur="localhost";
    $mot_de_passe="";
    $base_de_donnees="api";
    $login="geoffrey";


    // Connexion à MySQL avec PDO
try{
   $pdo = new PDO('mysql:host='.$serveur.';dbname='.$base_de_donnees, $login, $mot_de_passe);
}

// En cas d'erreur de connexion à MySQL,
// on "attrape" l'erreur avec l'objet PDOException dans le bloc catch
catch(PDOException $error){
   echo $error->getCode().' '.$error->getMessage();
}
    return($pdo);
}    

?>
