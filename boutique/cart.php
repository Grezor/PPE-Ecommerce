<?php

    //if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    if(session_id() == '' || !isset($_SESSION)){session_start();}
    if(!isset($_SESSION["username"])) header("location:login.php");

    include '../db.php';
    include 'header.php';

?>
<style type="text/css">
    .btn-light {
    color: #212529;
    background-color: yellow;
    border-color: #f8f9fa;
    }
    .btn-light:hover {
    color: #212529;
    background-color: gold;
    border-color: #f8f9fa;
    }
.jumbotron {
    padding: 1rem 0.5rem 1rem 0.5rem;
    margin-bottom: 30px;
    color: inherit;
    background-color: #eee;
}
@media screen and (min-width: 768px){
    .jumbotron {
        padding: 1rem 0;
    }
}

</style>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Don't worry, Be happy ! :)</h1>
     </div>
</section>

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Produit</th>
                            <th scope="col">Disponibilitée</th>
                            <th scope="col" class="text-center">Quantitée</th>
                            <th scope="col" class="text-right">Prix</th>
                            <th> </th><!-- ça c'est la ligne vide en haut a gauche du tableau -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right">Total HT</td>
                            <td id="HT" class="text-right"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right">Tva (19.6%)</td>
                            <td id="TVA" class="text-right"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="text-right"><strong>Total TTC</strong></td>
                            <td id="TTC" class="text-right"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12 col-md-6 text-center">
                    <button id="goToProduct" class="btn btn-lg btn-block btn-light text-uppercase">Plus d'achats !</button>
                </div>
                <div class="col-sm-12 col-md-6 text-center">
                    <button class="btn btn-lg btn-block btn-success text-uppercase">Valider mon panier !</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){

        $.post( 'API_ecommerce.php' , { req_api : 'get_userPanierByID' } , function(data){

            var result = JSON.parse(data);
            /* id: "1" // id_produit: "1" // id_user: "3" // img_url: "a1.jpg" // name: "borne_1" // prix: "599" // quantite: "3"*/
            $.each( result , function(){


                let MainEle = $("<tr></tr>").attr({"class" : "product_line"});

                let col1 = $("<td></td>").append('<img class="img-fluid" src="../images/'+this.img_url+'" />');
                let col2 = $("<td>"+ this.nom +"</td>");
                let col3 = $("<td>"+this.stock+"</td>");
                let col4 = $("<td></td>").append('<input class="form-control" type="text" value="'+ this.quantite +'" />');
                let col5 = $('<td class="text-right" data-prixUnit="'+this.prix+'">'+ this.quantite*this.prix +' €</td>');// faudra mettre un peu de jquery pour le maintenir a jour visuellement si le user change de qutt
                let col6 = $('<td></td>').attr({"class":"text-right"}).append('<button class="btn btn-sm btn-danger removeEle" data-tag="'+this.id+'"><i class="fa fa-trash"></i></button>');

                MainEle.append( col1 , col2 , col3 , col4 , col5 , col6 );
                $('tbody').prepend( MainEle ); // on ajoute l'élement crée en tant que 1st child du corp du tableau
            })

            $('.removeEle').click(function(e){
                e.preventDefault();
                let idLine = $(this).attr("data-tag");
                $.post( 'API_ecommerce' , { req_api : 'del_lineInPanierByID' , line_id : idLine});
                $(this).parent().parent().toggle( "slow" , function(){ $(this).remove() ; upd_PanierBoard() }); // on remonte du btn > td et ensuite du td > tr et on remove l'élément
            })

            
            upd_PanierBoard();

            $(document).on('click' , function(){// TRES MAUVAIS ATTENTION // NE PAS FAIRE CA !!
                upd_PanierBoard();
            })

            $('#goToProduct').click(function(){ $(location).attr('href', 'products.php') })

            function upd_PanierBoard(){
                let line_pdt = $('.product_line');// on récupére chaque ligne produit du panier
                let HT = 0 , TVA , TTC; // on déclare les var des champ en dehors des line
                $.each( line_pdt , function(){
                    let qtt_dispo = $(this).children().eq(2).text();
                    let qtt = $(this).children().eq(3).children().val();
                    let prixUnit = $(this).children().eq(4).attr("data-prixUnit");

                    $(this).children().eq(4).text( parseInt(qtt) * parseInt(prixUnit) + " €" );
                    // OUBLIE PAS DE METTRE A JOUR LES MONTANT DE CHAQUE LIGNE !!! 
                    HT += ( parseInt(qtt) * parseInt(prixUnit) );

                })

                TVA = Math.round((HT * 1.196)-HT);
                TTC = Math.round( HT * 1.196 );
                $('#HT').text(HT+ " €");
                $('#TVA').text(TVA+ " €");
                $('#TTC').text(TTC+ " €");
            }
            
        })

        /*  
                                <tr>
                            <td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td>
                            <td>Product Name Dada</td>
                            <td>In stock</td>
                            <td><input class="form-control" type="text" value="1" /></td>
                            <td class="text-right">124,90 €</td>
                            <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>
                        </tr>*/




    })


</script>


<?php include("footer.php");  ?>
