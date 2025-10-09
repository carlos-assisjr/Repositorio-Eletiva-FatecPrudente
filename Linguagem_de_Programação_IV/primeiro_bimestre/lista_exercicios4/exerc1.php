<?php include 'cabecalho.php'; ?>
<h4>Cadastro de Contatos</h4>
<div class="border p-3 rounded mb-4">

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
    <?php include 'rodape.php'; ?>