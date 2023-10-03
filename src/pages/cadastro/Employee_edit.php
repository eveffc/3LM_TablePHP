<?php
    session_start();
    include_once('../../PHP/conexaoDeDados.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    
        $query = "SELECT nome, sobrenome, cargo, nascimento, salario FROM funcionarios WHERE id='$id'";
        $result = mysqli_query($conn, $query);
    
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "Nenhum resultado encontrado para o ID fornecido.";
        }
    
        mysqli_close($conn);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="../../Styles/screen.css" type="text/css" rel="stylesheet">
        <link href="../../Styles/table.css" type="text/css" rel="stylesheet">
        <link href="../../Styles/form.css" type="text/css" rel="stylesheet">

        <script src="../../Scripts/ScriptPage.js"></script>
        <script src="../../Scripts/ScriptSelectOpcoes_Edit.js"></script>

        <link href="../../../assets/img/Icon.svg" type="icon" rel="icon">
        <title>Novo usuário</title>
    </head>

    <body>
        <header>
        <img class="logo" src="../../../assets/img/Logo.svg">
        </header>

        <form action="../../PHP/Save_Employee.php" method="post">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
            <div class="form">
                <input class="input space" type="text" id="nome" name="nome" value="<?php echo isset($row['nome'])? $row['nome'] : ''; ?>" required>
                <input class="input" type="text" id="sobrenome" name="sobrenome" value="<?php echo isset($row['sobrenome'])? $row['sobrenome'] : ''; ?>"  required>
            </div>

            <select class="select" id="cargo" name="cargo" value="<?php echo isset($row['cargo'])? $row['cargo'] : ''; ?>" required ></select>
            
            <div class="form">
                <input class="input space" type="date" id="nascimento" name="nascimento" value="<?php echo isset($row['nascimento'])? $row['nascimento'] : ''; ?>" required>
                <input class="input" type="number" id="salario" name="salario" value="<?php echo isset($row['salario']) ? $row['salario'] : ''; ?>" required>
            </div>
            <input class="save" type="submit" value="Salvar" >
            <a href="../home/EmployeeTable.html">Cancelar</a>
        </form>
    </body>
</html>