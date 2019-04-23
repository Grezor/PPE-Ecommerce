<?php
//recupere la librairie
require __DIR__ . "/../vendor/autoload.php";
// recupere le fichier connexion bdd
require __DIR__ . "/../db.php";

echo "Demarrage du programme \n";
$faker = Faker\Factory::create('fr_FR');


for ($i = 0; $i < 10; $i++) {


//    $id_reservation = '7';
    $url = "http://lorempixel.com/400/200/";
    $estAime = $faker->numberBetween($min = 0, $max = 1);


    // tableau des divers informations
    $photo = [
//        ':id_reservation' => $id_reservation,
        ':url' => $url,
        ':estAime' => $estAime,

    ];
    // Requete Insert
    $requeteInsert = $bdd->prepare('INSERT INTO photos (id_reservation, url, estAime) 
                                              values (:id_reservation, :url, :estAime)');
    // execute requete
    $requeteInsert->execute($photo);
}

echo "Fin du programme \n";
