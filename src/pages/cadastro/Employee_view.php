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
        <link href="../../Styles/view.css" type="text/css" rel="stylesheet">

        <script src="../../Scripts/ScriptPage.js"></script>
        <script src="../../Scripts/ScriptSelectOpcoes_Edit.js"></script>

        <link href="../../../assets/img/Icon.svg" type="icon" rel="icon">
        <title>Novo usuário</title>
    </head>

    <body>
        <header>
        <img class="logo" src="../../../assets/img/Logo.svg">
        </header>
        <main>
            <div style="font-family: Arial, Helvetica, sans-serif;">

                <?php
                    $data_nascimento = isset($row['nascimento']) ? $row['nascimento'] : '';

                    if (!empty($data_nascimento)) {
                    
                        $data_objeto = new DateTime($data_nascimento);

                        // Para transformar meses em português
                        $meses = array(
                            'janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho',
                            'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro'
                        );

                        $dia_extenso = $data_objeto->format('d');
                        $mes_extenso = $meses[$data_objeto->format('n') - 1]; 

                        // Verificação se é o mes de anivesário da pessoa
                        $mes_atual = date('n'); 
                        if ($data_objeto->format('n') == $mes_atual) {
                            // Menssagem de aniversário
                            echo "<label class='msg'>Parabéns por mais um ano de vida, Tenha um dia repleto de felicidades.</label>";
                        }
                echo'<div class="div">';
                        echo '<label class="info" type="text">Nome: ' . (isset($row['nome'])? $row['nome'] : '') .' '. (isset($row['sobrenome'])? $row['sobrenome'] : '') . '</label>';

                        echo "<label class='info'>Aniversário: $dia_extenso de $mes_extenso</label>";
                    } else {
                        echo "<label class='info'>Aniversário: Data não informada</label>";
                    }
                    
                    echo '<label class="info"> Cargo: ' . (isset($row['cargo']) ? $row['cargo'] : '') . '</label>';
                    echo '<label class="info"> Salário: R$ ' . (isset($row['salario']) ? $row['salario'] : '') . '</label>';
                echo'</div>';
                ?>  
            </div>
            <a href="../home/EmployeeTable.html">Sair</a>
        </main>
    </body>
</html>