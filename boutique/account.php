<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  echo '<h1>Invalid Login! Redirecting...</h1>';
  header("Refresh: 3; url=index.php");
}

if($_SESSION["type"]==="admin") {
  header("location:admin.php");
}

include '../db.php';
include 'header.php';

?>

<div class="container">
    <div class="row" style="margin-top:30px;">
        <div class="col-sm-12">
            <p>
                <?php echo '<h3>Hi ' .$_SESSION['fname'] .'</h3>'; ?>
            </p>
            <br>
            <p>
                <h4>Votre Compte.</h4>
            </p>

            <p>Ici vous pourrez Modifier les differentes informations de votre compte.</p>
        </div>
    </div>


    <form method="POST" action="update.php" style="margin-top:30px;">
        <div class="row">
            <div class="col-sm-12">

                <div class="row">
                    <div class="small-3 columns">
                        <label for="right-label" class="right inline">Nom : </label>
                    </div>
                    <div class="col-sm-8">
                        <?php

                $result = $mysqli->query('SELECT * FROM users WHERE id='.$_SESSION['id']);

                if($result === FALSE){
                  die(mysql_error());
                }

                if($result) {
                  $obj = $result->fetch_object();
                  echo '<input type="text" id="right-label" placeholder="'. $obj->fname. '" name="fname">';

                  echo '</div>';
                    echo '</div>';

                  echo '<div class="row">';
                  echo '<div class="small-3 columns">';
                  echo '<label for="right-label" class="right inline">Prenom :</label>';
                  echo '</div>';
                  echo '<div class="small-8 columns end">';

                  echo '<input type="text" id="right-label" placeholder="'. $obj->lname. '" name="lname">';

                  echo '</div>';
                  echo '</div>';

                  echo '<div class="row">';
                  echo '<div class="small-3 columns">';
                  echo '<label for="right-label" class="right inline">Adresse :</label>';
                  echo '</div>';
                  echo '<div class="small-8 columns end">';
                  echo '<input type="text" id="right-label" placeholder="'. $obj->address. '" name="address">';



                  echo '</div>';
                  echo '</div>';

                  echo '<div class="row">';
                  echo '<div class="small-3 columns">';
                  echo '<label for="right-label" class="right inline">ville :</label>';
                  echo '</div>';
                  echo '<div class="small-8 columns end">';
                  echo '<input type="text" id="right-label" placeholder="'. $obj->city. '" name="city">';
                  echo '</div>';
                  echo '</div>';

                  echo '<div class="row">';
                  echo '<div class="small-3 columns">';
                  echo '<label for="right-label" class="right inline">Ciret :</label>';
                  echo '</div>';
                  echo '<div class="small-8 columns end">';

                  echo '<input type="text" id="right-label" placeholder="'. $obj->pin. '" name="pin">';

                  echo '</div>';
                  echo '</div>';

                  echo '<div class="row">';
                  echo '<div class="small-3 columns">';
                  echo '<label for="right-label" class="right inline">Email :</label>';
                  echo '</div>';

                  echo '<div class="small-8 columns end">';


                  echo '<input type="email" id="right-label" placeholder="'. $obj->email. '" name="email">';

                  echo '</div>';
                  echo '</div>';
              }



              echo '<div class="row">';
              echo '<div class="small-3 columns">';
              echo '<label for="right-label" class="right inline">Mot de passe :</label>';
              echo '</div>';
              echo '<div class="small-8 columns end">';
              echo '<input type="password" id="right-label" name="pwd">';

              echo '</div>';
              echo '</div>';
          ?>

                        <div class="row">
                            <div class="small-10 columns">

                            </div>
                            <div class="small-2 columns">
                                <input type="submit" id="right-label" value="Modier" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 12px;">

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
include 'footer.php';
?>
