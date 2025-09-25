<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifique se há duplicatas de nome ou número de telefone antes de adicionar um novo contato. Exiba a lista ordenada pelos nomes dos contatos.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Verifique se há duplicatas de nome ou número de telefone antes de adicionar um novo contato. Exiba a lista ordenada pelos nomes dos contatos.</h1>
        <form method="post">

            <?php for ($i = 1; $i <= 5; $i++): ?> <!--para adicionar um loop -->
                <div class="row inline-row mb-3">
                    <div class="col-md-6">
                        <label for="nome[]" class="form-label">Informe o <?= $i ?>º Nome:</label>
                        <input type="text" id="nome[]" name="nome[]" class="form-control" required="">
                    </div>
                    <div class="col-md-6">
                        <label for="telefone[]" class="form-label">Informe o <?= $i ?>º Telefone</label>
                        <input type="text" id="telefone[]" name="telefone[]" class="form-control" required="">
                    </div>
                </div>
            <?php endfor; ?>
    </div>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nomes = $_POST['nome'];
            $telefones = $_POST['telefone'];
            $contatos = [];

            for ($i = 0; $i < count($nomes); $i++) {
                $nome = trim($nomes[$i]);
                $telefone = trim($telefones[$i]);
            }
        }
        ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>