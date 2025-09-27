<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Contatos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Cadastro de Contatos</h1>
        <form method="post">
            <?php for ($i = 1; $i < 6; $i++): ?>
                <div class="mb-3">
                    <label class="form-label">Informe o <?= $i ?>° Nome:</label>
                    <input type="text" name="nome[]" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Informe o <?= $i ?>° Telefone:</label>
                    <input type="text" name="telefone[]" class="form-control" required>
                </div>
            <?php endfor; ?>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
        // Inicializa o array de contatos
        $contatos = [];
        // Quando o formulário for enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            for ($i = 0; $i < 5; $i++) {
                $nome = $_POST["nome"][$i];
                $telefone = $_POST["telefone"][$i];

                if ($nome != "" && $telefone != "") {
                    if (array_key_exists($nome, $contatos)) {
                        echo "<p class='text-danger'>O nome '$nome' já foi cadastrado!</p>";
                    } elseif (in_array($telefone, $contatos)) {
                        echo "<p class='text-danger'>O telefone '$telefone' já foi cadastrado!</p>";
                    } else {
                        $contatos[$nome] = $telefone;
                    }
                }
            }
            // Ordena por nome
            uksort($contatos, 'strcasecmp');
            // Exibe os contatos
            foreach ($contatos as $nome => $telefone) {
                echo "<p>Nome: $nome - Telefone: $telefone";
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>