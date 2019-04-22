<?php
//recupere la librairie
require __DIR__ . "/../vendor/autoload.php";
// recupere le fichier connexion bdd
require __DIR__ . "/../db.php";

echo "seeds start \n";
$faker = Faker\Factory::create('fr_FR');


for ($i = 0; $i < 10; $i++) {
    $name = $faker->firstName;
    $description = $faker->text(50);
    $prix = $faker->numberBetween(20, 2000);
    $img_url = "no_img.jpg";
    $promo = $faker->numberBetween($min = 1, $max = 90);
    $stock = $faker->numberBetween($min = 1, $max = 200);
    $code_article = $faker->numberBetween(20, 500000);
    // tableau des divers informations
    $product = [
        ':nom' => $name,
        ':description' => $description,
        ':prix' => $prix,
        ':img_url' => $img_url,
        ':promo' => $promo,
        ':stock' => $stock,
        ':code_article' => $code_article
    ];
    // Requete Insert
    $requeteInsert = $bdd->prepare('INSERT INTO produits (nom, description, prix, img_url, promo, stock, code_article) values (:nom, :description, :prix, :img_url, :promo, :stock, :code_article)');
    // execute requete
    $requeteInsert->execute($product);
}

echo "seeds finish \n";