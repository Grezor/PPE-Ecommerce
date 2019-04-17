<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if(session_id() == '' || !isset($_SESSION)){session_start();}

include '../db.php';
include 'header.php';

?>
<style type="text/css">
  h1{
    padding: 0.5em 0 1em 0;
    text-align: center;
  }
</style>
<h1>Bienvenue <?php echo $_SESSION['username']; ?></h1>

<div class="container-fluid customCont">
    <form>
  <div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control form-control-plaintext" id="email" value="email@example.com">
    </div>
  </div>

  <div class="form-group row">
    <label for="nom" class="col-sm-2 col-form-label">Nom</label>
    <div class="col-sm-10">
      <input type="text" class="form-control form-control-plaintext" id="nom" value="email@example.com">
    </div>
  </div>
  <div class="form-group row">
    <label for="prenom" class="col-sm-2 col-form-label">Prenom</label>
    <div class="col-sm-10">
      <input type="text" class="form-control form-control-plaintext" id="prenom" value="email@example.com">
    </div>
  </div>
  <div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" readonly class="form-control" id="password" placeholder="Password" value="greg">
    </div>
  </div>

  <div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">Réservations</label>
    <div class="col-sm-4">
      <button id="del_oldResa" class="btn btn-danger">Effacer les "anciennes réservations"</button>
    </div>
  </div>
</form>
</div>


<script type="text/javascript">
  $(document).ready(function(){

    $.post( 'API_ecommerce.php' , { req_api : 'get_infosUserById'  } , function(data){

      /* si la req a fonctionné on parse les données reçu de JSON to Js  */
      let info_user = JSON.parse(data);

      console.log(info_user[0].password);
      /* ensuite on va extraire les infos de "info_user" et les mettre dans les différents champs prévu a cet effet*/
      
      //$('#/*idDeLinput*/').val( info_user./*champBdd*/  );
      //$('#/*idDeLinput*/').val( info_user./*champBdd*/  );




    })




    $('.form-control').on('click' , function(){
      let id = $(this).attr("id");
      let curValue = $(this).val();

      /* ici on va faire apparaitre un modal */
      /* le modal va récupéré la nouvelle valeur voulu par le user et vérifié le mdp */ 
      var newValue = prompt( id , "");
      var pwdConfirm = prompt( "Confimer votre password" , "" );


      /*on va envoyer une req pour UPDATE le champ dans "id" et */
      $.post( 'API_ecommerce.php' , { req_api : "upd_infosUserById" , info_champ : id , info_value : newValue, password : pwdConfirm } , function(data){
          let result = JSON.parse(data);

          console.log(result);
      })


    })


    $('#del_oldResa').on('click' , function(){
      alert('not already set')
    })

  })
</script>
<?php
  include 'footer.php';
?>
