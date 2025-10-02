<?php include 'cabecalho.php'; ?>
<div class="container my-4">
    <h4 class="text-center">Adicionar Livros</h4>
    <form method="POST" class="border p-4 rounded shadow-sm bg-light">
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Título do <?= $i ?>º Livro:</label>
                    <input type="text" name="titulo[]" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Quantidade em Estoque:</label>
                    <input type="number" name="quantidade[]" class="form-control" required>
                </div>
            </div>
        <?php endfor; ?>
        <button type="submit" class="btn btn-primary w-100">Adicionar Livros</button>
    </form>
</div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $titulos = $_POST['titulo'];
        $quantidades = $_POST['quantidade'];

        $livros = [];

        // percorre os vetores de títulos e quantidades
        for ($i = 0; $i < count($titulos); $i++) {
            $livros[$titulos[$i]] = (int)$quantidades[$i];
        }
        uksort($livros, 'strcasecmp');  // ordena por título (chave do array)
        echo "<h3 class='text-center'>Livros em Estoque</h3>";
        echo "<table class='table table-bordered table-hover'>";
        echo "<thead class='table-dark'><tr><th>Título</th><th>Quantidade</th></tr></thead><tbody>";

        foreach ($livros as $titulo => $quantidade) {
            if ($quantidade < 5) {
                echo "<tr class='table-danger'><td>{$titulo}</td><td>{$quantidade} (Estoque baixo!)</td></tr>";
            } else {
                echo "<tr><td>{$titulo}</td><td>{$quantidade}</td></tr>";
            }
        }

        echo "</tbody></table>";
    }
    ?>
    <?php include 'rodape.php'; ?>