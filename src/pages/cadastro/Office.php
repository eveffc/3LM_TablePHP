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

        <link href="../../../assets/img/Icon.svg" type="icon" rel="icon">
        <title>Novo cargo</title>
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
        
        <form class="form" action="../../PHP/OfficeDB.php" method="post">
            <input class="inputCargo" type="cargo" id="nome" name="cargo" placeholder="Cargo" required>
            <textarea type="text" id="descricao" name="descricao" placeholder="descrição"></textarea>
           
            <input class="save" type="submit" value="Salvar" >
            <a href="../home/OfficeTable.html">Cancelar</a>
        </form>
    </body>
</html>