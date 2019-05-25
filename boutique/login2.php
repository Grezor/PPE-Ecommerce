
<?php
require '../inc/functions.php';
if(!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])){
    require_once '../inc/db.php';
    $req = $pdo->prepare('SELECT * FROM users WHERE (username = :username OR email = :username) AND confirmed_at IS NOT NULL');
    $req->execute(['username' => $_POST['username']]);
    $user = $req->fetch();
    if($user == null){
        $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
    }elseif(password_verify($_POST['password'], $user->password)){
        session_start();
        $_SESSION['auth'] = $user;
        $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';
        header('Location: account2.php');
        exit();
    }else{
        $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
    }
}

?>
<?php require 'header.php'; ?>
<h1>Se connecter</h1>
<div class="container">




<form action="" method="post">
    <div class="form-group">
        <label for="">pseudo ou email</label>
        <input type="text" name="username" class="form-control">
    </div>


    <div class="form-group">
        <label for="">mot de passe <a href="forget.php">Mot de passe oublié</a></label>
        <input type="password" name="password" class="form-control">
    </div>


    <button type="submit" class="btn btn-primary">Se connecter</button>
    <a href="register2.php">register</a>
</form>
<?php if(!empty($errors)): ?>
<div class="alert alert-danger">
    <p>Vous n'avez pas rempli le formulaire correctement</p>
    <ul>
        <?php foreach($errors as $error): ?>
           <li><?= $error; ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>
</div>
<?php require 'footer.php'; ?>


