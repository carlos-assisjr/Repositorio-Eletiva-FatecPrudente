<?php require('cabecalho.php');
require('conexao.php');
try {
    $stmt = $pdp->query("SELECT * FROM categoria");
    $dados = $stmt->fetchAll();
} catch (\Exception $e) {
    echo "ERRO: " . $e->getMessage();
}

?>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">

        <h2>categoria</h2>
        <a href="#" class="btn btn-success mb-3">Novo Registro</a>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>id</th>
                    <th>nome</th>
                    <th>ações</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($dados as $d):
                ?>
                    <tr>
                        <td>1</td>
                        <td>Exemplo</td>
                        <td>Exemplo</td>
                        <td>Exemplo</td>
                        <td class="d-flex gap-2">
                            <a href="#" class="btn btn-sm btn-warning">Editar</a>
                            <a href="#" class="btn btn-sm btn-info">Consultar</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>
<?php require('rodape.php'); ?>