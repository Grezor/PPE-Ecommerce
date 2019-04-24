<?php
//recupere la librairie
require __DIR__ . "/../vendor/autoload.php";
// recupere le fichier connexion bdd
require __DIR__ . "/../db.php";

echo "START DU PROGRAMME - RESERVATION \n";
$faker = Faker\Factory::create('fr_FR');


for ($i = 0; $i < 10; $i++) {
    // nom aléatoire

    $id_users = $faker->numberBetween($min = 1, $max = 10);
    $forfait = $faker->numberBetween($min = 1, $max = 10);
    $likes = $faker->numberBetween($min = 1, $max = 10);
    $id_borne = $faker->numberBetween($min = 1, $max = 10);
    $code_event = $faker->text(5);
    // tableau des champs que l'on souahite
    $user = [

        ':id_users' => $id_users,
        ':forfait' => $forfait,
        ':likes' => $likes,
        ':id_borne' => $id_borne,
        ':code_event' => $code_event,
    ];

    // Requete Insert
    $requeteInsert = $bdd->prepare('INSERT INTO `reservations`(`id_users`, `forfait`, `likes`, `id_borne`, `date_beg`, `date_end`, `code_event`) 
                                              VALUES (:id_users,:forfait,:likes,:id_borne,:date_beg,:date_end,:code_event)');
}

echo "Fin du programme - RESERVATION \n";