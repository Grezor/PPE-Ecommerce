<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
include ("header.php");
?>


<div class="container">
    <div class="row" style="margin-top:40px;">
        <div class="col-sm-12">
            <p>Vos informations ont bien été enregistré</p>
            <p>vous pouvez continuer a faire vos achats <a href="products.php">ici!!!</a></p>
        </div>
    </div>


    <?
include("includes/footer.php");
?>
