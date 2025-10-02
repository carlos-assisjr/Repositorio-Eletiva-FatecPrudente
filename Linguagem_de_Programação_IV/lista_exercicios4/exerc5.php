<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Livros</title>
</head>
<body>
    <h1>Adicionar Livros</h1>
    <form method="POST">
        <label for="titulo">Título do Livro:</label>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="quantidade">Quantidade em Estoque:</label>
        <input type="number" id="quantidade" name="quantidade" required><br><br>

        <input type="submit" value="Adicionar Livro">
    </form>
</body>
</html>
<?php
session_start();

if (!isset($_SESSION['livros'])) {
    $_SESSION['livros'] = [];
}
function verificaBaixaQuantidade($quantidade) {
    return $quantidade < 5;
}

function verificaDuplicata($titulo, $livros) {
    foreach ($livros as $livro) {
        if ($livro['titulo'] === $titulo) {
            return true;
        }
    }
    return false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = trim($_POST['titulo']);
    $quantidade = intval($_POST['quantidade']);

    if (!verificaDuplicata($titulo, $_SESSION['livros'])) {
        $_SESSION['livros'][$titulo] = $quantidade;
        echo "Livro adicionado com sucesso!<br>";
    } else {
        echo "Erro: Título de livro duplicado!<br>";
    }
}

ksort($_SESSION['livros']);  

echo "<h2>Lista de Livros Ordenada pelo Título</h2>";
echo "<table border='1'>";
echo "<tr><th>Título</th><th>Quantidade em Estoque</th></tr>";

foreach ($_SESSION['livros'] as $titulo => $quantidade) {
    if (verificaBaixaQuantidade($quantidade)) {
        echo "<tr><td><strong>{$titulo}</strong></td><td style='color: red;'><strong>{$quantidade}</strong> - Baixa Quantidade!</td></tr>";
    } else {
        echo "<tr><td>{$titulo}</td><td>{$quantidade}</td></tr>";
    }
}

echo "</table>";
?>