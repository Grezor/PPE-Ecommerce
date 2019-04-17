<?php


session_start();
if (!isset($_SESSION["username"])) {
    echo json_encode("session no exist");
    return false;
}// on check au cas ou
include("../db.php");
include("functions.php");


/* ///////////////////////////////////////////////////////////////////////////////////////// */
/* iNFORMATION UTILISATEURS																																	 */
/* ///////////////////////////////////////////////////////////////////////////////////////// */

function get_infosUserById($userId, PDO $bdd)
{
    $output = array();

    $req = 'SELECT * FROM users WHERE id = "' . $userId . '"';
    if ($resultatReq = $bdd->query($req)) // SI LA REQUETE A FONCTIONNE
    {
        while ($infoUser = $resultatReq->fetch()) // SI J'ARRIVE A EXTRAIRE UN RESULTAT
        {
            array_push($output, $infoUser);
        }
    }
    return $output;
}

if (isset($_POST['req_api']) && $_POST['req_api'] == 'get_infosUserById') {

    $result = get_infosUserById($_SESSION['id'], $bdd);

    echo json_encode($result);
}


/* ///////////////////////////////////////////////////////////////////////////////////////// */
/* Mettre a jour les informations utilisateurs 																							 */
/* ///////////////////////////////////////////////////////////////////////////////////////// */

function upd_infosUserById($userId, $bdd_champ, $newInfo, PDO $bdd)
{
    // bdd_champs = nom champs bdd

    // verifie quel champs on veux mofidier
    // si le champs bdd et égale au input password alors tu crypt en md5
    if ($bdd_champ == "password") {
        $newInfo = md5($newInfo);
    }

    $req = "UPDATE users SET " . $bdd_champ . " = '" . $newInfo . "' WHERE `users`.`id` = " . $userId;
    if ($bdd->query($req)) $output = 'updated';
    else $output = 'problème dans la requête';
    return $output;
}

//
if (isset($_POST['req_api'], $_POST['info_champ'], $_POST['info_value'], $_POST['password'])
    && $_POST['req_api'] == 'upd_infosUserById') {
    // le passord ecrit et en session
    if (md5($_POST['password']) == $_SESSION['password']) {
        $result = upd_infosUserById($_SESSION['id'], $_POST['info_champ'], $_POST['info_value'], $bdd);
    } else {
        $result = "mauvais password";
    }
    echo json_encode($result);
}


/* la déclartion de la fct  LE SETTER EN GROS */
function get_userReservation($userId, PDO $bdd)
{

    $output = array();
    $getResa = 'SELECT * FROM reservations WHERE id_users = "' . $userId . '"'; // PREPARATION DE LA REQ

    if ($resultatReq = $bdd->query($getResa)) // SI LA REQUETE A FONCTIONNE
    {
        while ($resa = $resultatReq->fetch()) // SI J'ARRIVE A EXTRAIRE UN RESULTAT
        {
            $status = 0;
            //en fct de la resa , on veux savoir si elle est passé(1) , encours (2) ou future(3)

            $now = time();
            $begin = strtotime($resa->date_beg);
            $end = strtotime($resa->date_end);
            if ($now > $end) $status = 1; //resa passé
            else if ($now < $end && $now > $begin) $status = 2; // résa en cours
            else if ($now < $begin) $status = 3; // résa future

            $resa->status = $status;

            array_push($output, $resa);
        }

    }
    return $output;
}

/* l'utilisation de la fct  LE GETTER EN GROS */

//$_POST['req_api'] = 'get_userReservation';
//$_SESSION['id'] = 3;

if (isset($_POST['req_api']) && $_POST['req_api'] == 'get_userReservation') {

    $result = get_userReservation($_SESSION['id'], $bdd);// on oublie pas de lui passé la bdd ,sinon return undefined
    echo json_encode($result);
}


function get_photosFolderByResaID($resaId, PDO $bdd)
{

    $output = array();
    $getResa = 'SELECT * FROM photos WHERE id_reservation = "' . $resaId . '"'; // PREPARATION DE LA REQ

    if ($resultatReq = $bdd->query($getResa)) // SI LA REQUETE A FONCTIONNE
    {
        while ($resa = $resultatReq->fetch()) // SI J'ARRIVE A EXTRAIRE UN RESULTAT
        {
            array_push($output, $resa);
        }
    }

    return $output;

}

