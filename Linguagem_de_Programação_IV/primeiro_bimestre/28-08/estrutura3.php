<?php
include("cabecalho.php");
// 1-domingo 2 -Segunda
$diaSemana =1;
switch ($diaSemana) {
    case 1:
        echo "Hoje é Domingo";
        break;
    case 2:
        echo "Hoje é Segunda";
        break;
    case 3:
        echo "Hoje é Terça";
        break;
    default;
        echo "Hoje pode ser q   quarta, quinta, sexta";
}
include("rodape.php");
