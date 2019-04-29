# Choptaphoto
Site Vitrine + Site Ecommerce 

## Présentation du projet: 

La société « ChopTaPhoto » est une société de location de borne photo travaillant principalement dans le Nord. Elle propose ses services auprès de particulier et entreprise, afin de répondre à des événements de type mariage, anniversaire, journée d’intégration, salon, conférences, événements ….  

## Base de donnée : 'ppe1719'
- Reservations 
- Panier 
- Users 
- Produits 
- Photos

## Schéma d'infrastructure :
en cours 
## Diagramme de cas d'usage :
- Un client qui se connecte est capable de voir les produits, les ajouter au panier et affin de valider sa commande. 
- Il doit s'inscrire ou se connecter. 
- Une fois connecté, il est capable de modifier sont compte, faire des réservations, les modifier.
- Voir les photos liées a la réservation, aimer ou non, valider les photos et de les supprimer   

## Trello:
<https://trello.com/b/fUqy4Kvj>

## Contrainte de l'environnement :
## Repertoire Seeds:
ce répertoire permet de crée de fausses données en base de données, ce qui permet de faire des tests.
- librairie github : <https://github.com/fzaninotto/Faker>
- Installation : composer require fzaninotto/faker
- creation dossier seed 
    ```php
    <?php
    //recupere la librairie
    require __DIR__ . "/../vendor/autoload.php";
    // recupere le fichier connexion bdd
    require __DIR__ . "/../db.php";  
    // création des données en (Français)
    $faker = Faker\Factory::create('fr_FR');
  ```
- plus d'infos dans le dossier "seeds"
- executer ce fichier dans un terminal > php seeds\product.php
- ensuite vérifier la base de donnée. 


## Maildev : 
- MailDev est un serveur SMTP couplé à une interface Web (franchement jolie qui plus est) qui intercepte les emails émanant de votre serveur Web afin de les visualiser et les tester. Les emails interceptés n’étant pas délivrés, vous n’aurez plus à modifier les adresses de destinataires lors de vos tests.
- <https://blog.juansorroche.com/memo-maildev>

