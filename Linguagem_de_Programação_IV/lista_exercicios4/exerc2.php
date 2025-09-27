<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exiba a lista de alunos ordenada pela média das notas (do maior para o menor).</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Exiba a lista de alunos ordenada pela média das notas (do maior para o menor).</h1>
        <form method="post">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label class="form-label">Informe o <?= $i ?>° nome do aluno:</label>
                        <input type="text" name="nome[]" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Informe a 1° Nota:</label>
                        <input type="number" step="0.01" min="0" max="10" name="nota1[]" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Informe a 2° Nota:</label>
                        <input type="number" step="0.01" min="0" max="10" name="nota2[]" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Informe a 3° Nota:</label>
                        <input type="number" step="0.01" min="0" max="10" name="nota3[]" class="form-control" required>
                    </div>
                </div>
            <?php endfor; ?>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nomes = $_POST['nome'];
            $nota1 = $_POST['nota1'];
            $nota2 = $_POST['nota2'];
            $nota3 = $_POST['nota3'];

            $alunos = [];
            for ($i = 0; $i < 5; $i++) {
                $media = ($nota1[$i] + $nota2[$i] + $nota3[$i]) / 3;
                $alunos[$nomes[$i]] = $media;
            }
            // Ordena pela média (maior para menor)
            arsort($alunos);
            foreach ($alunos as $nome => $media) {
                echo "<p>Aluno: $nome - Média: " . number_format($media, 2, ",", ".") . "</p>";
            }
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>