if (isset($_POST['req_api'], $_POST['resa_id']) && $_POST['req_api'] == 'get_photosFolderByResaID') {

    $result = get_photosFolderByResaID($_POST['resa_id'], $bdd);// on oublie pas de lui passé la bdd ,sinon return undefined
    echo json_encode($result);
}


function update_likePhotoStatusByID($photoId, $newStatut, PDO $bdd)
{
    $output = "";
    $updStatus = "UPDATE `photos` SET `estAime` = '" . $newStatut . "' WHERE `photos`.`id` = " . $photoId; // PREPARATION DE LA REQ


    if ($bdd->query($updStatus)) $output = 'updated'; else $output = 'problème dans la requête';

    /* on update aussi le forfait et les likes liée a la réservations */
    $reqUpdResa = "";//on declare la req avant sinon il est delete une fois sorti du if/else
    if ($newStatut == 0) {
        $reqUpdResa = "UPDATE reservations SET forfait = forfait+1 , likes = likes-1 WHERE id = 3";
    } else {
        $reqUpdResa = "UPDATE reservations SET forfait = forfait-1 , likes = likes+1 WHERE id = 3";
    }

    $bdd->query($reqUpdResa);

    return $output;
}

if (isset($_POST['req_api'], $_POST['photo_id'], $_POST['new_statut']) && $_POST['req_api'] == 'update_likePhotoStatusByID') {

    $result = update_likePhotoStatusByID($_POST['photo_id'], $_POST['new_statut'], $bdd);// on oublie pas de lui passé la bdd ,sinon return undefined
    echo json_encode($result);
}


/* ///////////////////////////////////////////////////////////////////////////////////////// */
/*  PRODUIT PRODUIT PRODUIT PRODUIT PRODUIT PRODUIT PRODUIT PRODUIT PRODUIT PRODUIT PRODUIT  */
/* ///////////////////////////////////////////////////////////////////////////////////////// */

function get_bornesInfos(PDO $bdd)
{

    $output = array();
    $getBornes = 'SELECT * FROM `produits` WHERE `type` = "borne"';


    if ($resultatReq = $bdd->query($getBornes)) // SI LA REQUETE A FONCTIONNE
    {
        while ($bornes = $resultatReq->fetch()) // SI J'ARRIVE A EXTRAIRE UN RESULTAT
        {

            array_push($output, $bornes);
        }
    }

    return $output;
}

if (isset($_POST['req_api']) && $_POST['req_api'] == 'get_bornesInfos') {
    $result = get_bornesInfos($bdd);// on oublie pas de lui passé la bdd ,sinon return undefined

    //$result = serialize ($result);
    //$result = utf8_encode($result);
    //$result = preg_replace_callback('!s:(\d+):"(.*?)";!e', "'s:'.strlen('$2').':\"$2\";'", $result);
    //$result  = unserialize($result);
    utf8_encode_deep($result);  // on prevent les accent et autre merde
    echo json_encode($result);
}


function get_borneDispoEntreDeuxDate($date_beg, $date_end, PDO $bdd)
{

    $output = array();
    $tmpB = goodFormat($date_beg);//unifie les format de bdd & ceux reçu par l'utilisateur
    $tmpE = goodFormat($date_end);

    $dateB = strtotime($tmpB);
    $dateE = strtotime($tmpE);

    if ($dateB > $dateE) {
        return "dates incompatible";
    }
    //ensuite on récupére toute les résa , ainsi que les id des bornes associés
    $req_allResa = 'SELECT * FROM reservations';
    $all_resa = array();//contient le resultat de la req
    if ($resultatReq = $bdd->query($req_allResa)) // SI LA REQUETE A FONCTIONNE
    {
        while ($resa = $resultatReq->fetch()) // SI J'ARRIVE A EXTRAIRE UN RESULTAT
        {
            array_push($all_resa, $resa);
        }
    }
    //on va traduire tout les interval de reservation en timestamp pour pouvoir les comparé avec l'interval voulu par le client
    $Resas = array();//va contenir n tableau contenant 1->Id_borne //2->date_debut //3->date_fin

    foreach ($all_resa as $value) {
        $beg = strtotime($value->date_beg);
        $end = strtotime($value->date_end);
        array_push($Resas, array($value->id_borne, $beg, $end));
    }
    $BorneNonDispo = array();//explicit content

    function rangesNotOverlapOpen($start_time1, $end_time1, $start_time2, $end_time2)
    {
        return ($end_time1 <= $start_time2) || ($end_time2 <= $start_time1);
    }

    foreach ($Resas as $value) {

        $overLap = rangesNotOverlapOpen($dateB, $dateE, $value[1], $value[2]);

        if ($overLap != 1) {
            array_push($BorneNonDispo, $value[0]);
        }

    }

    $BorneNonDispoUniq = array_unique($BorneNonDispo);
    // maintenant on va faire la différence entre TOUTE les borne et les borne non dispo
    $bornesInfos = get_bornesInfos($bdd);
    $allId = array();
    foreach ($bornesInfos as $key => $value) {
        array_push($allId, $value->id);
    }
    $idBorneDispo = array_diff($allId, $BorneNonDispoUniq);

    //TADAM FINI

    return $idBorneDispo;
}

