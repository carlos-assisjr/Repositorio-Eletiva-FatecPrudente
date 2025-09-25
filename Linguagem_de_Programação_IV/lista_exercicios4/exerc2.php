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
            <?php for ($i = 1; $i <= 5; $i++): ?> <!--para adicionar um loop -->
                <div class="row inline-row mb-3">
                    <div class="col-md-3">
                        <label for="nome[]" class="form-label">Informe o Nome:</label>
                        <input type="text" id="nome[]" name="nome[]" class="form-control" required="">
                    </div>
                    <div class="col-md-3">
                        <label for="Nota[]" class="form-label">Informe a 1° Nota:</label>
                        <input type="number" id="Nota[]" name="Nota[]" class="form-control" required="">
                    </div>
                    <div class="col-md-3">
                        <label for="nota2[]" class="form-label">Informe a 2° Nota:</label>
                        <input type="text" id="nota2[]" name="nota2[]" class="form-control" required="">
                    </div>
                    <div class="col-md-3">
                        <label for="Nota3[]" class="form-label">Informe a 3° Nota:</label>
                        <input type="text" id="Nota3[]" name="Nota3[]" class="form-control" required="">
                    </div>
                </div>
            <?php endfor; ?>

            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nomes = $_POST['nome'];
            $nota1 = $_POST['Nota'];
            $nota2 = $_POST['nota2'];
            $nota3 = $_POST['Nota3'];

            $alunos = [];
            for ($i = 0; $i < 5; $i++) {
                $media = ($nota1[$i] + $nota2[$i] + $nota3[$i]) / 3;
                $alunos[$nomes[$i]] = $media;
            }
                
            arsort($alunos);
                foreach ($alunos as $nome => $media) {
                    echo "<p>Aluno: $nome, "."Média: ". number_format($media, 2) . "</p>";
                }
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>