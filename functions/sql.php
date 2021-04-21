<?php
function getCountry($dbh){
    $query = $dbh->prepare('SELECT * FROM pays');
    $query -> execute();
    $country = $query->fetchAll();
    return $country;
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
    $sql->execute(array($civility,$lastName, $firstName, $address, $postalCode, $city, $country,$mail,$password,$image));
}

function getUserByName($dbh, $mail){
    $query = $dbh->prepare('SELECT * FROM clients WHERE mail = ?');
    $query->execute(array($mail));
    return $user = $query->fetch();
}

function getUserByMailAndPassword($dbh, $mail, $password){
    $query = $dbh->prepare('SELECT * FROM clients WHERE mail = ? and password = ?');
    $query->execute(array($mail, $password));
    return $query;
}