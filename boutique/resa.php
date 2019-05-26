<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
  if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["auth"])){

    header("location:login.php");
}

  include '../db.php';
  include 'header.php';

?>
<style type="text/css">
      body{
        padding: 0 0 0 0;
        margin: 0 0 0 0;
      }
      /* SCROLL BAR*/ 
       /* width */
      .modal_close::-webkit-scrollbar {
        width: 10px;
      }

      /* Track */
      .modal_close::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 1%;

      }

      /* Handle */
      .modal_close::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 1%;
      }

      /* Handle on hover */
      .modal_close::-webkit-scrollbar-thumb:hover {
        background: #555;
      }

      .modal_open::-webkit-scrollbar {
        width: 0px;
        display: none;
      }

      /* Track */
      .modal_open::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 1%;

      }

      /* Handle */
      .modal_open::-webkit-scrollbar-thumb {
        background: #888;
      }

      /* Handle on hover */
      .modal_open::-webkit-scrollbar-thumb:hover {
        background: #555;
      } 
      .container{
        margin-top: 0rem;
        margin-bottom: 1rem;
      }

      .close_galery{
        position: absolute;
        background-image: url('../images/cross_ico.png');
        background-size: cover;
        right: 5%;
        top: 5%;
        width: 2rem;
        height: 2rem;
        cursor: pointer;
      }
      .folder_active{
        position: absolute;
        top: 1;
        width: 1.5rem;
        height: 1.5rem;
        background-image: url('images/folder.png');
        background-size: contain;
        cursor: pointer;
      }
      .modal_main{
        position: absolute;
        top: 0px;
        left: 0px;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.9);
        z-index: 100;

      }
      .gallery_main{
        position: absolute;
        top: 10%;
        left: 10%;
        width: 80%;
        height: 80%;
        background-color: transparent;
        opacity: 1;
        z-index: 100;
      }
      .gallery {
        
      overflow-x: hidden;
      -webkit-column-count: 3;
      -moz-column-count: 3;
      column-count: 3;
      -webkit-column-width: 33%;
      -moz-column-width: 33%;
      column-width: 33%; 

      }
      .gallery .pics {
      -webkit-transition: all 350ms ease;
      transition: all 350ms ease; }
      .gallery .animation {
      -webkit-transform: scale(1);
      -ms-transform: scale(1);
      transform: scale(1); }

      .pics{
        margin-bottom: 0.5rem;
      }


      #wrap_galerie{
        max-height: 90%;
        overflow-y: auto;
      }

      .img-like0{
        display: inline-block;
        max-width: 100%;
        height: auto;
        padding: 4px;
        line-height: 1.42857143;
        background-color: transparent;
        border: 1px solid #ddd;
        border-radius: 4px;
        -webkit-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
      }

      .img-like1{
        display: inline-block;
        max-width: 100%;
        height: auto;
        padding: 4px;
        line-height: 1.42857143;
        background-color: gold;
        border: 1px solid #ddd;
        border-radius: 4px;
        -webkit-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
      }

      @media (max-width: 400px) {
      .btn.filter {
      padding-left: 1.1rem;
      padding-right: 1.1rem;
      }
      }

      /* boots 4.3.1 missing*/

      .justify-content-center {
      -ms-flex-pack: center!important;
      justify-content: center!important
      }

      .btn-outline-light {
          color: #f8f9fa;
          border-color: #f8f9fa;
          background-color : transparent;
      }

      .btn-outline-light:hover {
          color: #212529;
          background-color: #f8f9fa;
          border-color: #f8f9fa
      }

      .btn-outline-light.focus,
      .btn-outline-light:focus {
          box-shadow: 0 0 0 .2rem rgba(248, 249, 250, .5);
          background-color: #fff;
      }

      .btn-outline-light.disabled,
      .btn-outline-light:disabled {
          color: #f8f9fa;
          background-color: transparent
      }

      .btn-outline-light:not(:disabled):not(.disabled).active,
      .btn-outline-light:not(:disabled):not(.disabled):active,
      .show>.btn-outline-light.dropdown-toggle {
          color: #212529;
          background-color: #f8f9fa;
          border-color: #f8f9fa
      }

      .btn-outline-light:not(:disabled):not(.disabled).active:focus,
      .btn-outline-light:not(:disabled):not(.disabled):active:focus,
      .show>.btn-outline-light.dropdown-toggle:focus {
          box-shadow: 0 0 0 .2rem rgba(248, 249, 250, .5)
      }

      .d-flex {
          display: -ms-flexbox!important;
          display: flex!important
      }

      .mb-5,
      .my-5 {
          margin-bottom: 1.5rem!important
      }

      .info_board{
        font-size: 1.5rem;
        font-weight: 700; 
        margin-left: 1rem;
        margin-right: 1rem;
        color: ghostwhite;
      }
