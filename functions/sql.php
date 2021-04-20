<?php
function getCountry($dbh){
    $query = $dbh->prepare('SELECT * FROM pays');
    $query -> execute();
    $country = $query->fetchAll();
    return $country;
}