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

function addCity($countryId, $cityId, $cityName, $cityCode)
{
    $cities = getALlCities();

    $new_city = array(
        "countryId" => $countryId,
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

function editCity($countryId, $cityId, $cityName, $cityCode)
{
    $cities = getALlCities();

    $edit_city = array(
        "countryId" => $countryId,
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

function showListCity($countryId){
    $cities = getALlCities();
    $list = array();
    $existed = false;
    foreach ($cities as $element) {
        if($element["countryId"] == $countryId){
            $list[] = $element;
            $existed = true;
        }
        if($countryId == null || empty($countryId)){
            return $cities;
        }
    }
    if(!$existed){
        return false;
    }
    return $list;
}