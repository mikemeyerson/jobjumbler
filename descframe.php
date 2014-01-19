<?php
    require_once("cb.php");

$job = $_GET["job"];
$city = $_GET["city"];
$id = $_GET["id"];
$results = CBAPI::getJobResults($job, $city, "", $id, 0);
$job = CBAPI::getJobDetails($results[0]->did); //job

echo html_entity_decode($job->description, ENT_QUOTES); ?>
