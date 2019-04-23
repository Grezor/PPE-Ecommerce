<?php
//recupere la librairie
require __DIR__ . "/../vendor/autoload.php";
// recupere le fichier connexion bdd
require __DIR__ . "/../db.php";

 echo "Demarrage du programme \n";
$faker = Faker\Factory::create('fr_FR');



for ($i = 0; $i < 200; $i++){
    // nom aléatoire
    $name = $faker->firstName;

    // tableau des champs que l'on souahite
    $user = [
        ':username' =>$name,
        ':email' => "{$name}@gmail.com",
        ':password' => password_hash('123456789', PASSWORD_DEFAULT, ['cost' =>12])
    ];

    // Requete Insert
    $requeteInsert = $bdd ->prepare('INSERT INTO users (username, email, password)
                                              values (:username, :email, :password)');

    // execute requete
    $requeteInsert->execute($user);
}

echo "Fin du programme \n";