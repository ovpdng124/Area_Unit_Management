<?php
session_start();

function getALlCities()
{
    return isset($_SESSION['cities']) ? $_SESSION['cities'] : array();
}

function getCities($cityId)
{
    $cities = getALlCities();

    foreach ($cities as $element) {
        if ($element["cityId"] == $cityId) {
            return $element;
        }
    }
}

function addCity($cityId, $cityName, $cityCode)
{
    $cities = getALlCities();

    $new_city = array(
        "cityId" => $cityId,
        "cityName" => $cityName,
        "cityCode" => $cityCode
    );
    $cities[] = $new_city;
    $_SESSION["cities"] = $cities;

}

function deleteCity($cityId)
{
    $cities = getALlCities();

    foreach ($cities as $key => $element) {
        if ($element["cityId"] == $cityId) {
            unset($cities[$key]);
        }
    }
    $_SESSION['cities'] = $cities;
}

function editCity($cityId, $cityName, $cityCode)
{
    $cities = getALlCities();

    $edit_city = array(
        "cityId" => $cityId,
        "cityName" => $cityName,
        "cityCode" => $cityCode
    );

    foreach ($cities as $key => $element) {
        if ($element["cityId"] == $cityId) {
            $cities[$key] = $edit_city;
        }
    }
    $_SESSION['cities'] = $cities;
}
