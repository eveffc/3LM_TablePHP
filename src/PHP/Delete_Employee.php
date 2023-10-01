<?php
session_start();
include_once("conexaoDeDados.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM funcionarios WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    
} else {
    $_SESSION['msg'] = "ID do funcionário não fornecido!";
}

header("Location: http://localhost/Projetos/3LM_TablePHP/src/pages/home/EmployeeTable.html"); 
?>