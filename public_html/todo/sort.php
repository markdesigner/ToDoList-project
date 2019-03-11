<?php
header('Content-Type: application/json; charset=utf-8');
include('../../db.php');

try {
	$pdo = new PDO("mysql:host=$db[host];dbname=$db[dbname];port=$db[port];charset=$db[charset]", $db['username'], $db['password']);
} catch (PDOException $e) {
	echo "Database connection failed.";
	exit;
}

$sql = 'UPDATE todos SET `order`=:order WHERE id=:id';
$statement = $pdo->prepare($sql);
foreach ($_POST['orderPair'] as $key => $orderPair) {
	$statement->bindValue(':order', $orderPair['order'], PDO::PARAM_INT);
	$statement->bindValue(':id', $orderPair['id'], PDO::PARAM_INT);
	$result = $statement->execute();
}

if (!$result) {
	echo 'error';
}