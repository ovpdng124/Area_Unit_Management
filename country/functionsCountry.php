<?php
session_start();
function getAllCountries()
{
    return isset($_SESSION["countries"]) ? $_SESSION['countries'] : array();
}

function getCountries($countryId)
{
    $countries = getAllCountries();
    foreach ($countries as $element) {
        if($element["countryId"] == $countryId)
        return $element;
    }
    return array();
}

function addCountry($countryId, $countryName, $countryCode)
{
    $countries = getAllCountries();
    $new_country = array(
        "countryId" => $countryId,
        "countryName" => $countryName,
        "countryCode" => $countryCode
    );

    $countries[] = $new_country;
    $_SESSION["countries"] = $countries;

}

function deleteCountry($countryId)
{
    $countries = getAllCountries();

    foreach ($countries as $key => $element) {
        if ($element['countryId'] == $countryId) {
            unset($countries[$key]);
        }
    }
    $_SESSION["countries"] = $countries;
}

function editCountry($countryId, $countryName, $countryCode)
{
    $countries = getAllCountries();

    $edit_country = array(
        "countryId" => $countryId,
        "countryName" => $countryName,
        "countryCode" => $countryCode);
    foreach ($countries as $key => $element) {
        if ($element['countryId'] == $countryId) {
            $countries[$key] = $edit_country;
        }
    }
    $_SESSION["countries"] = $countries;
}