</style>



  <div id="modal_gallery" class="modal_main" style="display: none;">
    <span class="close_galery"></span>
    <div class="gallery_main">
<!-- Grid row -->
      <div class="container">

        <div id="gal_infos_container" class="col-md-12 d-flex justify-content-center mb-5">
          <button type="button" class="btn btn-outline-light waves-effect info_board" style="background-color: #6faabdde">Crédits : <em id="nbCredit">0</em></button>
          <button type="button" class="btn btn-outline-light waves-effect info_board" style="background-color: #dcb800d9">Liked : <em id="nbLike">0</em></button>
        </div>        
        <!-- Grid column -->
        <div id="gal_btn_container" class="col-md-12 d-flex justify-content-center mb-5">
          <button type="button" class="btn btn-outline-light waves-effect filter" data-rel="all">All</button>
          <button type="button" class="btn btn-outline-light waves-effect filter" data-rel="chosen">Chosen</button>
        </div>
        <!-- Grid column -->
      </div>
          <!-- Grid row -->
      <div id="wrap_galerie" class="modal_close">
        <div class="gallery" id="gallery">

        </div>
      </div>


    </div>
  </div>





  <div id="resaAnt" class="container">
    <h2>Antérieurs</h2>
    <div class="table-responsive">          
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Début</th>
          <th>Fin</th>
          <th>Photos</th>
        </tr>
      </thead>
      <tbody id="table1">
      </tbody>
    </table>
    </div>
  </div>

  <hr>

  <div id="resaCur" class="container">
    <h2>En cours</h2>
    <div class="table-responsive">          
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Début</th>
          <th>Fin</th>
          <th>Photos</th>
        </tr>
      </thead>
      <tbody id="table2">
      </tbody>
    </table>
    </div>
  </div>

  <hr>

  <div id="resaPost" class="container">
    <h2>Future</h2>
    <div class="table-responsive">          
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Début</th>
          <th>Fin</th>
          <th>Photos</th>
        </tr>
      </thead>
      <tbody id="table3">
      </tbody>
    </table>
    </div>
  </div>

