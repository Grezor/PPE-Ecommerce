<?php 


	session_start();
	if(!isset($_SESSION["username"])) header("location:../index.php"); // on check au cas ou

	include("../db.php");
	include("functions.php");

	/* ///////////////////////////////////////////////////////////////////////////////////////// */
	/* RESA RESA RESA RESA RESA RESA RESA RESA RESA RESA RESA RESA RESA RESA RESA RESA RESA RESA */ 
	/* ///////////////////////////////////////////////////////////////////////////////////////// */

	/* la déclartion de la fct  LE SETTER EN GROS */
	function get_userReservation( $userId , PDO $bdd ){

		$output = array();
		$getResa = 'SELECT * FROM reservations WHERE id_users = "'.$userId.'"'; // PREPARATION DE LA REQ


        if($resultatReq = $bdd->query($getResa)) // SI LA REQUETE A FONCTIONNE
          {
            while($resa = $resultatReq->fetch()) // SI J'ARRIVE A EXTRAIRE UN RESULTAT
            {
            	$status = 0;
            	//en fct de la resa , on veux savoir si elle est passé(1) , encours (2) ou future(3)

            	$now   = time();
				$begin = strtotime( $resa->date_beg);
				$end = strtotime( $resa->date_end);
				if( $now > $end ) $status = 1; 
				else if( $now < $end && $now > $begin ) $status = 2; 
				else if( $now < $begin ) $status = 3; 

				$resa->status = $status;

            	array_push($output, $resa);
            }

		}
		return $output;
	}
	/* l'utilisation de la fct  LE GETTER EN GROS */
			if(isset($_POST['req_api'] ) && $_POST['req_api'] == 'get_userReservation' ){

				$result = get_userReservation( $_SESSION['id'] , $bdd);// on oublie pas de lui passé la bdd ,sinon return undefined
				echo json_encode( $result );
			}



	function get_photosFolderByResaID( $resaId ,  PDO $bdd ){

		$output = array();
		$getResa = 'SELECT * FROM photos WHERE id_reservation = "'.$resaId.'"'; // PREPARATION DE LA REQ

        if($resultatReq = $bdd->query($getResa)) // SI LA REQUETE A FONCTIONNE
          {
            while($resa = $resultatReq->fetch()) // SI J'ARRIVE A EXTRAIRE UN RESULTAT
            {
            	array_push($output, $resa);
            }
        }

        return $output;

	}

			if(isset($_POST['req_api'] , $_POST['resa_id'] ) && $_POST['req_api'] == 'get_photosFolderByResaID' ){

				$result = get_photosFolderByResaID( $_POST['resa_id'] , $bdd);// on oublie pas de lui passé la bdd ,sinon return undefined
				echo json_encode( $result );
			}


	function update_likePhotoStatusByID( $photoId , $newStatut , PDO $bdd ){
		$output = "";
		$updStatus = "UPDATE `photos` SET `estAime` = '".$newStatut."' WHERE `photos`.`id` = ".$photoId; // PREPARATION DE LA REQ

        if($bdd->query($updStatus)) $output = 'updated'; else $output = 'problème dans la requête';

        return $output;
	}

			if(isset($_POST['req_api'] , $_POST['photo_id'] , $_POST['new_statut'] ) && $_POST['req_api'] == 'update_likePhotoStatusByID' ){

				$result = update_likePhotoStatusByID( $_POST['photo_id'] , $_POST['new_statut'] , $bdd);// on oublie pas de lui passé la bdd ,sinon return undefined
				echo json_encode( $result );
			}


	/* ///////////////////////////////////////////////////////////////////////////////////////// */
	/*  PRODUIT PRODUIT PRODUIT PRODUIT PRODUIT PRODUIT PRODUIT PRODUIT PRODUIT PRODUIT PRODUIT  */
	/* ///////////////////////////////////////////////////////////////////////////////////////// */

	function get_bornesInfos( PDO $bdd ){

		$output = array();
		$getBornes = 'SELECT * FROM `bornes`'; // A FINIR A FINIR !!


        if($resultatReq = $bdd->query($getBornes)) // SI LA REQUETE A FONCTIONNE
          {
            while($bornes = $resultatReq->fetch()) // SI J'ARRIVE A EXTRAIRE UN RESULTAT
            {

            	array_push($output, $bornes );
            }
        }

        return $output;
	}

	if(isset($_POST['req_api']) && $_POST['req_api'] == 'get_bornesInfos' ){
		$result = get_bornesInfos( $bdd );// on oublie pas de lui passé la bdd ,sinon return undefined

		//$result = serialize ($result);
		//$result = utf8_encode($result);
		//$result = preg_replace_callback('!s:(\d+):"(.*?)";!e', "'s:'.strlen('$2').':\"$2\";'", $result);
		//$result  = unserialize($result);
		utf8_encode_deep( $result );  // on prevent les accent et autre merde
		echo json_encode($result);
	}


	/*  */
	/*  PANIER PANIER PANIER PANIER */
	/* */

?>