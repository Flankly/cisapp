<?php

$id = $_GET['id'];

$sql = "SELECT * FROM tb_usuario inner join tb_login on us_id=id_us WHERE us_id = ?";
$stmt = $db->prepare($sql);
$stmt->bindParam(1, $id);
$stmt->execute();
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($dados as $d) {
}