if (isset($_POST['req_api'], $_POST['date_debut'], $_POST['date_fin']) && $_POST['req_api'] == 'get_borneDispoEntreDeuxDate') {


    $result = get_borneDispoEntreDeuxDate($_POST['date_debut'], $_POST['date_fin'], $bdd);// on oublie pas de lui passé la bdd ,sinon return undefined

    utf8_encode_deep($result);  // on prevent les accent et autre merde
    echo json_encode($result);
}


function update_productInPanierByID($id_user, $id_pdt, $qtt, PDO $bdd)
{
    $output = "";
    $INSorUPD = array();
    $pdt_alreadyInCart = 'SELECT * FROM `panier` WHERE id_user = "' . $id_user . '" AND id_produit = "' . $id_pdt . '"';
    if ($resultatReq = $bdd->query($pdt_alreadyInCart)) // SI LA REQUETE A FONCTIONNE
    {
        while ($matched = $resultatReq->fetch()) array_push($INSorUPD, $matched);
    }

    if (empty($INSorUPD)) {//le produit nest pas encore dans le panier
        $req = "INSERT INTO `ppe1719`.`panier` (`id_user`, `id_produit`, `quantite`) VALUES ('" . $id_user . "', '" . $id_pdt . "', '" . $qtt . "')";
        $bdd->query($req) ? $output = "good" : $output = "not good";
    } else { //le produit se trouve déja dans le panier
        $req = "UPDATE panier p SET p.quantite = p.quantite + " . $qtt . " WHERE p.id_user = '" . $id_user . "' AND p.id_produit = '" . $id_pdt . "'";
        $bdd->query($req) ? $output = "good" : $output = "not good";
    }

    return $output;
}

if (isset($_POST['req_api'], $_POST['pdt_id'], $_POST['quantite']) && $_POST['req_api'] == 'update_productInPanierByID') {
    $result = update_productInPanierByID($_SESSION['id'], $_POST['pdt_id'], $_POST['quantite'], $bdd);// on oublie pas de lui passé la bdd ,sinon return undefined


    utf8_encode_deep($result);  // on prevent les accent et autre merde
    echo json_encode($result);
}


function get_userPanierByID($user_id, PDO $bdd)
{
    $output = array();

    $req = "SELECT p.id,p.id_user,p.id_produit,p.quantite,b.nom,b.img_url,b.stock,b.prix 
				FROM panier p JOIN produits b ON p.id_produit = b.id
				WHERE id_user = " . $user_id;

    if ($resultatReq = $bdd->query($req)) // SI LA REQUETE A FONCTIONNE
    {
        while ($panier_pdt = $resultatReq->fetch()) array_push($output, $panier_pdt);
    }

    return $output;
}

if (isset($_POST['req_api']) && $_POST['req_api'] == 'get_userPanierByID') {
    $result = get_userPanierByID($_SESSION['id'], $bdd);


    utf8_encode_deep($result);  // on prevent les accent et autre merde
    echo json_encode($result);
}


function del_lineInPanierByID($id_line, PDO $bdd)
{
    $req = "DELETE FROM `ppe1719`.`panier` WHERE  `id`= " . $id_line;

    if ($bdd->query($req)) return "good"; else return "not good";
}

if (isset($_POST['req_api'], $_POST['line_id']) && $_POST['req_api'] == 'del_lineInPanierByID') {
    $result = del_lineInPanierByID($_POST['line_id'], $bdd);

    echo $result;
}


?>