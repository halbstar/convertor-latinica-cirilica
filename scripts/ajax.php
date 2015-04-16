<?php
require_once "config.php";
foreach($_POST["serverReq"] as $key=>$value){
	$dbArr[$key]=$value;
}
$dbArr["inputText"] = $_POST["inputText"];


$dbArrPrep = array();
foreach ($dbArr as $value) {
     	array_push($dbArrPrep,'?');
     }

try {
    $conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'INSERT INTO `'. DB_TABLE .'` (`'.implode('`, `',array_keys($dbArr)).'`) VALUES (' . implode(', ', $dbArrPrep) . ')';
    $st = $conn->prepare('INSERT INTO `'. DB_TABLE .'` (`'.implode('`, `',array_keys($dbArr)).'`) VALUES (' . implode(', ', $dbArrPrep) . ')');
	$st->execute(array_values($dbArr));
    

} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

/**
 * Created by PhpStorm.
 * User: umbra
 * Date: 22.1.2015
 * Time: 16:31
 */

