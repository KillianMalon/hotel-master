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