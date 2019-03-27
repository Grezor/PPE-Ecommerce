<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  header("location:index.php");
}

if($_SESSION["type"]!="admin") {
  header("location:index.php");
}

include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin || BOLT Sports Shop</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

    <?php
        include 'header.php';
    ?>


<div class="row" style="margin-top:10px;">
  <div class="large-12">
    <h3>Administration</h3>
    <?php
          $result = $mysqli->query("SELECT * from products order by id asc");
          if($result) {
            while($obj = $result->fetch_object()) {?>
    <div class="large-4 columns">
      <p>
        <h3>
          <?= $obj->product_name ?>
        </h3>
      </p>
      <img src="images/products/<?= $obj->product_img_name; ?>" />
      <p><strong>Product Code</strong>
        <?= $obj->product_code; ?>
      </p>
      <p><strong>Description</strong>
        <?= $obj->product_desc; ?>
      </p>
      <p><strong>Unités disponibles :</strong>
        <?= $obj->qty; ?>
      </p>
      <div class="large-6 columns" style="padding-left:0;">
        <form method="post" name="update-quantity" action="admin-update.php">
          <p><strong>Nouvelles Quantité</strong></p>
      </div>
      <div class="large-6 columns">
        <input type="number" name="quantity[]" />

      </div>
    </div>
<?php 
    }
}
?>



  </div>
</div>


    <div class="row" style="margin-top:10px;">
      <div class="small-12">
        <center><p><input style="clear:both;" type="submit" class="button" value="Update"></p></center>
        </form>
      

      </div>
    </div>





    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
