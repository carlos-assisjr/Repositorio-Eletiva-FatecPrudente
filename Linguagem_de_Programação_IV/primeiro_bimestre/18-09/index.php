<?php
$valor = array(1, 2, 3, 4, 5);
echo "<p>Primeiro valor do vetor: " . $valor[0] . "</p>";
// $v = $_POST['NOME'];
$v = 'nome';
$vetor = [1, 2, 3, 4, 5];
var_dump($vetor);
print_r($vetor);
$vetor[4] = 6;
echo "<p> Novo valor da posição 4: " . $vetor[4] . "</p>";

$vetor['nome'] = "José Carlos";
print_r($vetor);

$valores = [
    'nome' => "José carlos",
    'sobrenome' => "Assis",
    'idade' => 24
];

foreach($valores as $c => $v){
    echo"<p>Posição: $c, Valor: $v</p>";
}

