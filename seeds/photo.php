<?php
//recupere la librairie
require __DIR__ . "/../vendor/autoload.php";
// recupere le fichier connexion bdd
require __DIR__ . "/../db.php";

echo "Demarrage du programme \n";
$faker = Faker\Factory::create('fr_FR');


for ($i = 0; $i < 1000; $i++) {


    $id_reservation = $faker->numberBetween($min = 0, $max = 230);
    $date_prise = $faker->date('Y-m-d');
    $url = "2.jpg";
    $estAime = $faker->numberBetween($min = 0, $max = 1);


    // tableau des divers informations
    $photo = [
        ':id_reservation' => $id_reservation,
        ':date_prise' => $date_prise,
        ':url' => $url,
        ':estAime' => $estAime,

    ];
    // Requete Insert
    $requeteInsert = $bdd->prepare('INSERT INTO photos (id_reservation, date_prise, url, estAime) 
                                              values (:id_reservation, :date_prise, :url, :estAime)');
    // execute requete
    $requeteInsert->execute($photo);
}

echo "Fin du programme \n";
