<?php
function getCountry($dbh){
    $query = $dbh->prepare('SELECT * FROM pays');
    $query -> execute();
    return $country = $query->fetchAll();
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