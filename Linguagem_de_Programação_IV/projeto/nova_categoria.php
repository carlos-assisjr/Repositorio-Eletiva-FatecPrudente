<?php
require('cabecalho.php');
require('conexao.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nome = $_POST['nome'];
    try {
        $stmt = $pdo->prepare("INSERT INTO  categoria (nome) values(?)");
        if ($stmt->execute([$nome])) {
            header('location:  categoria.php?cadastro=true');
        } else {
            header('location:  categoria.php?cadastro=false');
        }
    } catch (\Exception $e) {
        echo "Erro: " . $e->getMessage();
    }
    if (isset($_GET['cadastro']) && $_GET['cadastro']) {
        echo "<p class='text-sucess'>Cadastro realizado!</p>";
    } else if (!isset($_GET['cadastro']) && !$_GET['cadastro'])
        echo "<p class='text-danger'>ERRO ao Cadastrar!</p>";
}
?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nova Categoria </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Nova Categoria </h1>
        <form method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Informe o nome da categoria:</label>
                <input type="text" id="nome" name="nome" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>
<?php require('rodape.php') ?>