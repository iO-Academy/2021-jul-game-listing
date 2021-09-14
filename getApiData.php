<?php

$request = curl_init("https://www.freetogame.com/api/games?platform=pc");
curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($request);
$data = json_decode($response);