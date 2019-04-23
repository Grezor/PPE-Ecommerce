<?php
//recupere la librairie
require __DIR__ . "/../vendor/autoload.php";
// recupere le fichier connexion bdd
require __DIR__ . "/../db.php";

 echo "START DU PROGRAMME - RESERVATION \n";
$faker = Faker\Factory::create('fr_FR');

for ($i = 0; $i < 50; $i++) {
    $forfait = $faker->numberBetween($min = 1, $max = 25);
    $likes = $faker->numberBetween($min = 0, $max = 1);
    $date_deg =$faker->dateTime($max = 'now', $timezone = null);
    $date_end = $faker->dateTime($max = 'now', $timezone = null);
    $code_event = $faker->firstName;

    // tableau des champs que l'on souahite
    $reserv = [
        ':forfait' => $forfait,
        ':likes' => $likes,
        ':date_deg' => $date_deg,
        ':date_end' => $date_end,
        ':code_event' =>$code_event,
    ];
    // Requete Insert
    $requeteInsert = $bdd->prepare('INSERT INTO reservations (forfait, likes, date_beg, date_end, code_event) 
                                              values (:forfait, :likes, :date_deg, :date_end, :code_event)');
    // execute requete
    $requeteInsert->execute($reserv);
}

echo "Fin du programme - RESERVATION \n";