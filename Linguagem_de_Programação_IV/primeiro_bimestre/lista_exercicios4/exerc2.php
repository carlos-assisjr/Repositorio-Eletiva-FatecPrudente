<?php include 'cabecalho.php'; ?>
<div class="container my-4">
    <h4 class="text-center">Exiba a lista de alunos ordenada pela média das notas (do maior para o menor)</h4>
    <form method="post" class="border p-4 rounded shadow-sm bg-light">
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

        <button type="submit" class="btn btn-primary w-100">Enviar</button>
    </form>
</div>

<div class="container my-4">
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

        echo "<h4 class='text-center'>Resultados</h4>";
        echo "<table class='table table-bordered table-hover'>";
        echo "<thead><tr><th>Aluno</th><th>Média</th></tr></thead><tbody>";

        foreach ($alunos as $nome => $media) {

            echo "<tr>
                <td>{$nome}</td>
                <td>" . number_format($media, 2, ",", ".") . "</td>
              </tr>";
        }

        echo "</tbody></table>";
    }
    ?>
</div>
<?php include 'rodape.php'; ?>