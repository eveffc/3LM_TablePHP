<?php
session_start();
include_once("conexaoDeDados.php");

$nome = filter_input(INPUT_POST, 'nome');
$sobrenome = filter_input(INPUT_POST, 'sobrenome');
$cargo = filter_input(INPUT_POST, 'cargo');
$nascimento = filter_input(INPUT_POST, 'nascimento');
$salario = filter_input(INPUT_POST, 'salario');

// Verifique se o campo oculto 'id' foi enviado
if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $query = "UPDATE funcionarios SET nome='$nome', sobrenome='$sobrenome', cargo='$cargo', nascimento='$nascimento', salario='$salario' WHERE id='$id'";
} else {
    $query = "INSERT INTO funcionarios (nome, sobrenome, cargo, nascimento, salario, modified) VALUES ('$nome', '$sobrenome', '$cargo', '$nascimento', '$salario', NOW())";
}

$result = mysqli_query($conn, $query);

if (!$result) {
    echo 'Erro SQL: ' . mysqli_error($conn);
}

header('Location: ../pages/home/EmployeeTable.html');
?>
