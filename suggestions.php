<?php
require 'config.php';
header('Content-Type: application/json; charset=utf-8');
$q = trim($_GET['q'] ?? '');
if($q === '') { echo json_encode(['start'=>[], 'contains'=>[]]); exit; }


// résultats commençant par
$stmt1 = $pdo->prepare("SELECT id, nom FROM animaux WHERE nom LIKE ? ORDER BY nom ASC LIMIT 10");
$stmt1->execute(["$q%"]);
$start = $stmt1->fetchAll(PDO::FETCH_ASSOC);


// résultats contenant mais ne commençant pas
$stmt2 = $pdo->prepare("SELECT id, nom FROM animaux WHERE nom LIKE ? AND nom NOT LIKE ? ORDER BY nom ASC LIMIT 20");
$stmt2->execute(["%$q%", "$q%"]);
$contains = $stmt2->fetchAll(PDO::FETCH_ASSOC);


echo json_encode(['start'=>$start, 'contains'=>$contains]);