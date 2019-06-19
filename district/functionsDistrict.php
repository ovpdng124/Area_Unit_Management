<?php
session_start();

function getAllDistricts()
{
    return isset($_SESSION['districts']) ? $_SESSION['districts'] : array();
}

function getDistricts($districtId)
{
    $districts = getAllDistricts();

    foreach ($districts as $element) {
        if ($element["districtId"] == $districtId) {
            return $element;
        }
    }
}

function addDistrict($cityId, $districtId, $districtName, $districtCode)
{
    $districts = getAllDistricts();

    $new_district = array(
        "cityId" => $cityId,
        "districtId" => $districtId,
        "districtName" => $districtName,
        "districtCode" => $districtCode
    );
    $districts[] = $new_district;
    $_SESSION["districts"] = $districts;

}

function deleteDistrict($districtId)
{
    $districts = getAllDistricts();

    foreach ($districts as $key => $element) {
        if ($element["districtId"] == $districtId) {
            unset($districts[$key]);
        }
    }
    $_SESSION['districts'] = $districts;
}

function editDistrict($cityId, $districtId, $districtName, $districtCode)
{
    $districts = getAllDistricts();

    $edit_district = array(
        "cityId" => $cityId,
        "districtId" => $districtId,
        "districtName" => $districtName,
        "districtCode" => $districtCode
    );

    foreach ($districts as $key => $element) {
        if ($element["districtId"] == $districtId) {
            $districts[$key] = $edit_district;
        }
    }
    $_SESSION['districts'] = $districts;
}

function showListDistrict($cityId){
    $districts = getAllDistricts();
    $list = array();
    $existed = false;
    foreach ($districts as $element) {
        if($element["cityId"] == $cityId){
            $list[] = $element;
            $existed = true;
        }
        if($cityId == null || empty($cityId)){
            return $districts;
        }
    }
    if(!$existed){
        return false;
    }

    return $list;
}