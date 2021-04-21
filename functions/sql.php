<?php
function getCountry($dbh){
    $query = $dbh->prepare('SELECT * FROM pays');
    $query -> execute();
    return $query->fetchAll();
}

function getRoom($dbh,$numeroChambre){
    $query = $dbh->prepare('SELECT chambres.*,tarifs.prix FROM chambres,tarifs WHERE chambres.tarif_id = tarifs.id AND chambres.id =' . $numeroChambre);
    $query->execute(); // execute le SQL dans la base de données (MySQL / MariaDB)
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
function getCapacity($dbh, $numeroChambre){
    $query = $dbh->prepare('SELECT capacite FROM chambres WHERE chambres.id ='.$numeroChambre);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function checkReservationsEmpty($dbh,$date, $id){
    $query = $dbh->prepare("SELECT * FROM planning WHERE chambre_id = '$id' AND jour = '$date'");
    $query->execute(); // execute le SQL dans la base de données (MySQL / MariaDB)
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function addReservation($dbh, $chambreId, $dateStart, $dateEnd, $numberAdult, $numberChild, $id){
    $query = $dbh->prepare("INSERT INTO planning (chambre_id, jour, acompte, paye, nombreadulte, nombreenfant, client_id)
                                                VALUES('$chambreId', '$dateStart', '0', '0', '$numberAdult', '$numberChild', '$id')");
    $query->execute();
    return $query->fetchAll();
}

function getClient($dbh, $id){
    $query = $dbh->prepare("SELECT * FROM clients WHERE id = ?");
    $query->execute(array($id));
    $client = $query->fetch();
    return $client;
}

function getCountrybyid($dbh, $cid){
    $query = $dbh->prepare("SELECT * FROM pays WHERE id = ?");
    $query->execute(array($cid));
    $cname = $query->fetch();
    return $cname;
}
function mbUcfirst($str, $encode = 'UTF-8') {

    $start = mb_strtoupper(mb_substr($str, 0, 1, $encode), $encode);
    $end = mb_strtolower(mb_substr($str, 1, mb_strlen($str, $encode), $encode), $encode);
    return $str = $start.$end;
}

function mailCheck($dbh, $mail){
    $request = $dbh->prepare('SELECT * FROM clients WHERE mail = ?');
    $request->execute(array($mail));
    return $emailCount = $request->rowCount();
}
function inscription($dbh, $firstName, $lastName, $mail, $password, $address, $postalCode, $city, $country, $civility, $image){
    $sql = $dbh->prepare("INSERT INTO clients (civilite, nom, prenom, adresse, codePostal, ville, pays_id, mail, password, image) VALUES(?,?,?,?,?,?,?,?,?,?)");
    $sql->execute(array($civility, $firstName,$lastName, $address, $postalCode, $city, $country,$mail,$password,$image));
}

function getUserByMail($dbh, $mail){
    $query = $dbh->prepare('SELECT * FROM clients WHERE mail = ?');
    $query->execute(array($mail));
    return $user = $query->fetch();
}

function getUserByMailAndPassword($dbh, $mail, $password){
    $query = $dbh->prepare('SELECT * FROM clients WHERE mail = ? and password = ?');
    $query->execute(array($mail, $password));
    return $query;
}
