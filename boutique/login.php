<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(isset($_SESSION["username"])){

    header("location:../index.php");
}
include("header.php");
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--   method="POST" action="verify.php" -->
<div class="container">


<form class="form-signin">
<div id="connexionForm" >
    <div class="form-group">
    <label for="exampleInputEmail1">Nom Utilisateur</label>
    <input type="email" class="form-control" id="loginName" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mot de passe</label>
    <input type="password" class="form-control" id="loginPassword" placeholder="Password">
  </div>  
</div>

<div id="registerForm" style="display: none">
    <div class="form-group">
        <label for="exampleInputEmail1">Nom</label>
        <input type="text" class="form-control" id="nom">
    </div>
  
    <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
    </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Confirm password</label>
    <input type="password" class="form-control" id="confirmPwd" placeholder="Password">
  </div>

</div>

  <button id="connexionBtn" class="btn btn-primary">Connexion</button>
  <button id="registerBtn" class="btn btn-warning" style="display: none">Inscription</button>
  <button id="toggleBtn" class="btn-inscription">Pas de compte ?</button>

</form>
    <a href="reset.php">reset</a>

<style>
.form-signin{
    margin-top:50px;
}

btn-inscription {
    color: #fff !important;
    border-color: #269abc;
}

.btn-inscription {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: #ffce14 !important;
    border: 1px solid transparent;
    border-radius: 4px;
}
</style>


    <!-- 
    <form style="margin-top:100px; display: none">
        <div class="row">
            <div class="col-sm-12">

            <div class="row">
                <div class="small-4 columns">
                    <label for="right-label" class="right inline">Email :</label>
                </div>
                <div class="col-sm-6 col-lg-6">
                    <input type="email" id="right-label" placeholder="Entrez un pseudo" name="username">
                </div>
            </div>
        <div class="row">
            <div class="col-sm-4">
                <label for="right-label" class="right inline">Mot de passe :</label>
            </div>
            <div class="col-sm-6">
                <input type="password" id="right-label" name="pwd">
            </div>
        </div>
    </form>
                <div class="row">
                    <div class="col-sm-4">
    
                    </div>
                    <div class="col-sm-8 col-lg-8">
                        <button id="connexionBtn" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">connexion</button>
                        <button id="ToggleBtn" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">Pas de compte ?</button>
                    </div>
                </div>
            </div>
        </div>
-->
</div>
<script type="text/javascript">
    
    $(document).ready(function(){
        
        $('#toggleBtn').on('click', function(e){
            e.preventDefault();
            $(this).text() == "Pas de compte ?" ? $(this).text("Déja inscrit ?") : $(this).text("Pas de compte ?");
            $('#connexionForm').toggle();
            $('#registerForm').toggle();
            $('#connexionBtn').toggle();
            $('#registerBtn').toggle();
        })

        $('#registerBtn').on('click' , function(e){
                        e.preventDefault();

            var infos = new Object();
            infos.nom = $('#nom').val();
            infos.email = $('#email').val();
            infos.password = $('#password').val();
            infos.confirmPwd = $('#confirmPwd').val();


            var infos = JSON.stringify( infos ); 
            console.log(infos);

            $.post( "register.php", { infos : infos } )
                .done(function( data ) {
                alert( "Data Loaded: " + data );
                console.log(data);
                });                        
        })

        $('#connexionBtn').on('click' , function(e){
            e.preventDefault();

            var infos = new Object();
            infos.nom = $('#loginName').val();
            infos.password = $('#loginPassword').val();
            var infos = JSON.stringify( infos ); 

            $.post( "get_logged.php", { infos : infos } )
                .done(function( data ) {
                data == "connected" ? $(location).attr('href',"../index.php") : alert(data);
                })  
        })
  /*

    error: function (jqXHR, exception) {
        if (jqXHR.status === 0) {
        alert('Not connect.\n Verify Network.');
        } else if (jqXHR.status == 404) {
        alert('Requested page not found. [404]');
        } else if (jqXHR.status == 500) {
        alert('Internal Server Error [500].');
        } else if (exception === 'parsererror') {
        alert('Requested JSON parse failed.');
        } else if (exception === 'timeout') {
        alert('Time out error.');
        } else if (exception === 'abort') {
        alert('Ajax request aborted.');
        } else {
        alert('Uncaught Error.\n' + jqXHR.responseText);
        }
    }, 
})*/
    })


</script>

<?php include("footer.php"); ?>
