<?php
function getCountry($dbh){
    $query = $dbh->prepare('SELECT * FROM pays');
    $query -> execute();
    $country = $query->fetchAll();
    return $country;
}

function mbUcfirst($str, $encode = 'UTF-8') {

    $start = mb_strtoupper(mb_substr($str, 0, 1, $encode), $encode);
    $end = mb_strtolower(mb_substr($str, 1, mb_strlen($str, $encode), $encode), $encode);
    $str = $start.$end;
    return $str;
}

function mailCheck($dbh, $mail){
    $request = $dbh->prepare('SELECT * FROM clients WHERE mail = ?');
    $request->execute(array($mail));
    $emailCount = $request->rowCount();
    return $emailCount;
}
function inscription($dbh, $firstName, $lastName, $mail, $password, $address, $postalCode, $city, $country, $civility, $image){
    $sql = $dbh->prepare("INSERT INTO clients (civilite, nom, prenom, adresse, codePostal, ville, pays_id, mail, password, image) VALUES(?,?,?,?,?,?,?,?,?,?)");
    $sql->execute(array($civility, $firstName,$lastName, $address, $postalCode, $city, $country,$mail,$password,$image));
}

function getUserByName($dbh, $mail){
    $query = $dbh->prepare('SELECT * FROM clients WHERE mail = ?');
    $query->execute(array($mail));
    $user = $query->fetch();
    return $user ;
}