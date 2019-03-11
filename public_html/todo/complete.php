<?php
header('Content-Type: application/json; charset=utf-8');
include('../../db.php');

try {
	$pdo = new PDO("mysql:host=$db[host];dbname=$db[dbname];port=$db[port];charset=$db[charset]", $db['username'], $db['password']);
} catch (PDOException $e) {
	echo "Database connection failed.";
	exit;
}

// load todo
$sql = 'SELECT is_complete FROM todos WHERE id=:id';
$statement = $pdo->prepare($sql);
$statement->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
$result = $statement->execute();
$todo = $statement->fetch(PDO::FETCH_ASSOC);

// save
$sql = 'UPDATE todos SET is_complete=:is_complete WHERE id=:id';
$statement = $pdo->prepare($sql);
$statement->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
$statement->bindValue(':is_complete', !$todo['is_complete'], PDO::PARAM_INT);
$result = $statement->execute();

if ($result) {
	echo json_encode(['id'=>$_POST['id'], 'is_complete'=>!$todo['is_complete']]);
}
else {
	echo 'error';
}