<script type="text/javascript">
$(document).ready(function(){

    $.post( "API_ecommerce.php", { req_api : "get_userReservation" } , function( data ) {
      console.log(data);
      var resa = JSON.parse(data);
      console.log(resa);""
      let cnt = 1;
      $.each(resa, function () {

        $('<tr></tr>')
        .append(
          '<td>'+ cnt +'</td>'+//numero de la resa par rapport au resa du client
          '<td>'+ this.date_beg +'</td>'+
          '<td>'+ this.date_end +'</td>'+
          '<td><span id="'+this.id+'" class="fill_span folder_active" data-credit="'+this.forfait+'" data-like="'+this.likes+'"></span></td>')
        .appendTo('#table'+this.status);// accede a lid du status 1/past 2/current 3/next

        cnt++;
      });

      $('.fill_span').on('click' , function(e){

        let fold = $(e.target);
        var resaId = fold.attr('id');
        
        $.post( "API_ecommerce.php", { req_api : "get_photosFolderByResaID" , resa_id : resaId } , function( data ) { 
          var photos = JSON.parse(data);

          if (! isEmpty(photos)) {//si il existe des photo liée a la résa

            $('#gallery').empty();// on vide les eventuels précédent chargement

            let Days_section = new Array();

            $.each( photos , function(){
              /* on va remplir le tableau des diff jours des photos */ 
              function add(array, value) {
                if (array.indexOf(value) === -1) {
                  array.push(value);
                }
              }

              let day = (this.date_prise).substring(0, 10);
              add(Days_section , day);


              $('<div></div>')
              .addClass('mb-3 pics animation all '+day+' '+ (this.estAime==1?"chosen":" ") )
              .append('<img class="img-fluid img-like'+this.estAime+'" src="../images/'+this.url+'" alt="'+this.id+'">')
              .appendTo("#gallery");
            })

            //ICI ON SET LE NB DE PHOTO DEJA LIKE ET LE CREDIT DE PHOTO RESTANT

            $('#nbCredit').text( fold.attr('data-credit') );
            $('#nbLike').text( fold.attr('data-like') );
            // eh oui

            $('#modal_gallery').fadeIn( 500 );

            $("body").addClass('modal_open').
            css({
              'max-height': ($('#modal_gallery').height() ),
              'overflow-y':'hidden'
            });

            /* on crée les button de galery avec les différents jours */  
            var gal_btn = $("#gal_btn_container").children();
            /* d'abord on clean la div*/
            $.each( gal_btn , function(){
              if ($(this).attr("data-rel") !== "all" && $(this).attr("data-rel") !== "chosen") {
                $(this).remove();
              }
            })

            /* ici on met les btn du novueau folder cliqué */
            $.each( Days_section , function(){
              $('#gal_btn_container')
              .append('<button type="button" class="btn btn-outline-light waves-effect filter" data-rel="'+this+'">'+this+'</button>')
            })


            //////////////////////////////////////////////////
            /*  ici ont va géré le LIKE / DISLIKE DES PHOTOS*/
            //////////////////////////////////////////////////
            
            


            // ensuite on gére le like au clic d'une photo
            $('.all > img').on('click' , function(){
              //on check si les crédit sont suffisant
              let ele = $(this);
              let newStatut =ele.parent().hasClass('chosen')?'0':'1';

              let credit = $('#nbCredit').text();
              let like = $('#nbLike').text();

              if(credit==0 && newStatut === '1') {alert('out of credit range') ;return false};

              var photoId = ele.attr("alt");

              $.post( "API_ecommerce.php", { req_api : "update_likePhotoStatusByID" , photo_id : photoId , new_statut : newStatut } , function( data ) { 
                let result = JSON.parse(data);
                if ( result == "updated") {

                    ele.parent().toggleClass('chosen');
                    ele.toggleClass('img-like0 img-like1');

                    if(newStatut === '0'){ 
                      $('#nbCredit').text( parseInt(credit)+1 );
                      $('#nbLike').text( parseInt(like)-1 );  
                      fold.attr({ "data-credit" :  parseInt(credit)+1, "data-like" : parseInt(like)-1 })
                    }else{
                      $('#nbCredit').text( parseInt(credit)-1 );
                      $('#nbLike').text( parseInt(like)+1 );  
                      fold.attr({ "data-credit" :  parseInt(credit)-1, "data-like" : parseInt(like)+1 })                      
                    }

                }else{
                  alert('une erreur est survenue')
                }
              })
            })




            /* on active le filtre par date  */
            $(function() {
              var selectedClass = "";
              $(".filter").click(function(e){
                e.preventDefault();
                selectedClass = $(this).attr("data-rel");

                $("#gallery").fadeTo(100, 0.1);
                $("#gallery div").not("."+selectedClass).fadeOut().removeClass('animation');

                setTimeout(function() {
                  $("."+selectedClass).fadeIn().addClass('animation');
                  $("#gallery").fadeTo(300, 1);
                }, 300);
              });
            });


            $('.close_galery').click(function(){
              $('#modal_gallery').fadeOut( 500 );
              $("body").removeClass('modal_open').
              css({
                'max-height': 'auto',
                'overflow-y':'auto'
              });
            })



          }else{// si le folder ne contient pas de photos
            alert('Ce dossier/réservation ne contient pas de photos :s');
          }




        })

        /*if ($('body').hasClass('modal_open')) {
          $("body").removeClass('modal_open').
          css({
            'max-height': 'auto',
            'overflow-y':'auto'
          });
        }else{
          $("body").addClass('modal_open').
          css({
            'max-height': $('#modal_gallery').height(),
            'overflow-y':'hidden'
          });       
        }*/
      })


      /* TOOLS TOOLS TOOLS TOOLS TOOLS TOOLS TOOLS TOOLS*/
      function isEmpty(obj) {
          for(var key in obj) {
              if(obj.hasOwnProperty(key))
                  return false;
          }
          return true;
      }
    })

})
</script>

<?php include("footer.php"); ?>
