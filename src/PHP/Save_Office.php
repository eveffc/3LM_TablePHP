<?php
session_start();
include_once("conexaoDeDados.php");

$cargo = filter_input(INPUT_POST, 'cargo');
$descricao = filter_input(INPUT_POST, 'descricao');

// Verifique se o campo oculto 'id' foi enviado
if (isset($_POST['id'])) {
    // É uma atualização, obtenha o ID do funcionário
    $id = $_POST['id'];

    // Construa a query de UPDATE
    $query = "UPDATE cargos SET cargo='$cargo', descricao='$descricao' WHERE id='$id'";
} else {
    // É uma inserção, construa a query de INSERT
    $query = "INSERT INTO funcionarios (cargo, descricao, modified) VALUES ('$cargo', '$descricao', NOW())";
}

$result = mysqli_query($conn, $query);

if (!$result) {
    echo 'Erro SQL: ' . mysqli_error($conn);
}

header('Location: ../pages/home/OfficeTable.html');
?>
