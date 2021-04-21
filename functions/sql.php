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
}