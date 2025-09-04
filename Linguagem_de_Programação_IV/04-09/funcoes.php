<?php
$nome = "Junior";
echo "<p> todas em maiusculo<p>" . strtoupper($nome) . "</p>";
echo "<p> todas em minuscula" . strtolower($nome) . "<p>";
echo "<p>Qtd. de caracteres" . strlen($nome) . "</p>";
$posicao = strpos($nome, "r") . "</p>";
echo "<p> Caracter r na posicao $posicao</p>";

date_default_timezone_set('America/Sao_Paulo');
$data1 = date("d/m/Y");
$dia = date("d");
$hora = date("H:i:s");
echo "<p>data : $data1</p>";
echo "<p>dia: $dia</p>";
echo "<p>hora: $hora</p>";
if (checkdate(2, 30, 2025)) {
    echo "<p>data informada existe(30/02/2025)</p>";
} else {
    echo "<p>A data informada não existe(30/02/2025)</p>";
}
$valor = -10;
echo "<p>Valor absoluto:" . abs($valor) . "</p>";
$valor = 5.9;
echo "<p>Valor arredondado:" . round($valor) . "</p>";
$valor = rand(1, 100);
echo "<p>Valor aleatorio: $valor</p>";
echo "<p>Raiz quadrada de 16:" . sqrt(16) . "</p>";
$valor = 13.5;
echo "<p>Valor formatado" . number_format($valor, 2, ",", ".") . "</p>";

function exibirSaudacao()
{
    echo "<p>Olá mundo</p>";
}

exibirSaudacao();
function exibirSaudacaoComNome($nome)
{
    echo "<p> Seja bem vindo: $nome</p>";
}

exibirSaudacaoComNome("flavio");

function menorValor($valor1, $valor2)
{
    return min($valor1, $valor2);
}
echo "Menor valor entr 4 e 8 :" . menorValor(8, 4);

function somaValores(...$numero)
{
    return array_sum($numero);
}
$soma = somaValores(1, 2, 3, 4, 5, 6);
echo "<p> a soma dos valores: $soma<p/>";
