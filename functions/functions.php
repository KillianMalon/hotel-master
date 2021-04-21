<?php

function checkDateFormat($date){
    // match the format of the date
    if (preg_match ("/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/", "$date"))
    {
        return true;
    } else {
        return false;
    }
}

function checkCapacityAdult($capacityRoom, $capacityEnter){
    // match the format of the date
    $length = strlen($capacityRoom);
    if (preg_match ("/^([0-9]{1,$length})$/", "$capacityEnter"))
    {
        return true;
    } else {
        return false;
    }
}

function checkCapacityChild($capacityRoom, $capacityEnter){
    // match the format of the date
    $length = strlen($capacityRoom);
    if (preg_match ("/^([0-9]{0,$length})$/", "$capacityEnter"))
    {
        return true;
    } else {
        return false;
    }
}