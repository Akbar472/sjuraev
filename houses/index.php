<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../src/model/DataContext.php';
include_once '../src/model/Affordable_houses.php';

if(!isset($db)) {
    $db = new DataContext();
}

$houses = $db->Affordable_Houses();

if($houses) {
    $code = 200;
    header_remove();
    http_response_code($code);
    header('Content-Type: application/json');
    header('Status: '.$code);

    echo getSemanticMarkup($houses);
} else {
    // set response code - 404 Not found
    http_response_code(404);

    // tell the user no products found
    echo json_encode(
        array("message" => "No houses found.")
    );
}

function getSemanticMarkup($response) {
    $SemanticResult = '{ "@context" : { "Place" : "http://schema.org", "hss" : "http://web.socem.plymouth.ac.uk" }, "Place" : [ ';

    foreach($response as $houses) {
        $SemanticResult .= '{ 
                "Year of Start and Completion" : "'.$houses->yearOfStartAndCompletion().'",
                "Number of Houses" : "'.$houses->numberOfHouses().'"},';
    }
    //remove the trailing comma from the end
    $SemanticResult = substr($SemanticResult, 0, -1);
    $SemanticResult .= ']}';

    return $SemanticResult;
}

function returnJSON($response, $code) {
    header_remove();
    http_response_code($code);
    header('Content-Type: application/json');
    header('Status: '.$code);
    return json_encode(array('status' => $code, 'message' => $response));
}