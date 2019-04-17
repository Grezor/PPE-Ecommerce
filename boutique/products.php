<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
  if(session_id() == '' || !isset($_SESSION)){session_start();}

  if(!isset($_SESSION["username"])) header("location:login.php");

    
  include '../db.php';
  include 'header.php';
?>

<style type="text/css">

  .card-product .img-wrap {
    border-radius: 3px 3px 0 0;
    overflow: hidden;
    position: relative;
    height: 220px;
    line-height:220px;
    text-align: center;
  }
  .card-product .img-wrap img {
      max-height: 100%;
      max-width: 100%;
      object-fit: cover;
      vertical-align: middle;
  }
  .card-product .info-wrap {
      overflow: hidden;
      padding: 15px;
      border-top: 1px solid #eee;
  }
  .card-product .bottom-wrap{
      padding: 15px;
      border-top: 1px solid #eee;
  }

  .label-rating { margin-right:10px;
      color: #333;
      display: inline-block;
      vertical-align: middle;
  }

  .card-product .price-old {
      color: #999;
  }
  .pdct_cont{
    max-width: 80%;
    background-color: #FFFFF0;
    margin: 0.1rem;
    display: inline-block;
  }
  #borne_container{
    text-align: center;
  }

  .title{
    color: #337ab7;
    text-shadow: gold 1px 0 10px;
    text-decoration: underline;
  }
  .desc{
    word-break: break-all;
    text-align: left;
    padding-top: 0.2rem;
    padding-bottom: 0.2rem;
    min-height: 4rem;
    max-height: 4rem;
    overflow-y: auto;
    letter-spacing: 0.1rem;
    line-height: 1.2rem;
  }
</style>
<div id="availability-agileits">
<div class="col-md-3 book-form-left-w3layouts">
  <h2>RESERVATION ?</h2>
</div>
<div class="col-md-9 book-form">
         <form action="#" method="post">
          <div class="fields-w3ls form-left-agileits-w3layouts ">
              <p>Type de Bornes</p>
              <select class="form-control">
                <option>Prenium Familiale</option>
                <option>Prenium</option>
                <option>Econmique Familiale</option>
                <option>Economique</option>
              </select>
          </div>
          <div class="fields-w3ls form-date-w3-agileits">
                    <p>Date de début</p>
                  <input  id="datepicker1" name="Text" type="text" value="Select Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
                </div>
                <div class="fields-w3ls form-date-w3-agileits">
                    <p>Date de fin</p>
                  <input  id="datepicker2" name="Text" type="text" value="Select Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="">
                </div>
          
          <div class="form-left-agileits-submit">
              <input id="check_dispo" type="submit" value="Voir les disponibilité">
          </div>
        </form>
      </div>
      <div class="clearfix"> </div>
</div>
  <hr>
<div class="container">




  <div class="row" id="borne_container"></div> 
</div>
<!--container.//-->
<script type="text/javascript">

  $(document).ready(function(){

    $.post( "API_ecommerce.php", { req_api : "get_bornesInfos" } , function( data ) { //on POST sur url (1er arg) , les var du second arg , et le retour du fichier php est le "data" dans la function (3iéme arg) 
    /* RAPPEL dans un post en JQ/AJAX on a >>> post( url , { phpVar : localVar , etc } , function(php result){callback....} ) */
      var bornes = JSON.parse(data);// on parse le Json to JS var 

      $.each( bornes , function(){ // for each ele in bornes
        insert_newProduct(this); //( borne => this )
      })
      /* ////////////////////// */
      /* BTN POUR ADD AU PANIER */ 
      /* ////////////////////// */
      $('.bottom-wrap > a').on('click' , function(e){ // e est l'handler de fct attaché a l'event du selecteur  ( ici le "<a>" sous les element de class "bottom-wrap" es le selecteur)
          e.preventDefault();

          var id_produit = $(this).attr('href');

            /* par défaut la qtt est pour l'instant de 1 , rajouté du html pour permmtre au client de choisir le montant de son produit ... */ 
            /* RAPPEL dans un post en JQ/AJAX on a >>> post( url , { phpVar : localVar , etc } , function(php result){callback....} ) */
        $.post( "API_ecommerce.php", { req_api : "update_productInPanierByID" , pdt_id : id_produit , quantite : 1 } , function( data ) { 
            var tmpData = JSON.parse(data);
            let clientMsg = tmpData=="good"?"Produit ajouté au panier !":"WATSOOONN , il ya comme un probléme !";
            alert(clientMsg);

        })
      })
        /* ////////////////////// */
        /* ////////////////////// */
        /* ////////////////////// */


      function insert_newProduct( p_infos ){
        let container = $("<div></div>").attr({'class' : 'col-md-4 img-thumbnail pdct_cont'});
          let figure = $("<figure></figure>").attr({'class' : 'card card-product'});
            let img = $("<div></div>")
            .attr({'class' : 'img-wrap'})
            .append("<img src='../images/"+ p_infos.img_url +"' class='img-fluid img-thumbnail'>");

            let figcaption = $("<figcaption></figcaption>")
            .attr({"class" : "info-wrap"})
            .append('<h3 class="title">'+p_infos.nom+'</h3><br><p class="desc">'+p_infos.description+'</p><hr>');

            let rating = $("<div></div>")
            .attr({'class' : 'rating-wrap'})
            .append('<div class="label-rating">132 reviews</div><div class="label-rating">132 reviews</div>');
            /*//////////////////////////////////////*/

            let prix = $("<div></div>")
              .attr({'class' : 'price-wrap h5'})
              .append('<span class="price-new">'+p_infos.prix+' $</span> <del class="price-old">$1980</del>');

            let prixContainer = $("<div></div>")
              .attr({'class' : 'bottom-wrap'})
              .append('<a href="'+ p_infos.id +'" class="btn btn-sm btn-primary float-right">Order Now</a> ');

        $('#borne_container').append(
          container.append(
            figure
            .append(img)
            .append(figcaption.append(rating))
            .append(prixContainer.append(prix))
          )
        )
      }
      
    })

  })
</script>
<!-- js -->
<script src="../js/jquery-ui.js"></script>
<script>
    $(function() {
      $( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
    });
</script>



<?php include("footer.php"); ?>




