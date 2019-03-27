<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
  if(session_id() == '' || !isset($_SESSION)){session_start();}
  include '../db.php';
  include 'header.php';
?>







<div class="container">
  <div class="row" style="margin-top:30px;">
    <div class="small-12">
      <?php
          $i=0;

          $product_id = array();
          $product_quantity = array();

          $result = $bdd->query('SELECT * FROM bornes');
          if($result === FALSE){
            die(mysql_error());
          }

          if($result){

            while($obj = $result->fetch()) {
              $ficheProduit = // on déclare la var qui prend la stucture du produit
                  '<div class="col-md-4">
                    <p>
                      <h3>'.$obj->name /* on ajoute les différente infos*/ .'</h3>
                    </p>
                    <br>

                    <img src="images/'.$obj->img_url.'" /><br><br>

                    <p>
                      <strong>Gamme de produit</strong>:'.$obj->code.'
                    </p>

                    <p>
                      <strong>Description</strong>:'.$obj->description.'
                    </p>

                    <p>
                      <strong>Disponible : </strong>:'.$obj->quantite.'
                    </p>

                    <p><strong>Prix: </strong>:
                      '.$obj->prix.' Euros !
                    </p>';

                  if($obj->quantite > 0){
                
                    $ficheProduit .= // on compléte la var avec le if / else 
                        '<p>
                          <a href="update-cart.php?action=add&id='.$obj->id.'">
                            <input type="submit" value="AJOUTER AU PANIER" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" />
                          </a>
                        </p>';

                  } else {
                    $ficheProduit .= '<p>Rupture de stock!</p><br>';

                  
                  }    
                  
                  $ficheProduit .= '</div>';
                
                  echo utf8_encode($ficheProduit); // on envoie la var dans le html
                  $i++;
            }

          }

          $_SESSION['product_id'] = $product_id;
                  
        ?>
      </div>
    </div>
</div>


<?php include("footer.php"); ?>




