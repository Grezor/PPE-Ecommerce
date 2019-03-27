


<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
  if(session_id() == '' || !isset($_SESSION)){session_start();}
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

<div class="container">

  <br>  
  <p class="text-center">Lache un like si tu kiffe bat**d  -  On se calme ,<a href="images/clown.gif" target="about_blank">  c'est de l'HUMOUR !</a></p>
  <hr>


  <div class="row" id="borne_container"></div> 
</div>
<!--container.//-->
<script type="text/javascript">

  $(document).ready(function(){

    $.post( "API_ecommerce.php", { req_api : "get_bornesInfos" } , function( data ) { 
      var bornes = JSON.parse(data);

      console.log(bornes);
      $.each( bornes , function(){
        insert_newProduct(this);
      })

      function insert_newProduct( p_infos ){
        let container = $("<div></div>").attr({'class' : 'col-md-4 img-thumbnail pdct_cont'});
          let figure = $("<figure></figure>").attr({'class' : 'card card-product'});
            let img = $("<div></div>")
            .attr({'class' : 'img-wrap'})
            .append("<img src='images/"+ p_infos.img_url +"' class='img-fluid img-thumbnail'>");

            let figcaption = $("<figcaption></figcaption>")
            .attr({"class" : "info-wrap"})
            .append('<h3 class="title">'+p_infos.name+'</h3><br><p class="desc">'+p_infos.description+'</p><hr>');

            let rating = $("<div></div>")
            .attr({'class' : 'rating-wrap'})
            .append('<div class="label-rating">132 reviews</div><div class="label-rating">132 reviews</div>');
            /*//////////////////////////////////////*/

            let prix = $("<div></div>")
              .attr({'class' : 'price-wrap h5'})
              .append('<span class="price-new">'+p_infos.prix+' $</span> <del class="price-old">$1980</del>');

            let prixContainer = $("<div></div>")
              .attr({'class' : 'bottom-wrap'})
              .append('<a href="" class="btn btn-sm btn-primary float-right">Order Now</a> ');

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




<?php include("footer.php"); ?>




