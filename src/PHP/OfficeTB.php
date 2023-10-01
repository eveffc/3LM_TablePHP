<?php
    include_once("conexaoDeDados.php");

    $query = "SELECT * FROM cargos ORDER BY cargo ASC";
    $result = mysqli_query($conn, $query);

    $tableCargo = '<table>';
    
    while ($row =mysqli_fetch_assoc($result)) {
        $tableCargo .= '<tr>';
        $tableCargo .= '<td>' . $row['cargo'] . '</td>';
        $tableCargo .= '<td>' . $row['descricao'] . '</td>';
        $tableCargo .= '</tr>';
    }

    $tableCargo .= '</table>';
    echo $tableCargo;
?>