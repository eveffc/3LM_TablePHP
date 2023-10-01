<?php
    session_start();
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
        <script src="../../Scripts/ScriptSelectOpcoes.js"></script>

        <link href="../../../assets/img/Icon.svg" type="icon" rel="icon">
        <title>Novo usuário</title>
    </head>

    <body>
        <header>
        <img class="logo" src="../../../assets/img/Logo.svg">
        </header>

        <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
       
        <form action="../../PHP/EmployeeDB.php" method="post">
            <div class="form">
                <input class="input space" type="text" id="nome" name="nome" placeholder="Nome" required>
                <input class="input" type="text" id="sobrenome" name="sobrenome" placeholder="Sobrenome" required>
            </div>

            <select class="select" id="cargo" name="cargo" required></select>
            
            <div class="form">
                <input class="input space" type="date" id="nascimento" name="nascimento" placeholder="Data de nasc.">
                <input class="input" type="number" id="salario" name="salario" placeholder="Salário">
            </div>
            <input class="save" type="submit" value="Salvar" >
            <a href="../home/EmployeeTable.html">Cancelar</a>
        </form>
    </body>
</html>